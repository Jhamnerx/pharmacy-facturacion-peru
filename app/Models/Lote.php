<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Productos;
use App\Observers\LoteObserver;
use App\Models\Scopes\LocalScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([LoteObserver::class])]
class Lote extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'lotes';

    protected $casts = [
        'fecha_vencimiento' => 'date',
        'stock' => 'integer',
        'producto_id' => 'integer',
        'proveedor_id' => 'integer',
    ];

    // Incluir el accesor en la serialización del modelo
    protected $appends = ['estado'];

    // GLOBAL SCOPE LOCAL
    protected static function booted()
    {
        static::addGlobalScope(new LocalScope);
    }
    // Accesor para el estado del lote
    public function getEstadoAttribute()
    {
        $hoy = Carbon::today();
        return $this->fecha_vencimiento < $hoy ? 'vencido' : 'no vencido';
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class)->withTrashed();
    }


    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'proveedor_id', 'id')->withTrashed();
    }
}
