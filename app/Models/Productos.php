<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Scopes\LocalScope;
use App\Observers\ProductosObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([ProductosObserver::class])]
class Productos extends Model implements Buyable
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'productos';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ventas' => 'integer',
        'categoria_id' => 'integer',
        'stock_minimo' => 'integer',
        'estado' => 'boolean',
        'stock' => 'integer',
        'fecha_vencimiento' => 'date',
        'precio_unitario' => 'decimal:2',
        'precio_minimo' => 'decimal:2',
        'precio_blister' => 'decimal:2',
        'precio_caja' => 'decimal:2',
        'costo_unitario' => 'decimal:2',
        'user_id' => 'integer',
        'cantidad_blister' => 'integer',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($producto) {
    //         $producto->codigo = self::generateProductCode();
    //     });
    // }

    // private static function generateProductCode()
    // {
    //     $prefix = 'MD'; // Los tres caracteres fijos
    //     $latestProduct = self::latest('id')->first();

    //     if (!$latestProduct) {
    //         $number = 1;
    //     } else {
    //         $number = intval(substr($latestProduct->code, strlen($prefix))) + 1;
    //     }

    //     return $prefix . str_pad($number, 5, '0', STR_PAD_LEFT); // Llenar con ceros a la izquierda para que tenga 6 dígitos
    // }


    public function getColorFechaVencimiento()
    {
        if ($this->fecha_vencimiento === null) {
            return ''; // No hay fecha de vencimiento
        }

        $hoy = Carbon::now();
        $fechaVencimiento = Carbon::parse($this->fecha_vencimiento);
        $diasRestantes = $fechaVencimiento->diffInDays($hoy, false);

        if ($diasRestantes < 0) {
            return 'text-rose-800'; // Producto vencido (color rojo)
        } elseif ($diasRestantes <= 7) {
            return 'text-orange-500'; // Faltan menos de 7 días (color naranja)
        } else {
            return 'text-emerald-500'; // Más de 7 días, sin color específico
        }
    }


    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    public function getBuyableDescription($options = null)
    {
        return $this->nombre;
    }

    public function getBuyablePrice($options = null)
    {
        return $this->precio_unitario;
    }

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
    public function scopeOnlyCategoria($query, $categoria_id)
    {
        if ($categoria_id == null) {
            return $query;
        }
        return $query->where('categoria_id', $categoria_id);
    }


    public function comprasDetalles(): HasMany
    {
        return $this->hasMany(ComprasDetalle::class);
    }

    public function ventaDetalles(): HasMany
    {
        return $this->hasMany(VentasDetalle::class);
    }

    public function cotizacionesDetalles(): HasMany
    {
        return $this->hasMany(CotizacionesDetalle::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Categorias::class);
    }

    public function tipoAfectacion(): BelongsTo
    {
        return $this->belongsTo(TipoAfectacion::class, 'tipo_afectacion', 'codigo');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_code', 'codigo');
    }

    //Relacion uno A UNO POLIMORFICA IMAGENES
    public function image()
    {
        return $this->morphOne(Imagen::class, 'imageable');
    }
}
