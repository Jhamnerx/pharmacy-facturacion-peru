<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoComprobantes extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $primaryKey = "codigo";

    protected $table = 'tipo_comprobantes';

    protected $casts = [
        'codigo' => 'string',
        'descripcion' => 'string',
    ];

    public function compras(): HasMany
    {
        return $this->hasMany(Compras::class);
    }

    public function ventas(): HasMany
    {
        return $this->hasMany(Ventas::class, 'tipo_comprobante_id', 'codigo');
    }

    public function series(): HasMany
    {
        return $this->hasMany(Series::class, 'tipo_comprobante_id', 'codigo');
    }
}
