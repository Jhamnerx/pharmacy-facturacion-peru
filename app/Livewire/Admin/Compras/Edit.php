<?php

namespace App\Livewire\Admin\Compras;

use App\Models\Compras;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Productos;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    public $tipo_comprobante_id = '01';
    public $proveedor_id, $serie, $correlativo,  $fecha_emision, $divisa = 'PEN', $comentario = '';
    public $tipo_cambio = 1.00;

    public $product_selected_id;
    public Collection $selected;
    public Collection $items;

    public $sub_total = 0.00, $igv = 0.00, $total = 0.00;

    public Empresa $empresa;

    //PROPIEDAD PARA VERIFICAR EMPRESA
    public $local_id;

    public $compra;

    public function mount(Compras $compra)
    {
        $this->compra = $compra;
        //ASIGNAR VALORES A LAS PROPIEDADES
        $this->proveedor_id = $compra->proveedor_id;
        $this->serie = $compra->serie;
        $this->correlativo = $compra->correlativo;
        $this->comentario = $compra->comentario;
        $this->sub_total = $compra->sub_total;
        $this->igv = $compra->igv;
        $this->total = $compra->total;
        $this->divisa = $compra->divisa;
        $this->tipo_comprobante_id = $compra->tipo_comprobante_id;
        $this->tipo_cambio = $compra->tipo_cambio;
        $this->fecha_emision = $compra->fecha_emision->format('Y-m-d');

        $this->items = collect($compra->detalle->toArray());

        $this->empresa = Empresa::first();
        $this->local_id = session('local_id');

        $this->selected = collect([
            'producto_id' => "",
            'codigo' => "MD-0000",
            'descripcion' => "",
            'cantidad' => 1,
            'codigo_lote' => "",
            'fecha_vencimiento' => "",
            'precio' => 0.00,
            'importe_total' => 0.00,
        ]);
    }



    public function render()
    {
        return view('livewire.admin.compras.edit');
    }

    public function updatedSerie($value)
    {
        $this->serie = strtoupper($this->serie);
    }

    public function updatedProductSelectedId($value)
    {
        if ($value != "") {
            $producto = Productos::findOrFail($value);
            $this->selected = collect([
                'producto_id' => $producto->id,
                'codigo' => $producto->codigo,
                'descripcion' => $producto->nombre,
                'cantidad' => 1,
                'codigo_lote' => "",
                'fecha_vencimiento' => "",
                'precio' => 0.00,
                'importe_total' => 0.00,
            ]);
        }
    }

    public function agregarItem()
    {
        $this->validate([
            'selected.producto_id' => 'required',
            'selected.cantidad' => 'required|numeric|min:1',
            'selected.precio' => 'required|numeric|min:0.01',
            'selected.precio' => 'required|numeric|min:0.01',
            'selected.codigo_lote' => 'nullable',
            'selected.fecha_vencimiento' => 'nullable|date_format:d-m-Y'
        ], [
            'selected.producto_id.required' => 'Seleccione un producto',
            'selected.cantidad.required' => 'Ingrese la cantidad',
            'selected.cantidad.numeric' => 'La cantidad debe ser un número',
            'selected.cantidad.min' => 'La cantidad debe ser mayor a 0',
            'selected.precio.required' => 'Ingrese el precio',
            'selected.precio.numeric' => 'El precio debe ser un número',
            'selected.precio.min' => 'El precio debe ser mayor a 0',
            'selected.codigo_lote.required' => 'Ingrese el código de lote',
            'selected.fecha_vencimiento.required' => 'Ingrese la fecha de vencimiento',
            //'selected.fecha_vencimiento.date_format' => 'Ingrese una fecha válida dia-mes-año',
        ]);
        try {

            $this->items->push($this->selected);
            $this->selected = collect([
                'producto_id' => "",
                'codigo' => "MD-0000",
                'descripcion' => "",
                'cantidad' => 1,
                'codigo_lote' => "",
                'fecha_vencimiento' => "",
                'precio' => 0.00,
                'importe_total' => 0.00,
            ]);
            $this->reCalTotal();
        } catch (\Throwable $th) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }

    public function updatedSelected($value, $name)
    {

        if ($name  == "cantidad" && $value == "") {
            $this->selected['cantidad'] = 1;
        }

        $this->selected['importe_total'] = floatval($this->selected['cantidad']) * floatval($this->selected['precio']);
    }

    public function updatedItems($value)
    {
        $this->calcularMontosLinea();
        $this->reCalTotal();
    }

    public function calcularMontosLinea()
    {

        $this->items = $this->items->map(function ($item, $key) {

            $item['importe_total'] = $item['cantidad'] * $item['precio'];
            return $item;
        });
    }

    //METODO GLOBAL PARA HACER CALCULOS
    public function reCalTotal()
    {
        $this->total =  $this->calcularTotal();
        $this->sub_total =   $this->calcularSubTotal();
        $this->igv =  $this->calcularIgv();
    }

    //CALCULAR IGV DESDE EL SUB TOTAL - FALTA POR TRAER EL PROCENTAJE DEL IUMPUESTO DE LA DB
    public function calcularIgv()
    {

        $igv = $this->total - $this->sub_total;
        return round($igv, 2);
    }


    //CALCUJLAR TOTAL DE ACUERDO AL TIPO DE DESCUENTO Y SI HAY
    public function calcularTotal()
    {
        $total = $this->items->map(function ($item, $key) {

            $total = 0;
            $total =  $total + $item["importe_total"];
            return round($total, 2);
        });

        return $total->sum();
    }

    //CALCULAR EL SUB TOTAL DE LOS ITEMS
    public function calcularSubTotal()
    {
        return round($this->total / (1 + $this->empresa->igv), 2);
    }

    public function eliminarItem($index)
    {
        $this->items->forget($index);
        $this->reCalTotal();
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

        $rules = [
            'proveedor_id' => 'required',
            'serie' => 'required',
            'correlativo' => 'required',
            'fecha_emision' => 'required',
            'divisa' => 'required',
            'comentario' => 'nullable',
            'items' => 'required',
            'sub_total' => 'required',
            'igv' => 'required',
            'total' => 'required',
            'tipo_cambio' => 'required',
            'tipo_comprobante_id' => 'required',
        ];

        $datos = $this->validate($rules);

        try {
            DB::beginTransaction();
            $this->compra->update($datos);
            $this->compra->detalle()->delete();;

            $items = Compras::createItems($datos['items'], $this->compra);

            DB::commit();
            session()->flash('compra-actualizada', 'Se registro la compra ' . $this->compra->serie_correlativo);
            $this->redirectRoute('admin.compras.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: $th->getMessage(),
            );
        }
    }
}
