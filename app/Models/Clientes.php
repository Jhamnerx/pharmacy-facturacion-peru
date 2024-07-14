<?php

namespace App\Models;

use App\Models\Scopes\LocalScope;
use App\Observers\ClientesObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([ClientesObserver::class])]
class Clientes extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'clientes';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_nacimiento' => 'date',
        'ultima_compra' => 'datetime',
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

    public function ventas(): HasMany
    {
        return $this->hasMany(Ventas::class);
    }

    public function guiaRemision(): HasMany
    {
        return $this->hasMany(GuiaRemision::class);
    }

    public function cotizaciones(): HasMany
    {
        return $this->hasMany(Cotizaciones::class);
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
