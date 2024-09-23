<?php

namespace App\Models;

use App\Observers\CajaChicaObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([CajaChicaObserver::class])]
class CajaChica extends Model
{
    use HasFactory;
    protected $fillable = ['numero_referencia', 'monto_inicial', 'monto_final', 'fecha_apertura', 'fecha_cierre', 'estado', 'user_id', 'local_id', 'created_by'];

    protected $table = 'cajas_chicas';

    // Relación con MovimientoCaja
    public function movimientos()
    {
        return $this->hasMany(MovimientoCaja::class);
    }

    // Relación con Usuario
    public function vendedor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
