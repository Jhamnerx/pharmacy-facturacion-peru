<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VentasDetalle extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'ventas_detalles';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'venta_id' => 'integer',
        'cantidad' => 'integer:2',
        'valor_unitario' => 'decimal:6',
        'precio_unitario' => 'decimal:2',
        'icbper' => 'decimal:2',
        'igv' => 'decimal:2',
        'descuento' => 'decimal:',
        'descuento_factor' => 'decimal:5',
        'valor_total' => 'decimal:2',
        'importe_total' => 'decimal:2',
    ];

    public function venta(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Ventas::class);
    }

    public function producto(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Productos::class)->withTrashed();
    }
}
