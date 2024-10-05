<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoCaja extends Model
{
    use HasFactory;
    protected $fillable = ['caja_chica_id', 'tipo', 'monto', 'descripcion', 'movimientoable_id', 'movimientoable_type', 'fecha', 'user_id', 'local_id', 'created_by'];

    protected $table = 'movimientos_caja';

    // Relación con CajaChica
    public function cajaChica()
    {
        return $this->belongsTo(CajaChica::class);
    }

    // Relación polimórfica con modelos ComprobantesVentas y Compras
    public function movimientoable()
    {
        return $this->morphTo();
    }

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
