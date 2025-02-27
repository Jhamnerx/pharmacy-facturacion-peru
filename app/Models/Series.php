<?php

namespace App\Models;

use App\Models\Scopes\LocalScope;
use App\Models\TipoComprobantes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Series extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'series';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'correlativo' => 'integer',
        'tipo_comprobante_id' => 'string',
        'serie' => 'string',
    ];


    // GLOBAL SCOPE LOCAL
    protected static function booted()
    {
        static::addGlobalScope(new LocalScope);
    }

    public function tipoComprobante(): BelongsTo
    {
        return $this->belongsTo(\App\Models\TipoComprobantes::class, 'tipo_comprobante_id', 'codigo');
    }

    public function local(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Locales::class, 'local_id', 'id');
    }
}
