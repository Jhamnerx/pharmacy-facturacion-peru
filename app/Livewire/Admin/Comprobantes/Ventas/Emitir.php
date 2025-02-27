<?php

namespace App\Livewire\Admin\Comprobantes\Ventas;

use Carbon\Carbon;
use App\Models\Series;
use App\Models\Ventas;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Clientes;
use App\Models\Productos;
use Livewire\Attributes\On;
use App\Models\TipoComprobantes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\CodigosDetracciones;
use App\Http\Requests\VentasRequest;
use App\Http\Controllers\UtilesController;
use App\Http\Controllers\Facturacion\Api\ApiFacturacion;

class Emitir extends Component
{

    //PROPIEDADES DE VENTA
    public $tipo_comprobante_id = '02', $serie, $correlativo, $serie_correlativo, $cliente_id,
        $direccion, $fecha_emision, $fecha_hora_emision, $fecha_vencimiento,
        $divisa = "PEN", $tipo_cambio, $metodo_pago_id = "009", $comentario,
        $igv_op = 0.00, $tipo_descuento = "cantidad", $descuento_factor,
        $adelanto = 0.00,  $numero_cuotas = 0,
        $vence_cuotas = 30, $forma_pago = "CONTADO";

    public $sub_total = 0.00, $op_gravadas = 0.00, $op_exoneradas = 0.00, $op_inafectas = 0.00,
        $op_gratuitas = 0.00, $descuento = 0.00, $igv = 0.00, $icbper = 0.00,  $total = 0.00;


    public Collection $detalle_cuotas;

    //PROPIEDADES UTILES
    public $comprobante_slug;
    public $showCredit = false;
    public $product_selected_id;
    public $descuento_monto = 0.00;
    public $total_cuotas = 0.00;

    public Collection $items;
    public $cliente;
    public Empresa $empresa;
    public $pago_estado = 'PAID';

    public $simbolo = "S/. ";

    public $metodo_type = "02";

    //PROPIEDAD PARA ASIGNAR EL MINIMO DEL CORRELATIVO
    public $min_correlativo;

    //DISMINUIR STOCK
    public $decrease_stock = true;


    public $tipo_operacion = '0101';
    public $detraccion = false;
    public $openModalDt = false;
    public Collection $datosDetraccion;


    //pago anticipado
    public $pago_anticipado = false;
    public $deduce_anticipos = false;
    public Collection $prepayments;
    public $total_anticipos = 0.00;
    public $igv_anticipos = 0.00;


    //PROPIEDAD PARA VERIFICAR EMPRESA
    public $local_id;

    public $series = [];

    public function render()
    {
        return view('livewire.admin.comprobantes.ventas.emitir');
    }

    #[On('echo:ventas,VentaCreada')]
    public function actualizarVista()
    {

        $this->render();
    }

    public function openModalDetraccion()
    {
        $this->openModalDt = true;
    }

    public function updatedDatosDetraccionCodigoDetraccion($value)
    {
        if ($value) {
            $dt = CodigosDetracciones::where('codigo', $value)->first();
            $this->datosDetraccion['porcentaje'] = $dt->porcentaje;
            $this->calcularMontoDetraccion($this->total);
            $this->calcularCuotas($this->numero_cuotas);
        } else {
            $this->datosDetraccion['porcentaje'] = 0.00;
            $this->datosDetraccion['monto'] = 0.00;
        }
    }

    public function calcularMontoDetraccion($total)
    {
        $monto = $total * ($this->datosDetraccion['porcentaje'] / 100);

        if ($this->divisa == 'USD') {
            $this->datosDetraccion['monto'] = round($monto * $this->tipo_cambio);
        } else {
            $this->datosDetraccion['monto'] = round($monto);
        }
    }

    public function mount()
    {
        //CARGAR SERIES
        $this->series = $this->loadSeries();
        $this->setSerieMount();

        //ESTABLACER FECHAS DEFAULT
        $this->fecha_emision = Carbon::now()->format('Y-m-d');
        $this->fecha_vencimiento = Carbon::now()->format('Y-m-d');

        $this->items = collect();
        $this->detalle_cuotas = collect();

        //  CONSULTAR TIPO CAMBIO
        $util = new UtilesController;
        $this->tipo_cambio = $util->tipoCambio();

        //CUANDO ES BOLETA SELECCIONAR EL PRIMER CLIENTES QUE ES 00000 Y NO TIENE DIRECCION
        if ($this->tipo_comprobante_id == "03") {
            $this->cliente_id = 1;
            $this->cliente = Clientes::find(1);
        }

        //CUANDO ES NOTA DE VENTA SOLO GUARDAR EN BD
        if ($this->tipo_comprobante_id == '02') {

            $this->metodo_type = '03';
        }

        $this->empresa = Empresa::first();


        //DETRACCION INICIALIZAR DATOS
        $this->datosDetraccion = collect([
            'codigo_detraccion' => '',
            'porcentaje' => 0.00,
            'monto' => 0.00,
            'metodo_pago_id' => '001',
            'cuenta_bancaria' => $this->empresa->cuenta_detraccion,
        ]);

        $this->prepayments = collect();
        $this->local_id = session('local_id');
    }

    //CARGAR SERIES DE ACUERDO AL TIPO DE COMPROBANTE
    public function updatedTipoComprobanteId($value)
    {
        $this->metodo_type = "02";
        $this->series = $this->loadSeries();
        $this->setSerieMount();
    }

    //CARGAR DIRECCION DEL CLIENTE
    public function updatedClienteId($value)
    {
        if ($value) {
            $this->cliente = Clientes::findOrFail($value);
            $this->direccion =  $this->cliente->direccion;
        }
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
    #[On('echo:ventas,VentaCreada')]
    public function setSerieMount()
    {
        //$this->dispatch('notify-toast', icon: 'success', title: 'VENTA CREADA', mensaje: 'Venta creada desde POS', timer: 5000);
        $serie = Series::where('tipo_comprobante_id', $this->tipo_comprobante_id)->first();
        //dd($serie);
        $this->serie = $serie->serie;
        $this->correlativo = $serie->correlativo + 1;
        $this->min_correlativo = $serie->correlativo + 1;
        $this->serie_correlativo = $this->serie . "-" . $this->correlativo;
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

        $this->calcularMontoDetraccion($this->total);
        $this->calcularCuotas($this->numero_cuotas);
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
            // $item['precio_unitario'] = round($item['precio_unitario'] / $this->tipo_cambio, 6);
            // $item['igv'] = round($item['igv'] / $this->tipo_cambio, 2);
            // $item['icbper'] = round($item['icbper'] / $this->tipo_cambio, 2);
            // $item['total_icbper'] = round($item['total_icbper'] / $this->tipo_cambio, 2);
            // $item['sub_total'] = round($item['sub_total'] / $this->tipo_cambio, 2);
            // $item['total'] = round($item['total'] / $this->tipo_cambio, 2);
            return $item;
        });

        $this->calcularMontosLinea();
    }

    public function convertMontosTotalesToSoles()
    {
        $this->sub_total =  $this->sub_total * $this->tipo_cambio;
        $this->op_gravadas = $this->op_gravadas * $this->tipo_cambio;
        $this->op_exoneradas = $this->op_exoneradas * $this->tipo_cambio;
        $this->op_inafectas = $this->op_inafectas *   $this->tipo_cambio;
        $this->icbper = $this->icbper * $this->tipo_cambio;
        $this->igv =  $this->igv * $this->tipo_cambio;
        $this->total =  $this->total * $this->tipo_cambio;
        $this->descuento =  $this->descuento * $this->tipo_cambio;

        $this->items = $this->items->map(function ($item) {
            $item['valor_unitario'] = round($item['valor_unitario'] * $this->tipo_cambio, 6);
            // $item['precio_unitario'] = round($item['precio_unitario'] * $this->tipo_cambio, 2);
            // $item['igv'] = round($item['igv'] * $this->tipo_cambio, 2);
            // $item['icbper'] = round($item['icbper'] * $this->tipo_cambio, 2);
            // $item['total_icbper'] = round($item['total_icbper'] * $this->tipo_cambio, 2);
            // $item['sub_total'] = round($item['sub_total'] * $this->tipo_cambio, 2);
            // $item['total'] = round($item['total'] * $this->tipo_cambio, 2);
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

        if ($this->forma_pago == "CREDITO") {

            $this->showCredit = true;
            $this->resetCrediFields();
        } else {
            $this->showCredit = false;
        }
    }

    public function resetCrediFields()
    {
        $this->numero_cuotas = 0;
        $this->adelanto = 0.00;
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
                'importe' => $this->total > 0 ? round(floatval(($this->detraccion ? ($this->total - $this->datosDetraccion['monto']) : $this->total) / $nCuotas), 2)  : 0.00,
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
                'descripcion' => $this->pago_anticipado ? $selected["descripcion"] . "***Pago Anticipado***" : $selected["descripcion"],
                'valor_unitario' => $this->divisa == 'USD' ? round($selected["valor_unitario"] / $this->tipo_cambio, 2) : $selected["valor_unitario"],
                'precio_unitario' => $this->divisa == 'USD' ? round($selected["precio_unitario"] / $this->tipo_cambio, 2) : $selected["precio_unitario"],
                'igv' => $this->divisa == 'USD' ? round($selected["igv"] / $this->tipo_cambio, 2) : $selected["igv"],
                'porcentaje_igv' => $selected["porcentaje_igv"],
                'icbper' => $this->divisa == 'USD' ? round($selected["icbper"] / $this->tipo_cambio, 2) : $selected["icbper"],
                'total_icbper' => $this->divisa == 'USD' ? round($selected["total_icbper"] / $this->tipo_cambio, 2) : $selected["total_icbper"],
                'sub_total' =>  $this->divisa == 'USD' ? round($selected["valor_unitario"] * $selected["cantidad"] / $this->tipo_cambio, 4) : round($selected["valor_unitario"] * $selected["cantidad"], 4),
                'total' => $this->divisa == 'USD' ? round($selected["total"] / $this->tipo_cambio, 4) : $selected["total"],
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

    #[On('add-prepayment')]
    public function addPrepayment($prepayments)
    {

        $this->prepayments->push($prepayments);
        $this->dispatch('reset-prepayments');
        $this->calcularAnticipos();
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

        $request = new VentasRequest();
        $datos = $this->validate($request->rules($this->detraccion), $request->messages());

        try {
            DB::beginTransaction();

            $venta = Ventas::create($datos);
            $venta->update(['estado' => 'COMPLETADO']);

            //ACTUALIZAR DIRECCION
            if (is_null($this->cliente->direccion)) {

                $this->cliente->direccion = $datos["direccion"];
                $this->cliente->save();
            }

            //CREAR ITEMS DE LA VENTA
            Ventas::createItems($venta, $datos["items"], $this->decrease_stock);


            //SI DETRACCION ES TRUE CREAR DETRACCION
            if ($this->detraccion) {
                $venta->detraccion()->create([
                    'codigo_detraccion' => $this->datosDetraccion['codigo_detraccion'],
                    'porcentaje' => $this->datosDetraccion['porcentaje'],
                    'monto' => $this->datosDetraccion['monto'],
                    'metodo_pago_id' => $this->datosDetraccion['metodo_pago_id'],
                    'cuenta_bancaria' => $this->datosDetraccion['cuenta_bancaria'],
                    'tipo_cambio' => $this->tipo_cambio,
                ]);
            }

            //SI ES ANTICIPO REGISTRAR ANTICIPO
            if ($this->deduce_anticipos) {

                Ventas::createPrepayments($venta, $this->prepayments);
            }
            //DB::commit();
            //ACTUALIZAR CORRELATIVO DE SERIE UTILIZADA
            $venta->getSerie->increment('correlativo');

            if ($this->metodo_type != '03' && $this->tipo_comprobante_id !== '02') {
                $api = new ApiFacturacion();

                $mensaje = $api->emitirInvoice($venta, $this->metodo_type, $this->tipo_operacion);

                if ($mensaje['fe_codigo_error']) {
                    session()->flash('venta-registrada', $mensaje["fe_mensaje_error"] . ': Intenta enviar en un rato');
                    $this->redirectRoute('admin.ventas.index');
                } else {
                    $this->metodo_type == '01' ? $venta->update(['estado' => 'BORRADOR']) : $venta->update(['estado' => 'COMPLETADO']);

                    session()->flash('venta-registrada', $mensaje['fe_mensaje_sunat']);
                    $this->redirectRoute('admin.ventas.index');
                }
            } else {
                $venta->update(['estado' => 'COMPLETADO']);
                session()->flash('venta-registrada', 'Nota de venta registrada');
                $this->redirectRoute('admin.ventas.index');
            }
            DB::commit();
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

        //CALCULAR DETRACCION SI ES TRUE
        if ($this->detraccion) {
            $this->calcularMontoDetraccion($this->total);
        }

        //$this->op_gratuitas = $this->calcularOperacionesGratuitas();
    }

    public function calcularAnticipos()
    {
        //CALCULAR ANTICIPOS
        $this->total_anticipos = $this->calcularTotalAnticipos();
        $this->igv_anticipos = $this->calcularIvgAnticipos();

        $this->reCalTotal();
    }

    //CALCULAR EL SUB TOTAL DE LOS ITEMS
    public function calcularSubTotal()
    {
        $sub_total = $this->items->map(function ($item, $key) {

            $sub_total = 0;
            $sub_total =  $sub_total + $item["sub_total"];
            return round($sub_total, 2);
        });

        return $this->total_anticipos > 0 ? $sub_total->sum() - $this->total_anticipos : $sub_total->sum();
    }

    //CALCULAR IGV DESDE EL SUB TOTAL - FALTA POR TRAER EL PROCENTAJE DEL IUMPUESTO DE LA DB
    public function calcularIgv()
    {
        //dd($this->op_gravadas);

        if ($this->igv_anticipos > 0) {

            $igv = (floatval($this->op_gravadas) *  $this->empresa->igv);
            return round($igv, 2);
        } else {

            $igv = floatval($this->op_gravadas) *  $this->empresa->igv;

            return round($igv, 2);
        }
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

        if ($descuento > 0) {

            return round($op_gravadas - $descuento, 4);
        } else {

            return round($op_gravadas - $this->total_anticipos, 4);
        }
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
        if ($this->igv_anticipos > 0) {

            $total = (($this->op_gravadas + $this->op_exoneradas + $this->op_inafectas + $this->icbper) + $this->igv);

            return round($total, 2);
        } else {
            $total = ($this->op_gravadas + $this->op_exoneradas + $this->op_inafectas + $this->icbper) + $this->igv;

            return round($total, 2);
        }
    }

    public function calcularTotalAnticipos()
    {
        $total_anticipos = $this->prepayments->map(function ($item, $key) {

            $total_anticipos = 0.00;
            $total_anticipos = $total_anticipos + $item['valor_venta_ref'];
            return round($total_anticipos, 2);
        });

        return $total_anticipos->sum();
    }

    public function calcularIvgAnticipos()
    {
        $igv_anticipos = $this->prepayments->map(function ($item, $key) {

            $igv_anticipos = 0.00;
            $igv_anticipos = $igv_anticipos + $item['igv'];
            return round($igv_anticipos, 2);
        });

        return $igv_anticipos->sum();
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

            if ($this->sub_total && $this->descuento_monto > 0) {

                $descuento = $this->descuento_monto;
                $this->descuento_factor = round($this->descuento_monto / $this->sub_total, 5);
            }
        }
        // else {
        //     if ($this->total) {
        //         $rules = $this->validate([
        //             'descuento_monto' => [
        //                 'min:0',

        //             ],
        //         ]);
        //     }
        //     //calculcart el porncetaje del descuento del subtotal
        //     $descuento = ($this->op_gravadas * $this->descuento_monto) / 100;
        // }

        return round($descuento, 4);
    }

    public function eliminarProducto($key)
    {
        unset($this->items[$key]);
        $this->items;
        $this->reCalTotal();
    }

    public function eliminarPrepayment($key)
    {
        unset($this->prepayments[$key]);
        $this->prepayments;
        $this->calcularAnticipos();
    }

    public function updated($propertyName)
    {
        $request = new VentasRequest();
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

    public function updatedDetraccion()
    {
        if ($this->detraccion) {
            $this->tipo_operacion = '1001';
            $this->calcularMontoDetraccion($this->total);
        } else {
            $this->tipo_operacion = '0101';
        }
        $this->calcularCuotas($this->numero_cuotas);
    }

    public function updatedPagoAnticipado($value)
    {

        if ($value) {
            $this->items = $this->items->map(function ($item) {
                $item['descripcion'] .= '***Pago Anticipado***';
                return $item;
            });
        } else {
            $this->items = $this->items->map(function ($item) {
                $item['descripcion'] = str_replace('***Pago Anticipado***', '', $item['descripcion']);
                return $item;
            });
        }
    }
}
