<?php

namespace App\Models;

use App\Enums\VentasStatus;
use App\Models\Scopes\LocalScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cotizaciones extends Model
{
    use HasFactory;
    use HasUuids;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
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
    public function detalle(): HasMany
    {
        return $this->hasMany(CotizacionesDetalle::class);
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
    public static function createItems(Cotizaciones $venta, $ventaItems, $decrease_stock = true)
    {

        foreach ($ventaItems as $ventaItem) {

            $ventaItem['ventas_id'] = $venta->id;

            $item = $venta->detalle()->create($ventaItem);

            if ($decrease_stock && $ventaItem['tipo'] == 'producto') {

                $item->producto->decrement('stock', $ventaItem['cantidad']);
            }

            $item->producto->increment('ventas', 1);
        }

        return $venta->detalle;
    }
}
