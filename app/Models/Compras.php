<?php

namespace App\Models;

use App\Models\Scopes\LocalScope;
use App\Observers\ComprasObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([ComprasObserver::class])]
class Compras extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'compras';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_emision' => 'date:Y-m-d',
        'sub_total' => 'decimal:2',
        'igv' => 'decimal:2',
        'total' => 'decimal:2',
        'user_id' => 'integer',
    ];

    // GLOBAL SCOPE LOCAL
    protected static function booted()
    {
        static::addGlobalScope(new LocalScope);
    }

    public function detalle(): HasMany
    {
        return $this->hasMany(ComprasDetalle::class, 'compras_id', 'id');
    }

    public function tipoComprobante(): BelongsTo
    {
        return $this->belongsTo(\App\Models\TipoComprobantes::class, 'tipo_comprobante_id', 'codigo');
    }

    public function metodoPago(): BelongsTo
    {
        return $this->belongsTo(MetodoPago::class, 'metodo_pago_id', 'codigo');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedores::class, 'proveedor_id', 'id')->withTrashed()->withoutGlobalScope(LocalScope::class);
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class, 'producto_id', 'id');
    }

    //CREAR ITEM DETALLE VENTA
    public static function createItems($items, Compras $compra)
    {
        foreach ($items as $item) {
            $item['compras_id'] = $compra->id;

            // Crear o actualizar el detalle de la compra
            $detalleItem = $compra->detalle()->create($item);

            // Verificar si el lote ya existe
            $loteExistente = Lote::where('producto_id', $item['producto_id'])
                ->where('codigo_lote', $item['codigo_lote'])
                ->first();

            if ($loteExistente) {
                // Si el lote ya existe, incrementar su stock
                $loteExistente->increment('stock', $item['cantidad']);
            } else {
                // Si el lote no existe, crear uno nuevo
                Lote::create([
                    'producto_id' => $item['producto_id'],
                    'codigo_lote' => $item['codigo_lote'],
                    'fecha_vencimiento' => $item['fecha_vencimiento'],
                    'stock' => $item['cantidad'],
                ]);
            }

            // Incrementar el stock del producto
            $detalleItem->producto->increment('stock', $item['cantidad']);
        }

        return $compra->detalle;
    }

    // Relación polimórfica inversa con MovimientoCaja
    public function movimientos()
    {
        return $this->morphMany(MovimientoCaja::class, 'movimientoable');
    }
}
