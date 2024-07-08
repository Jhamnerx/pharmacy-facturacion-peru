<?php

namespace App\Models;

use App\Models\Scopes\LocalScope;
use App\Observers\CategoriasObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([CategoriasObserver::class])]
class Categorias extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'categorias';
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'estado' => 'boolean',
        'local_id' => 'integer',
        'user_id' => 'integer',
    ];


    // GLOBAL SCOPE LOCAL
    protected static function booted()
    {
        static::addGlobalScope(new LocalScope);
    }


    public function productos(): HasMany
    {
        return $this->hasMany(Productos::class, 'categoria_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
