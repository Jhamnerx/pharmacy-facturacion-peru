<?php

namespace App\Models;

use App\Models\User;
use App\Models\Compras;
use App\Models\TipoDocumento;
use App\Models\Scopes\LocalScope;
use App\Observers\ProveedorObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(ProveedorObserver::class)]
class Proveedores extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'proveedores';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado' => 'boolean',
        'user_id' => 'integer',
    ];

    // GLOBAL SCOPE LOCAL
    protected static function booted()
    {
        static::addGlobalScope(new LocalScope);
    }

    // Scope local de activo
    public function scopeActive($query, $status)
    {
        return $query->where('estado', $status);
    }
    // Scope local de activo
    public function scopeTipoDoc($query, $tipo)
    {
        return $query->where('tipo_documento_id', $tipo);
    }


    public function compras(): HasMany
    {
        return $this->hasMany(Compras::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function tipoDocumento(): BelongsTo
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id', 'codigo');
    }
}
