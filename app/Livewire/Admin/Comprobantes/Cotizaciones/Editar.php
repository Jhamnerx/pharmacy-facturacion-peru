<?php

namespace App\Livewire\Admin\Comprobantes\Cotizaciones;

use Carbon\Carbon;
use App\Models\Series;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Clientes;
use Livewire\Attributes\On;
use App\Models\Cotizaciones;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UtilesController;
use App\Http\Requests\CotizacionRequest;

class Editar extends Component
{

    //PROPIEDADES DE VENTA
    public $tipo_comprobante_id = '00';
    public $serie, $correlativo, $serie_correlativo, $cliente_id,
        $direccion, $fecha_emision, $fecha_hora_emision, $fecha_vencimiento,
        $divisa = "PEN", $tipo_cambio, $metodo_pago_id = "009", $comentario,
        $igv_op = 0.00, $tipo_descuento = "cantidad", $descuento_factor,
        $adelanto = 0.00,  $numero_cuotas = 0,
        $vence_cuotas = 30, $forma_pago = "CONTADO";

    public $sub_total = 0.00, $op_gravadas = 0.00, $op_exoneradas = 0.00, $op_inafectas = 0.00,
        $op_gratuitas = 0.00, $descuento = 0.00, $igv = 0.00, $icbper = 0.00,  $total = 0.00;


    public Collection $detalle_cuotas;

    //PROPIEDADES UTILES
    public $comprobante_slug = 'cotizacion';
    public $showCredit = false;
    public $product_selected_id;
    public $descuento_monto = 0.00;
    public $total_cuotas = 0.00;

    public Collection $items;
    public $cliente;
    public Empresa $empresa;

    //pago anticipado
    public $pago_anticipado = false;
    public $deduce_anticipos = false;
    public Collection $prepayments;

    public $simbolo = "S/. ";

    public $metodo_type = "02";

    //PROPIEDAD PARA ASIGNAR EL MINIMO DEL CORRELATIVO
    public $min_correlativo;

    //PROPIEDAD PARA VERIFICAR EMPRESA
    public $local_id;

    public $series = [];

    public $cotizacion;

    public function mount(Cotizaciones $cotizacion)
    {
        $this->cotizacion = $cotizacion;
        $this->series = $this->loadSeries();
        $this->setSerieMount();

        //  CONSULTAR TIPO CAMBIO
        $util = new UtilesController;
        $this->tipo_cambio = $util->tipoCambio();

        //  CONSULTAR EMPRESA
        $this->empresa = Empresa::first();
        $this->prepayments = collect();
        $this->local_id = session('local_id');

        //  CONSULTAR CLIENTE
        $this->cliente_id = $cotizacion->cliente_id;
        $this->direccion = $cotizacion->cliente->direccion;

        $this->serie = $cotizacion->serie;
        $this->correlativo = $cotizacion->correlativo;
        $this->serie_correlativo = $cotizacion->serie_correlativo;
        $this->fecha_emision = $cotizacion->fecha_emision->format('Y-m-d');
        $this->fecha_vencimiento = $cotizacion->fecha_vencimiento->format('Y-m-d');
        $this->divisa = $cotizacion->divisa;
        $this->tipo_cambio = $cotizacion->tipo_cambio;
        $this->metodo_pago_id = $cotizacion->metodo_pago_id;
        $this->comentario = $cotizacion->comentario;
        $this->igv_op = $cotizacion->igv_op;
        $this->tipo_descuento = $cotizacion->tipo_descuento;
        $this->descuento_factor = $cotizacion->descuento_factor;
        $this->numero_cuotas = $cotizacion->numero_cuotas ? $cotizacion->numero_cuotas : 30;
        $this->vence_cuotas = $cotizacion->vence_cuotas;
        $this->forma_pago = $cotizacion->forma_pago;
        $this->sub_total = $cotizacion->sub_total;
        $this->op_gravadas = $cotizacion->op_gravadas;
        $this->op_exoneradas = $cotizacion->op_exoneradas;
        $this->op_inafectas = $cotizacion->op_inafectas;
        $this->op_gratuitas = $cotizacion->op_gratuitas;
        $this->descuento = $cotizacion->descuento;
        $this->igv = $cotizacion->igv;
        $this->icbper = $cotizacion->icbper;
        $this->total = $cotizacion->total;


        //DATOS ITEMS
        $this->items = collect($cotizacion->detalle->toArray());
        $this->detalle_cuotas = collect($cotizacion->detalle_cuotas);

        if ($cotizacion->forma_pago == "CREDITO") {

            $this->showCredit = true;
            $this->total_cuotas = $this->detalle_cuotas->sum('importe');
        } else {
            $this->showCredit = false;
        }
    }

    public function render()
    {
        return view('livewire.admin.comprobantes.cotizaciones.editar');
    }

    //CARGAR SERIES DE ACUERDO AL TIPO DE COMPROBANTE
    public function loadSeries()
    {
        return Series::query()
            ->select('id', 'serie', 'correlativo', 'tipo_comprobante_id')
            ->orderBy('id')
            ->where('tipo_comprobante_id', $this->tipo_comprobante_id)->get()->toArray();
    }

    //ESTABLECER SERIE Y CORRELATIVO
    public function setSerieMount()
    {
        //$this->dispatch('notify-toast', icon: 'success', title: 'VENTA CREADA', mensaje: 'Venta creada desde POS', timer: 5000);
        $serie = Series::where('tipo_comprobante_id', $this->tipo_comprobante_id)->first();
        $this->serie = $serie->serie;
    }

    public function updatedSerie($value)
    {
        $this->changeSerieUpdate($value);
    }

    //ACTUALIZAR CORRELATIVO DE SERIE
    public function changeSerieUpdate($serie)
    {
        if ($serie) {
            $serie = Series::where('serie', $serie)->first();
            $this->serie = $serie->serie;
            $this->correlativo = $serie->correlativo + 1;
            $this->min_correlativo = $serie->correlativo + 1;
            $this->serie_correlativo = $this->serie . "-" . $this->correlativo;
        } else {

            $this->reset('correlativo');
        }
    }

    public function updatedDivisa($value)
    {
        if ($value == "USD") {
            $this->simbolo = "$";
            $this->convertMontosTotalesToDolares();
        } else {
            $this->simbolo = "S/. ";
            $this->convertMontosTotalesToSoles();
        }
        $this->calcularCuotas($this->numero_cuotas);
        //$this->calcularMontoDetraccion($this->total);
    }
    public function convertMontosTotalesToDolares()
    {
        $this->sub_total =  $this->sub_total / $this->tipo_cambio;
        $this->op_gravadas = $this->op_gravadas / $this->tipo_cambio;
        $this->op_exoneradas = $this->op_exoneradas / $this->tipo_cambio;
        $this->op_inafectas = $this->op_inafectas /   $this->tipo_cambio;
        $this->icbper = $this->icbper / $this->tipo_cambio;
        $this->igv =  $this->igv / $this->tipo_cambio;
        $this->total =  $this->total / $this->tipo_cambio;
        $this->descuento =  $this->descuento / $this->tipo_cambio;


        $this->items = $this->items->map(function ($item) {
            $item['valor_unitario'] = round($item['valor_unitario'] / $this->tipo_cambio, 6);

            return $item;
        });

        $this->calcularMontosLinea();
    }
    public function convertMontosTotalesToSoles()
    {
        $this->sub_total =  round($this->sub_total * $this->tipo_cambio, 2);
        $this->op_gravadas = round($this->op_gravadas * $this->tipo_cambio, 2);
        $this->op_exoneradas = round($this->op_exoneradas * $this->tipo_cambio, 2);
        $this->op_inafectas = round($this->op_inafectas *   $this->tipo_cambio, 2);
        $this->icbper = round($this->icbper * $this->tipo_cambio, 2);
        $this->igv =  round($this->igv * $this->tipo_cambio, 2);
        $this->total =  round($this->total * $this->tipo_cambio, 2);
        $this->descuento =  round($this->descuento * $this->tipo_cambio, 4);

        $this->items = $this->items->map(function ($item) {
            $item['valor_unitario'] = round($item['valor_unitario'] * $this->tipo_cambio, 6);

            return $item;
        });
        $this->calcularMontosLinea();
    }

    public function updatedFormaPago()
    {
        $this->toggleShowCredit();
    }
    public function toggleShowCredit()
    {

        if (
            $this->forma_pago == "CREDITO"
        ) {

            $this->showCredit = true;
            $this->resetCrediFields();
        } else {
            $this->showCredit = false;
        }
    }

    public function resetCrediFields()
    {
        $this->numero_cuotas = 0;
        $this->detalle_cuotas = collect();
    }

    public function updatedNumeroCuotas($value)
    {
        if ($value >= 0) {
            $this->calcularCuotas($value);
        } else {
            $this->numero_cuotas = 0;
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: 'El número de cuotas debe ser mayor a 0',
            );
        }
    }

    public function updatedVenceCuotas($value)
    {
        if ($value > 0) {
            $this->calcularCuotas(intval($this->numero_cuotas));
        } else {
            $this->vence_cuotas = intval(1);
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR:',
                mensaje: 'El número de días debe ser mayor a 0',
            );
        }
    }
    //CALCULAR CUOTAS
    public function calcularCuotas($nCuotas)
    {

        $this->detalle_cuotas = collect();
        $fecha = Carbon::now();
        for ($i = 0; $i < (int)$nCuotas; $i++) {

            $this->detalle_cuotas->push([
                'n_cuota' => $i + 1,
                'dias' => $this->vence_cuotas,
                'fecha' => $fecha->addDays(intval($this->vence_cuotas))->format('Y-m-d'),
                'dia_semana' => ucfirst($fecha->dayName),
                'importe' => $this->total > 0 ? round(floatval(round($this->total, 2) / $nCuotas), 2)  : 0.00,
            ]);
        }
        $this->total_cuotas = round($this->detalle_cuotas->sum('importe'), 2);
    }

    public function updatedDetalleCuotas($attr, $valor)
    {

        $this->total_cuotas = round($this->detalle_cuotas->sum('importe'), 2);
    }
    public function openModalCreateProduct()
    {
        $this->dispatch('openModalCreate');
    }
    //AÑADIR ITEM SELECCIONADO A LA LISTA DE ITEMS
    #[On('add-producto-selected')]
    function addProducto($selected)
    {
        try {

            $this->items->push([
                'producto_id' => $selected["producto_id"],
                'codigo' => $selected["codigo"],
                'cantidad' => $selected["cantidad"],
                'unit' => $selected["unit"],
                'unit_name' => $selected["unit_name"],
                'descripcion' => $selected["descripcion"],
                'valor_unitario' => $this->divisa == 'USD' ? round($selected["valor_unitario"] / $this->tipo_cambio, 2) : $selected["valor_unitario"],
                'precio_unitario' => $this->divisa == 'USD' ? round($selected["precio_unitario"] / $this->tipo_cambio, 2) : $selected["precio_unitario"],
                'igv' => $this->divisa == 'USD' ? round($selected["igv"] / $this->tipo_cambio, 2) : $selected["igv"],
                'porcentaje_igv' => $selected["porcentaje_igv"],
                'icbper' => $this->divisa == 'USD' ? round($selected["icbper"] / $this->tipo_cambio, 2) : $selected["icbper"],
                'total_icbper' => $this->divisa == 'USD' ? round($selected["total_icbper"] / $this->tipo_cambio, 2) : $selected["total_icbper"],
                'sub_total' =>  $this->divisa == 'USD' ? round($selected["valor_unitario"] * $selected["cantidad"] / $this->tipo_cambio, 2) : round($selected["valor_unitario"] * $selected["cantidad"], 2),
                'total' => $this->divisa == 'USD' ? round($selected["total"] / $this->tipo_cambio, 2) : $selected["total"],
                'codigo_afectacion' => $selected["codigo_afectacion"],
                'afecto_icbper' => $selected["afecto_icbper"],
                'tipo' => $selected["tipo"],
            ]);

            //ENVIAR EVENTO PARA REINICIAR PRODUCTO SELECCIONADO EN MODAL
            $this->dispatch('reset-selected');

            //  CALCULAR TOTALES AL AÑADIR PRODUCTO
            $this->reCalTotal();
        } catch (\Exception $e) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR AL AÑADIR PRODUCTO',
                mensaje: $e->getMessage(),
            );
        }
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

        $request = new CotizacionRequest();
        $datos = $this->validate($request->rules($this->cotizacion), $request->messages());

        try {

            $this->cotizacion->update($datos);
            $this->cotizacion->detalle()->delete();

            //ACTUALIZAR DIRECCION
            // if (is_null($this->cliente->direccion)) {

            //     $this->cliente->direccion = $datos["direccion"];
            //     $this->cliente->save();
            // }

            //CREAR ITEMS DE LA VENTA
            Cotizaciones::createItems($this->cotizacion, $datos["items"]);
            session()->flash('cotizacion-actualizada', 'Actualizada ' . $this->cotizacion->serie_correlativo);
            $this->redirectRoute('admin.cotizaciones.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch(
                'error',
                title: 'ERROR: ',
                mensaje: $th->getMessage(),
            );
        }
    }
    public function afterSave($mensaje)
    {
        $this->dispatch(
            'notify',
            icon: 'success',
            title: 'VENTA REGISTRADA',
            mensaje: $mensaje,
        );
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

    //METODO GLOBAL PARA HACER CALCULOS
    public function reCalTotal()
    {

        $this->sub_total =   $this->calcularSubTotal();
        $this->descuento =  $this->calcularDescuento();
        $this->op_gravadas = $this->calcularOperacionesGravadas($this->descuento);
        $this->op_exoneradas = $this->calcularOperacionesExoneradas();
        $this->op_inafectas = $this->calcularOperacionesInafectas();

        $this->icbper = $this->calcularIcbper();

        $this->igv =  $this->calcularIgv();
        $this->total =  $this->calcularTotal();
        $this->calcularCuotas($this->numero_cuotas);


        //$this->op_gratuitas = $this->calcularOperacionesGratuitas();
    }


    //CALCULAR EL SUB TOTAL DE LOS ITEMS
    public function calcularSubTotal()
    {
        $sub_total = $this->items->map(function ($item, $key) {

            $sub_total = 0;
            $sub_total =  $sub_total + $item["sub_total"];
            return round($sub_total, 2);
        });

        return $sub_total->sum();
    }

    //CALCULAR IGV DESDE EL SUB TOTAL - FALTA POR TRAER EL PROCENTAJE DEL IUMPUESTO DE LA DB
    public function calcularIgv()
    {

        $igv = floatval($this->op_gravadas) *  $this->empresa->igv;

        return round($igv, 2);
    }

    //CALCULAR TOTALES DE LOS TIPOS DE AFECTACIONES
    public function calcularOperacionesGravadas($descuento)
    {

        $op_gravadas = $this->items->map(function ($item, $key) {

            if ($item['codigo_afectacion'] == '10') {
                $op_gravadas = 0.00;
                $op_gravadas = $op_gravadas + ($item['valor_unitario'] * $item['cantidad']);
                return round($op_gravadas, 4);
            }
        })->sum();

        return round($op_gravadas - $descuento, 4);
    }

    // public function calcularOperacionesGratuitas()
    // {

    //     $op_gratuitas = $this->items->map(function ($item, $key) {

    //         if ($item['codigo_afectacion'] == '20') {
    //             $op_gratuitas = 0.00;
    //             $op_gratuitas = $op_gratuitas + $item['sub_total'];
    //             return round($op_gratuitas, 2);
    //         }
    //     })->sum();

    //     return round($op_gratuitas, 2);
    // }

    public function calcularOperacionesExoneradas()
    {
        $op_exoneradas = $this->items->map(function ($item, $key) {

            if ($item['codigo_afectacion'] == '20') {
                $op_exoneradas = 0.00;
                $op_exoneradas = $op_exoneradas + $item['sub_total'];
                return round($op_exoneradas, 2);
            }
        })->sum();

        return round($op_exoneradas, 2);
    }

    public function calcularOperacionesInafectas()
    {

        $op_inafectas = $this->items->map(function ($item, $key) {

            if ($item['codigo_afectacion'] == '30') {
                $op_inafectas = 0.00;
                $op_inafectas = $op_inafectas + $item['sub_total'];
                return round($op_inafectas, 2);
            }
        })->sum();

        return round($op_inafectas, 2);
    }

    public function calcularIcbper()
    {
        $icbper = $this->items->map(function ($item, $key) {

            if ($item['afecto_icbper']) {
                $icbper = 0.00;
                $icbper = $item["icbper"];
                return round($icbper * $item["cantidad"], 2);
            }
        })->sum();

        return round($icbper, 2);
    }

    //CALCUJLAR TOTAL DE ACUERDO AL TIPO DE DESCUENTO Y SI HAY
    public function calcularTotal()
    {

        $total = ($this->op_gravadas + $this->op_exoneradas + $this->op_inafectas + $this->icbper) + $this->igv;

        return round($total, 2);
    }

    public function updatedDescuentoMonto()
    {
        $this->validate([
            'descuento_monto' => [
                'lt:op_gravadas',
                'exclude_if:op_gravadas,0'
            ],
        ]);
        $this->reCalTotal();
    }

    public function updatedTipoDescuento()
    {
        $this->reCalTotal();
    }

    public function calcularDescuento()
    {
        // cantidad - porcentaje
        $descuento = 0.00;

        if ($this->tipo_descuento == "cantidad") {

            if ($this->total) {
                $this->validate([
                    'descuento_monto' => [
                        'min:0',
                    ],
                ]);
            }

            if (
                $this->sub_total && $this->descuento_monto > 0
            ) {

                $descuento = $this->descuento_monto;
                $this->descuento_factor = round($this->descuento_monto / $this->sub_total, 5);
            }
        }

        return round(
            $descuento,
            4
        );
    }

    public function eliminarProducto($key)
    {
        unset($this->items[$key]);
        $this->items;
        $this->reCalTotal();
    }

    public function updated($propertyName)
    {
        $request = new CotizacionRequest();
        $this->validateOnly($propertyName, $request->rules(), $request->messages());
    }
    // ABRIR MODAL PARA REGISTRAR PRODUCTO Y AÑADIR AL COMPROBANTE
    public function openModalAddProducto()
    {
        $this->dispatch('openModalAddProducto');
    }

    public function OpenModalCliente($busqueda)
    {
        $this->dispatch('open-modal-save-cliente', busqueda: $busqueda);
    }
}
