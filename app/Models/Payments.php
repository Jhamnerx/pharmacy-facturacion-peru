<?php

namespace App\Models;

use App\Models\User;
use App\Models\CajaChica;
use App\Models\MetodoPago;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Payments extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'fecha' => 'date',
        'payed' => 'boolean',
    ];


    // Relación polimórfica con modelos ComprobantesVentas y Compras
    public function paymentable()
    {
        return $this->morphTo();
    }

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function metodoPago(): BelongsTo
    {
        return $this->belongsTo(MetodoPago::class, 'metodo_pago_id', 'codigo');
    }

    // Relación con CajaChica
    public function cajaChica()
    {
        return $this->belongsTo(CajaChica::class);
    }
}
