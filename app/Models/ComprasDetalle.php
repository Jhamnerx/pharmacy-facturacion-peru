<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComprasDetalle extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'detalle_compras';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'compras_id' => 'integer',
        'cantidad' => 'decimal:2',
        'codigo_lote' => 'string',
        'fecha_vencimiento' => 'date:d-m-Y',
        'valor_unitario' => 'decimal:2',
        'precio_unitario' => 'decimal:2',
        'icbper' => 'decimal:2',
        'igv' => 'decimal:2',
        'descuento' => 'decimal:',
        'descuento_factor' => 'decimal:5',
        'valor_total' => 'decimal:2',
        'importe_total' => 'decimal:2',
    ];

    public function compra(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Compras::class);
    }
    public function producto(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Productos::class)->withTrashed();;
    }
}
