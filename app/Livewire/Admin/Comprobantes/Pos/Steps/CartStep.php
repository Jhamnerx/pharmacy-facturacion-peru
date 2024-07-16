<?php

namespace App\Livewire\Admin\Comprobantes\Pos\Steps;

use Carbon\Carbon;
use App\Models\Series;
use App\Models\Ventas;
use GuzzleHttp\Client;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Clientes;
use App\Models\Productos;
use App\Models\Categorias;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\VentasPosRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\UtilesController;
use App\Http\Controllers\Facturacion\Api\ApiFacturacion;

class CartStep extends Component
{

    use WithPagination;

    public $search;
    public $categoria_selected = null;

    public $perPage = 20; // Número inicial de categorías a cargar
    //public $quantities = [];

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    //PROPIEDADES DE LA CLASE
    public $tipo_comprobante_id = "02";
    public $showModal = false;


    //PROPIEDAS DEL CLIENTE A VERIFICAR
    public Clientes $cliente;

    //PROPIEDADES DE VENTA
    public $serie, $correlativo, $serie_correlativo, $cliente_id = null,
        $fecha_emision, $fecha_hora_emision, $fecha_vencimiento,
        $divisa = "PEN", $tipo_cambio, $metodo_pago_id = "009", $comentario,
        $tipo_descuento = "cantidad", $descuento_factor,
        $forma_pago = "CONTADO";


    public Collection $cart;

    public Empresa $empresa;

    public $sub_total = 0.00, $op_gravadas = 0.00, $op_exoneradas = 0.00, $op_inafectas = 0.00,
        $op_gratuitas = 0.00, $descuento = 0.00, $igv = 0.00, $icbper = 0.00,  $total;

    public $simbolo = "S/. ";

    public $descuento_monto = 0.00;
    public $pago = 0.00, $vuelto = 0.00;

    public $tipo_operacion = '0101';

    public $app_descuento = false;
    public $pago_estado = 'PAID';

    public $series = [];

    public function mount()
    {
        $this->empresa = Empresa::first();
        $this->loadCart();

        $this->cliente = Clientes::where('numero_documento', '00000000')->first();
        $this->cliente_id = $this->cliente->id;

        //ESTABLACER FECHAS DEFAULT
        $this->fecha_emision = Carbon::now()->format('Y-m-d');
        $this->fecha_vencimiento = Carbon::now()->format('Y-m-d');

        //CARGAR SERIES
        $this->series = $this->loadSeries();
        $this->setSerieMount();
        //  CONSULTAR TIPO CAMBIO
        $util = new UtilesController;
        $this->tipo_cambio = $util->tipoCambio();
    }

    public function loadSeries()
    {
        return Series::query()
            ->select('id', 'serie', 'correlativo', 'tipo_comprobante_id')
            ->orderBy('id')
            ->where('tipo_comprobante_id', $this->tipo_comprobante_id)->get()->toArray();
    }

    public function setSerieMount()
    {
        $serie = Series::where('tipo_comprobante_id', $this->tipo_comprobante_id)->first();
        $this->serie = $serie->serie;
        $this->correlativo = $serie->correlativo + 1;
        $this->serie_correlativo = $this->serie . "-" . $this->correlativo;
    }

    public function updatedSerie($value)
    {
        $this->changeSerieUpdate($value);
    }

    public function updatedAppDescuento($value)
    {
        if (!$value) {
            $this->descuento = 0.00;
            $this->descuento_monto = 0.00;
        }

        $this->loadCart();
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


    public function changeSerieUpdate($serie)
    {

        if ($serie) {

            $serie = Series::where('serie', $serie)->first();
            $this->serie = $serie->serie;
            $this->correlativo = $serie->correlativo + 1;
            $this->serie_correlativo = $this->serie . "-" . $this->correlativo;
        } else {

            $this->reset('correlativo');
        }
    }


    public function loadCart()
    {

        $this->cart = Cart::content()->map(function ($item) {

            $valor_unitario = $item->model->tipo_afectacion == '10' ? round($item->price / $this->empresa->igvbase, 6) : $item->price;

            $igv = $item->model->tipo_afectacion == '10' ?  round($item->price - (($item->price) / ($this->empresa->igv + 1)), 2) : 0.00;

            return [
                'rowId' => $item->rowId,
                'producto_id' => $item->id,
                'codigo' => $item->model->codigo,
                'cantidad' => $item->qty,
                'unit' => $item->model->unit->codigo,
                'unit_name' => $item->model->unit->name,
                'valor_unitario' => $valor_unitario,
                'igv' => ($igv * $item->qty),
                'precio_unitario' => $item->price,
                'porcentaje_igv' => $item->model->tipo_afectacion == '10' ? $this->empresa->igvbnormal : 0.00,
                'descripcion' => $item->model->nombre . ' ' . $item->model->descripcion,
                'name' => $item->name,
                'qty' => $item->qty,
                'sub_total' => round($valor_unitario * $item->qty, 2),
                'codigo_afectacion' => $item->model->tipo_afectacion,
                'afecto_icbper' => $item->model->afecto_icbper,
                'icbper' => ($item->model->afecto_icbper) ? round(floatval($this->empresa->icbper), 4) : 0.00,
                'total_icbper' => ($item->model->afecto_icbper) ? round(floatval($this->empresa->icbper) * floatval($item->qty), 4) : 0.00,
                'tipo' => $item->model->tipo,
                'total' => round($item->price * $item->qty, 2),
            ];
        })->collect();

        $this->reCalTotal();
    }

    public function updateProductTotal($rowId, $newTotal)
    {

        // Obtener el ítem del carrito
        $item = Cart::get($rowId);

        // Calcular el nuevo precio unitario basado en el nuevo total

        // Actualizar el precio del ítem en el carrito
        Cart::update($rowId, ['price' => $newTotal]);

        // Recargar el carrito
        $this->loadCart();
        $this->reCalTotal();
    }

    public function updated($propertyName)
    {
        // Verificar si la propiedad actualizada es el total del producto
        if (str_contains($propertyName, 'cart.') && str_contains($propertyName, '.precio_unitario')) {
            $rowId = explode('.', $propertyName)[1];
            $newTotal = $this->cart[$rowId]['precio_unitario'];

            $this->updateProductTotal($rowId, $newTotal);
        }
    }

    //CARGAR DIRECCION DEL CLIENTE
    public function updatedClienteId($value)
    {
        if ($value) {
            $this->cliente = Clientes::findOrFail($value);
        }
    }

    public function calcularPrecioUnitario($valor_unitario, $codigo_afectacion)
    {

        if ($codigo_afectacion) {
            return ($valor_unitario * $this->empresa->igv) + $valor_unitario;
        } else {
            return $valor_unitario;
        }
    }

    public function calcularMontosLinea()
    {
    }


    // public function updateCantidad()
    // {
    //     $this->loadCart();
    // }

    public function updateQuantity($rowId, $quantity)
    {
        Cart::update($rowId, $quantity);
        $this->loadCart();
        //$this->emit('cartUpdated'); // Emit an event if you need to listen for it elsewhere
    }


    public function loadMore()
    {
        $this->perPage += 20; // Incrementa el número de categorías a cargar
    }

    public function render()
    {
        $categorias = Categorias::paginate($this->perPage, pageName: 'categorias-page');

        $productos = Productos::whereHas('categoria', function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%');
        })->orWhere('codigo', 'like', '%' . $this->search . '%')
            ->orWhere('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('descripcion', 'like', '%' . $this->search . '%')
            ->orWhere('forma_farmaceutica', 'like', '%' . $this->search . '%')
            ->orWhere('presentacion', 'like', '%' . $this->search . '%')
            ->orWhere('numero_registro_sanitario', 'like', '%' . $this->search . '%')
            ->active(true)
            ->onlyCategoria($this->categoria_selected)
            ->with('categoria', 'unit', 'image')
            ->orderBy('id', 'desc')
            ->paginate(8, pageName: 'productos-page');

        return view('livewire.admin.comprobantes.pos.steps.cart-step', compact('categorias', 'productos'));
    }

    public function getProductos($categoria)
    {
        $this->categoria_selected = $categoria;
        $this->resetPage('productos-page');
    }

    public function addToCart($id)
    {
        $producto = Productos::find($id)->load('unit');

        Cart::add($producto);
        $this->loadCart();
        $this->notify();
    }

    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        $this->loadCart();
    }

    public function notify()
    {
        $this->dispatch(
            'notify-toast',
            icon: 'success',
            title: 'AÑADIDO AL CARRITO',
            mensaje: 'El producto se ha añadido al carrito correctamente',
        );
    }

    public function updatedSearch()
    {
        $this->resetPage();
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
        $this->calcularVuelto();
        // $this->calcularCuotas($this->numero_cuotas);

        // //CALCULAR DETRACCION SI ES TRUE
        // if ($this->detraccion) {
        //     $this->calcularMontoDetraccion($this->total);
        // }


        //$this->op_gratuitas = $this->calcularOperacionesGratuitas();
    }
    public function calcularDescuento()
    {
        // cantidad - porcentaje
        $descuento = 0.00;
        if ($this->tipo_descuento == "cantidad") {

            if ($this->app_descuento) {
                $rules = $this->validate([
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

        return round($descuento, 4);
    }


    //CALCULAR TOTALES DE LOS TIPOS DE AFECTACIONES
    public function calcularOperacionesGravadas($descuento = 0.00)
    {

        $op_gravadas = $this->cart->map(function ($item, $key) {

            if ($item['codigo_afectacion'] == '10') {
                $op_gravadas = 0.00;
                $op_gravadas = $op_gravadas + ($item['valor_unitario'] * $item['cantidad']);
                return round($op_gravadas, 4);
            }
        })->sum();


        if ($descuento > 0) {

            return round($op_gravadas - $descuento, 4);
        } else {

            return round($op_gravadas, 4);
        }
    }

    public function calcularOperacionesExoneradas()
    {
        $op_exoneradas = $this->cart->map(function ($item, $key) {

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

        $op_inafectas = $this->cart->map(function ($item, $key) {

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
        $icbper = $this->cart->map(function ($item, $key) {

            if ($item['afecto_icbper']) {
                $icbper = 0.00;
                $icbper = $item["icbper"];
                return round($icbper * $item["cantidad"], 2);
            }
        })->sum();

        return round($icbper, 2);
    }

    //CALCULAR EL SUB TOTAL DE LOS ITEMS
    public function calcularSubTotal()
    {
        $sub_total = $this->cart->map(function ($item, $key) {

            $sub_total = 0;
            $sub_total =  $sub_total + ($item["sub_total"]);
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

    //CALCUJLAR TOTAL DE ACUERDO AL TIPO DE DESCUENTO Y SI HAY
    public function calcularTotal()
    {
        $total = ($this->op_gravadas + $this->op_exoneradas + $this->op_inafectas + $this->icbper) + $this->igv;

        return round($total, 2);
    }

    public function nextStep()
    {

        $this->showModal = true;
        $this->pago = floatval($this->total);
        $this->calcularVuelto();
    }

    public function setTipoComprobante($tipo_comprobante_id)
    {
        $this->tipo_comprobante_id = $tipo_comprobante_id;
        $this->series = $this->loadSeries();
        $this->setSerieMount();
    }

    public function updatedPago()
    {
        $this->calcularVuelto();
    }

    public function calcularVuelto()
    {
        $this->vuelto = (floatval($this->pago) - floatval($this->total));
    }

    public function save()
    {
        $request = new VentasPosRequest();
        $datos = $this->validate($request->rules(), $request->messages());

        $total = round(($this->op_gravadas + $this->op_exoneradas + $this->op_inafectas + $this->icbper) + $this->igv, 2);


        if ($total != $this->total) {
            $this->dispatch(
                'notify-toast',
                icon: 'error',
                title: 'ERROR',
                mensaje: 'El total no coincide con los cálculos',
            );
            return;
        }

        try {

            $venta = Ventas::create($datos);

            //ACTUALIZAR DIRECCION
            if (is_null($this->cliente->direccion)) {

                $this->cliente->direccion = $datos["direccion"];
                $this->cliente->save();
            }

            //CREAR ITEMS DE LA VENTA
            Ventas::createItems($venta, $datos["cart"], true);

            //ACTUALIZAR CORRELATIVO DE SERIE UTILIZADA
            $venta->getSerie->increment('correlativo');

            if ($this->tipo_comprobante_id !== '02') {
                $api = new ApiFacturacion();

                $mensaje = $api->emitirInvoice($venta, "02", $this->tipo_operacion);
                $this->closeModal();

                if ($mensaje['fe_codigo_error']) {

                    $this->dispatch('notify-toast', icon: 'error', title: $mensaje['fe_mensaje_error'], mensaje: 'Intenta enviar en un rato');

                    $this->dispatch('finishVenta', venta: $venta->id);
                } else {
                    $this->dispatch('notify-toast', icon: 'success', title: 'VENTA REGISTRADA', mensaje: $mensaje['fe_mensaje_sunat']);
                    $venta->update(['estado' => 'COMPLETADO']);
                    $this->dispatch('finishVenta', venta: $venta->id);
                }
            } else {
                $this->closeModal();
                $this->dispatch('notify-toast', icon: 'success', title: 'NOTA DE VENTA REGISTRADA', mensaje: 'La nota de venta ha sido registrada correctamente');
                $this->dispatch('finishVenta', venta: $venta->id);
            }

            $this->afterVenta();
        } catch (\Throwable $th) {
            DB::rollBack();

            $this->dispatch(
                'error',
                title: 'ERROR: ',
                mensaje: $th->getMessage(),
            );
        }
    }

    public function afterVenta()
    {
        Cart::destroy();
        $this->loadCart();
        $this->tipo_comprobante_id = "02";
        $this->setSerieMount();
        //VentaCreada::dispatch();
        // $this->dispatch('venta-creada-from-pos')->to(Emitir::class);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function addCliente()
    {
        $this->dispatch('open-modal-save-cliente');
    }
}
