<?php

namespace App\Models;

use App\Models\Scopes\LocalScope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresa';
    protected $primaryKey = 'id';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'id' => 'integer',
        'afecto_igv' => 'boolean',
        'bienes_selva' => 'boolean',
        'servicios_selva' => 'boolean',
        'mail_config' => 'array',
        'direccion' => 'array',
        'extra' => 'array',
        'sunat_datos' => 'json',
        'igv' => 'integer',
        'igv_base' => 'string',
        //'sunat_datos' => AsArrayObject::class,
    ];

    protected function mailConfig(): Attribute
    {
        return Attribute::make(
            get: fn ($mail_config) => json_decode($mail_config, true),
            set: fn ($mail_config) => json_encode($mail_config),
        );
    }
    protected function direccion(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    protected function sunatDatos(): Attribute
    {
        return new Attribute(
            get: fn ($sunat_datos) => json_decode($sunat_datos, true),
            set: fn ($sunat_datos) => json_encode($sunat_datos),
        );
    }

    protected function terminos(): Attribute
    {
        return new Attribute(
            get: fn ($terminos) => json_decode($terminos, true),
            set: fn ($terminos) => json_encode($terminos),
        );
    }

    protected  function igvbase(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => ($attributes["igv"] / 100) + 1,
        );
    }

    protected  function igvbnormal(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => ($attributes["igv"]),
        );
    }

    //+ IGV
    protected  function igv(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes["igv"] / 100,
        );
    }


    public function local()
    {
        return $this->belongsTo(Locales::class, 'empresa_id');
    }

    public function getSerieFacturaAttribute($value)
    {
        return $value;
    }
}
