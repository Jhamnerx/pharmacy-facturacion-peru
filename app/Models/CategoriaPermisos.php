<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class CategoriaPermisos extends Model
{
    use HasFactory;
    protected $table = 'categoria_permisos';

    public function permisos()
    {
        return $this->hasMany(Permission::class, 'categoria_id');
    }
}
