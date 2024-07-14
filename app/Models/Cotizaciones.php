<?php

namespace App\Models;

use App\Enums\VentasStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Enums\PresupuestosStatus;
use App\Models\Scopes\LocalScope;
use App\Observers\CotizacionObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Notifications\Ventas\EnviarPresupuestoCliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(CotizacionObserver::class)]
class Cotizaciones extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $table = 'presupuestos';
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
            'estado' => PresupuestosStatus::class,
            'detalle_cuotas' => AsCollection::class,
            'nota' => AsCollection::class,
        ];
    }

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    // Scope local de estado
    public function scopeEstado($query, string $status)
    {
        return $query->where('estado', $status);
    }
    public function scopePendiente($query)
    {
        return $query->where('estado', '0');
    }

    // GLOBAL SCOPE LOCAL
    protected static function booted()
    {
        static::addGlobalScope(new LocalScope);
    }
    public function detalle(): HasMany
    {
        return $this->hasMany(CotizacionesDetalle::class, 'presupuestos_id', 'id');
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

    public function getSerie(): BelongsTo
    {
        return $this->belongsTo(Series::class, 'serie', 'serie');
    }

    public function detraccion(): HasOne
    {
        return $this->hasOne(Detracciones::class, 'venta_id', 'id');
    }

    public function anticipos(): HasMany
    {
        return $this->hasMany(Anticipos::class, 'venta_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    //CREAR ITEM DETALLE VENTA
    public static function createItems(Cotizaciones $venta, $ventaItems)
    {

        foreach ($ventaItems as $ventaItem) {

            $ventaItem['presupuestos_id'] = $venta->id;

            $item = $venta->detalle()->create($ventaItem);


            $item->producto->increment('ventas', 1);
        }

        return $venta->detalle;
    }

    public function getPDFData()
    {

        $empresa = Empresa::first();

        view()->share([
            'presupuesto' => $this,
            'empresa' => $empresa,
        ]);

        //NUEVA VERSION CON DATOS ADICIONALES

        $pdf = PDF::loadView('pdf.cotizacion.pdf-new')->setPaper('Legal')->setOption(['isHtml5ParserEnabled' => false]);
        return $pdf->stream($this->serie_correlativo . '.pdf');
    }


    public function getPDFDataToMail($data)
    {
        $empresa = Empresa::first();

        view()->share([
            'presupuesto' => $this,
            'empresa' => $empresa,
        ]);

        $pdf = PDF::loadHTML(view('pdf.cotizacion.pdf-new'))->setPaper('Legal');

        //return $pdf->download($this->serie_correlativo . '.pdf');
        $this->cliente->notify(new EnviarPresupuestoCliente($this, $pdf, $data));
    }
}
