<?php

namespace App\Models;

use App\Models\Clientes;
use App\Models\MetodoPago;
use App\Enums\VentasStatus;
use App\Models\GuiaRemision;
use App\Models\VentasDetalle;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TipoComprobantes;
use App\Models\Scopes\LocalScope;
use App\Observers\VentasObserver;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarComprobanteCliente;
use Illuminate\Database\Eloquent\Model;
use Luecano\NumeroALetras\NumeroALetras;
use App\Http\Controllers\Facturacion\Api\Util;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(VentasObserver::class)]
class Ventas extends Model
{
    use HasFactory;
    use HasUuids;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'ventas';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'cliente_id' => 'integer',
            'fecha_emision' => 'date:Y-m-d',
            'fecha_hora_emision' => 'datetime',
            'fecha_vencimiento' => 'date',
            'tipo_cambio' => 'decimal:2',
            'metodo_pago_id' => 'string',
            'op_gravadas' => 'decimal:2',
            'op_exoneradas' => 'decimal:2',
            'op_inafectas' => 'decimal:2',
            'op_gratuitas' => 'decimal:2',
            'igv_op' => 'decimal:2',
            'descuento' => 'decimal:2',
            'descuento_factor' => 'decimal:5',
            'icbper' => 'decimal:2',
            'igv' => 'decimal:2',
            'sub_total' => 'decimal:2',
            'adelanto' => 'decimal:2',
            'total' => 'decimal:2',
            'user_id' => 'integer',
            'fe_estado' => 'string',
            'nota_credito_id' => 'integer',
            'nota_debito_id' => 'integer',
            'bienes_selva' => 'boolean',
            'servicios_selva' => 'boolean',
            'viewed' => 'boolean',
            'sent' => 'boolean',
            'estado' => VentasStatus::class,
            'detalle_cuotas' => AsCollection::class,
            'nota' => AsCollection::class,
        ];
    }

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    // GLOBAL SCOPE LOCAL
    protected static function booted()
    {
        static::addGlobalScope(new LocalScope);
    }

    protected function clase(): Attribute
    {
        return new Attribute(
            get: fn ($clase) => unserialize($clase),
            set: fn ($clase) => serialize($clase),
        );
    }
    // protected function nota(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($nota) => json_decode($nota, true),
    //         set: fn ($nota) => json_encode($nota),
    //     );
    // }

    public function detalle(): HasMany
    {
        return $this->hasMany(VentasDetalle::class);
    }

    public function guiaRemision(): HasMany
    {
        return $this->hasMany(GuiaRemision::class)->withTrashed()->withoutGlobalScope(LocalScope::class);
    }

    public function tipoComprobante(): BelongsTo
    {
        return $this->belongsTo(\App\Models\TipoComprobantes::class, 'tipo_comprobante_id', 'codigo');
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Clientes::class)->withTrashed()->withoutGlobalScope(LocalScope::class);
    }

    public function metodoPago(): BelongsTo
    {
        return $this->belongsTo(MetodoPago::class, 'metodo_pago_id', 'codigo');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function nota(): BelongsTo
    {
        return $this->belongsTo(Comprobantes::class);
    }

    public function getSerie(): BelongsTo
    {
        return $this->belongsTo(Series::class, 'serie', 'serie');
    }

    public function envioResumen(): BelongsTo
    {
        return $this->belongsTo(EnvioResumen::class, 'id_baja');
    }

    public function detraccion(): HasOne
    {
        return $this->hasOne(Detracciones::class, 'venta_id', 'id');
    }

    public function anticipos(): HasMany
    {
        return $this->hasMany(Anticipos::class, 'venta_id', 'id');
    }

    //CREAR ITEM DETALLE VENTA
    public static function createItems(Ventas $venta, $ventaItems, $decrease_stock = true)
    {
        foreach ($ventaItems as $ventaItem) {
            $ventaItem['ventas_id'] = $venta->id;

            $item = $venta->detalle()->create($ventaItem);

            if ($decrease_stock && $ventaItem['tipo'] == 'producto') {
                $producto = $item->producto;

                if (!$producto->decrementStockByLote($ventaItem['cantidad'])) {
                    throw new \Exception('No hay suficiente stock para el producto: ' . $producto->nombre);
                }
            }

            $item->producto->increment('ventas', $ventaItem['cantidad']);
        }

        return $venta->detalle;
    }

    public static function createPrepayments(Ventas $venta, $prepayments)
    {


        foreach ($prepayments as $prepayment) {

            $prepayment['venta_id'] = $venta->id;
            $venta->anticipos()->create(
                [
                    'descripcion' => $prepayment['descripcion'],
                    'serie_correlativo_ref' => $prepayment['serie_correlativo_ref'],
                    'tipo_comprobante_ref' => $prepayment['tipo_comprobante_ref'],
                    'igv' => $prepayment['igv'],
                    'total_invoice_ref' => $prepayment['total_invoice_ref'],
                    'valor_venta_ref' => $prepayment['valor_venta_ref'],
                    'fecha_emision_ref' => $venta->fecha_emision,
                ]
            );
        }

        return $venta->anticipos;
    }

    //FUNCION QUE LLAMA A LA CLASE UTIL PARA RENDERIZAR EL PDF
    public function getPdf($formato)
    {

        $util = Util::getInstance();

        $html = $util->getPdf($this, $formato);

        //return $html;
        if ($formato == 'pdf') {
            $pdf = Pdf::loadHTML($html)->setPaper('Legal');
        }

        if ($formato == 'ticket') {

            $size = [
                0,
                0,
                219,
                850.39
            ];

            // Si la forma de pago es 'CREDITO', se suma 100 al último elemento
            if ($this->forma_pago == 'CREDITO') {
                $size[3] += 50;
            }

            // Si 'detraccion' es verdadero, se suma 100 al último elemento
            if ($this->detraccion) {
                $size[3] += 50;
            }

            $pdf = Pdf::loadHTML($html)->setPaper($size);
        }

        return $pdf->stream('COMPROBANTE-' . $this->serie_correlativo . '.pdf');
    }

    public function getPDFToMail($empresa)
    {

        if ($this->tipo_comprobante_id !== '02') {
            $util = Util::getInstance();

            $html = $util->getPdf($this, 'pdf');


            return Pdf::loadHTML($html)->setPaper('Legal');
        } else {

            return Pdf::loadHTML(view('templates.comprobantes.nota-venta', ['venta' => $this, 'empresa' => $empresa]))->setPaper('Legal');
        }
    }

    //FUNCION QUE LLAMA A LA CLASE UTIL PARA RENDERIZAR EL PDF NOTA VENTA
    public function getPdfNotaVenta($formato)
    {

        $empresa = Empresa::first();
        view()->share(
            [
                'venta' => $this,
                'empresa', $empresa,
            ]
        );

        if ($formato == 'pdf') {
            $pdf = Pdf::loadView('templates.comprobantes.nota-venta', ['venta' => $this, 'empresa' => $empresa])->setPaper('Legal');
        }

        if ($formato == 'ticket') {

            $customPaper = array(0, 0, 219, 850.39);

            $pdf = Pdf::loadView('templates.comprobantes.ticket.nota-venta', ['venta' => $this, 'empresa' => $empresa])->setPaper($customPaper);
            // return view('templates.comprobantes.ticket.invoice', ['venta' => $this, 'empresa' => $empresa]);
        }


        return $pdf->stream('COMPROBANTE-' . $this->serie_correlativo . '.pdf');
    }

    //FUNCION QUE LLAMA A LA CLASE UTIL PARA RENDERIZAR EL PDF NOTA VENTA
    public function getPdfNotaVentaHtml($formato)
    {

        $empresa = Empresa::first();
        view()->share(
            [
                'venta' => $this,
                'empresa', $empresa,
            ]
        );


        if ($formato == 'ticket') {

            $customPaper = array(0, 0, 219, 850.39);

            return Pdf::loadView('templates.comprobantes.ticket.nota-venta', ['venta' => $this, 'empresa' => $empresa])->setPaper($customPaper);
            // return view('templates.comprobantes.ticket.invoice', ['venta' => $this, 'empresa' => $empresa]);
        }
    }

    public function downloadXml()
    {
        $util = Util::getInstance();
        return $util->downloadXml($this);
    }

    public function enviarComprobante($email)
    {
        $empresa = Empresa::first();
        $pdf = $this->getPDFToMail($empresa);

        Mail::to($email)->send(new EnviarComprobanteCliente($this, $email, $pdf, $empresa));
    }
}
