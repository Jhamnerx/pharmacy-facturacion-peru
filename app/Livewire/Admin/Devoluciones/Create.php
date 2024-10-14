<?php

namespace App\Livewire\Admin\Devoluciones;

use Carbon\Carbon;
use App\Models\Ventas;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Devoluciones;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Create extends Component
{

    public $simbolo = 'S/';
    public $fecha_emision;
    public $motivo;

    public $invoice_sub_total = 0;
    public $invoice_igv = 0;
    public $invoice_total = 0;

    public Collection $items;
    public Ventas $invoice;
    public $invoice_id;
    public $cliente_id;
    public $tipo_operacion;

    public $sub_total = 0, $op_gravadas = 0, $op_exoneradas = 0, $op_inafectas = 0, $op_gratuitas = 0, $icbper = 0, $igv = 0, $total = 0;

    public Empresa $empresa;
    //PROPIEDAD PARA VERIFICAR EMPRESA
    public $local_id;


    protected function rules()
    {
        return [
            'invoice_id' => 'required',
            'fecha_emision' => 'required',
            'motivo' => 'required',
            // Reglas de validación para cada item
            'items.*.cantidad' => ['required', 'numeric', 'min:1', function ($attribute, $value, $fail) {
                // Obtenemos el índice del ítem
                $index = explode('.', $attribute)[1];
                // Validamos que la cantidad no exceda la original
                if ($value > $this->items[$index]['cantidad_original']) {
                    $fail("La cantidad del producto no puede exceder la cantidad original.");
                }
            }],
            'items' => 'array|between:1,1000',
            'items.*.producto_id' => 'nullable',
            'items.*.codigo' => 'nullable',
            'items.*.unit' => 'required',
            'items.*.unit_name' => 'required',
            'items.*.descripcion' => 'required',
            'items.*.valor_unitario' => 'required',
            'items.*.precio_unitario' => 'required',
            'items.*.porcentaje_igv' => 'required',
            'items.*.igv' => 'required',
            'items.*.icbper' => 'required',
            'items.*.total_icbper' => 'required',
            'items.*.sub_total' => 'required',
            'items.*.total' => 'required',
            'items.*.codigo_afectacion' => 'required',
            'items.*.afecto_icbper' => 'required',
            //'items.*.tipo' => 'required',

            'sub_total' => 'required',
            'op_gravadas' => 'required',
            'op_exoneradas' => 'required',
            'op_inafectas' => 'required',
            'op_gratuitas' => 'required',
            'icbper' => 'required',
            'igv' => 'required',
            'total' => 'required',
            'local_id' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'invoice_id.required' => 'El comprobante es requerido.',
            'items.*.cantidad.required' => 'La cantidad es requerida.',
            'items.*.cantidad.numeric' => 'La cantidad debe ser un número.',
            'items.*.cantidad.min' => 'La cantidad debe ser mayor a 0.',
        ];
    }

    public function render()
    {
        return view('livewire.admin.devoluciones.create');
    }

    public function mount()
    {
        $this->items = collect();
        $this->fecha_emision = Carbon::now()->format('Y-m-d');
        $this->empresa = Empresa::first();
        $this->empresa->igv;
        $this->local_id = session('local_id');
    }

    public function selectInvoice()
    {
        $this->items = collect();
        try {
            $this->invoice = Ventas::findOrFail($this->invoice_id);
            $this->cliente_id = $this->invoice->cliente_id;
            $this->tipo_operacion = $this->invoice->tipo_operacion;

            $this->setDataItemsInvoice();
        } catch (ModelNotFoundException $e) {
            $this->dispatch('notify-toast');
        }
    }

    public function setDataItemsInvoice()
    {
        foreach ($this->invoice->detalle as $selected) {
            $this->items->push([
                'producto_id' => $selected->producto_id,
                'codigo' => $selected->codigo,
                'cantidad' => $selected->cantidad, // Cantidad que se puede modificar
                'cantidad_original' => $selected->cantidad, // Guardamos la cantidad original
                'unit' => $selected->unit,
                'unit_name' => $selected->unit_name,
                'descripcion' => $selected->descripcion,
                'valor_unitario' => $selected->valor_unitario,
                'precio_unitario' => $selected->precio_unitario,
                'igv' => $selected->igv,
                'porcentaje_igv' => $selected->porcentaje_igv,
                'icbper' => $selected->icbper,
                'total_icbper' => $selected->total_icbper,
                'sub_total' => $selected->valor_unitario * $selected->cantidad,
                'total' => $selected->total,
                'codigo_afectacion' => $selected->codigo_afectacion,
                'afecto_icbper' => $selected->afecto_icbper,
            ]);
        }
    }

    public function updated($propertyName)
    {
        // Valida en tiempo real las reglas
        $this->validateOnly($propertyName);
    }

    public function clearSelected()
    {
        $this->invoice_id = null;
        $this->reset('invoice');
        $this->cliente_id = null;
        $this->tipo_operacion = null;
        $this->items = collect();
        $this->motivo = null;
    }


    public function eliminarProducto($key)
    {
        unset($this->items[$key]);

        // $this->reCalTotal();
    }

    //METODO GLOBAL PARA HACER CALCULOS
    public function reCalTotal()
    {

        $this->sub_total =   $this->calcularSubTotal();

        $this->op_gravadas = $this->calcularOperacionesGravadas();
        $this->op_exoneradas = $this->calcularOperacionesExoneradas();
        $this->op_inafectas = $this->calcularOperacionesInafectas();

        $this->icbper = $this->calcularIcbper();

        $this->igv =  $this->calcularIgv();
        $this->total =  $this->calcularTotal();
    }



    //CALCULAR EL SUB TOTAL DE LOS ITEMS
    public function calcularSubTotal()
    {
        $sub_total = $this->items->map(function ($item, $key) {

            $sub_total = 0;
            $sub_total =  $sub_total + $item["sub_total"];
            return round($sub_total, 4);
        });

        return $sub_total->sum();
    }
    //CALCULAR TOTALES DE LOS TIPOS DE AFECTACIONES
    public function calcularOperacionesGravadas()
    {
        $op_gravadas = $this->items->map(function ($item, $key) {

            if ($item['codigo_afectacion'] == '10') {
                $op_gravadas = 0.00;
                $op_gravadas = $op_gravadas + $item['sub_total'];
                return round($op_gravadas, 4);
            }
        })->sum();

        return round($op_gravadas, 4);
    }

    public function calcularOperacionesExoneradas()
    {
        $op_exoneradas = $this->items->map(function ($item, $key) {

            if ($item['codigo_afectacion'] == '20') {
                $op_exoneradas = 0.00;
                $op_exoneradas = $op_exoneradas + $item['sub_total'];
                return round($op_exoneradas, 4);
            }
        })->sum();

        return round($op_exoneradas, 4);
    }

    public function calcularOperacionesInafectas()
    {

        $op_inafectas = $this->items->map(function ($item, $key) {

            if ($item['codigo_afectacion'] == '30') {
                $op_inafectas = 0.00;
                $op_inafectas = $op_inafectas + $item['sub_total'];
                return round($op_inafectas, 4);
            }
        })->sum();

        return round($op_inafectas, 4);
    }
    public function calcularIcbper()
    {
        $icbper = $this->items->map(function ($item, $key) {

            if ($item['afecto_icbper']) {
                $icbper = 0.00;
                $icbper = $item["icbper"];
                return round($icbper * $item["cantidad"], 4);
            }
        })->sum();

        return round($icbper, 4);
    }

    //CALCUJLAR TOTAL DE ACUERDO AL TIPO DE DESCUENTO Y SI HAY
    public function calcularTotal()
    {

        $total = ($this->op_gravadas + $this->op_exoneradas + $this->op_inafectas + $this->icbper) + $this->igv;

        return round($total, 4);
    }

    //CALCULAR IGV DESDE EL SUB TOTAL 
    public function calcularIgv()
    {

        $igv = floatval($this->op_gravadas) * $this->empresa->igv;;

        return round($igv, 4);
    }


    public function save()
    {
        if ($this->local_id != session('local_id')) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: 'No puedes registrar una venta de otro local',
            );
            return;
        }
        $datos = $this->validate();
        try {
            DB::beginTransaction();


            $this->reCalTotal();

            $devolucion = Devoluciones::create([
                'venta_id' => $this->invoice_id,
                'fecha_emision' => $this->fecha_emision,
                'motivo' => $this->motivo,
                'sub_total' => $this->sub_total,
                'op_gravadas' => $this->op_gravadas,
                'op_exoneradas' => $this->op_exoneradas,
                'op_inafectas' => $this->op_inafectas,
                'op_gratuitas' => $this->op_gratuitas,
                'icbper' => $this->icbper,
                'igv' => $this->igv,
                'total' => $this->total,
                'local_id' => $this->local_id,
            ]);


            //CREAR ITEMS DE LA VENTA
            Devoluciones::createItems($devolucion, $datos["items"]);

            $this->dispatch(
                'notify-toast',
                icon: 'success',
                title: 'Éxito:',
                mensaje: 'Devolución registrada correctamente',
            );

            DB::commit();
            $this->clearSelected();
        } catch (\Throwable $th) {
            DB::rollBack();

            $this->dispatch(
                'error',
                title: 'ERROR: ',
                mensaje: $th->getMessage(),
            );
        }
    }

    //CALCULAR IGV Y SN TOTAL AL MODIFICAR CANTIDAD DEL ITEM #
    public function updatedItems($name, $value)
    {
        $this->calcularMontosLinea();
        $this->reCalTotal();
    }

    public function calcularMontosLinea()
    {
        $this->items = $this->items->map(function ($item, $key) {

            if ($item['codigo_afectacion'] == "10") {
                $sub_total = round(floatval($item["cantidad"]) *  floatval($item["valor_unitario"]), 4);
                $igv = round($sub_total * $this->empresa->igv, 2);
            } else {
                $sub_total = round(floatval($item["cantidad"]) *  floatval($item["valor_unitario"]), 4);
                $igv = 0.00;
            }


            $item["sub_total"] =  round($sub_total, 2);
            $item["igv"] =  round($igv, 4);
            $item["total"] =  $item["afecto_icbper"] ? round(floatval($item["cantidad"]) *  floatval($item["valor_unitario"]) + $item["igv"] + $item["total_icbper"], 2)  : round(floatval($item["cantidad"]) *  floatval($item["valor_unitario"]) + $item["igv"], 2);
            $item["precio_unitario"] = round(($item["valor_unitario"] * $this->empresa->igv) + $item["valor_unitario"], 2);


            return $item;
        });
    }
}
