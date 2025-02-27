<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MetodoPago extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'metodo_pago';

    public function compras(): HasMany
    {
        return $this->hasMany(Compras::class);
    }

    public function ventas(): HasMany
    {
        return $this->hasMany(Ventas::class, 'metodo_pago_id', 'codigo');
    }

    public function cotizaciones(): HasMany
    {
        return $this->hasMany(Cotizaciones::class);
    }
}
