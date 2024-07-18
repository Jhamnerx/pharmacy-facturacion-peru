<?php

namespace App\Models;

use App\Models\Productos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lote extends Model
{
    use HasFactory;
    protected $fillable = ['producto_id', 'codigo_lote', 'fecha_vencimiento', 'stock', 'precio_compra', 'precio_venta'];

    public function producto()
    {
        return $this->belongsTo(Productos::class);
    }
}
