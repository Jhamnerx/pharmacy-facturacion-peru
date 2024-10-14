<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevolucionesDetalle extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'devolucion_productos';

    protected $casts = [
        'id' => 'integer',
        'devolucion_id' => 'integer',
        'producto_id' => 'integer',
        'cantidad' => 'integer',
        'precio_unitario' => 'decimal:2',
        'sub_total' => 'decimal:2',
    ];


    public function devolucion()
    {
        return $this->belongsTo(Devoluciones::class, 'devolucion_id');
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'producto_id');
    }
}
