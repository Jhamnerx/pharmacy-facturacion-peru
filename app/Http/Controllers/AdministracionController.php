<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    public function ajustes()
    {
        return view('admin.administracion.ajustes');
    }

    public function cuenta()
    {
        return view('admin.administracion.cuenta');
    }

    public function sunat()
    {
        $empresa = Empresa::first();
        return view('admin.administracion.sunat', compact('empresa'));
    }

    public function notificaciones()
    {
        return view('admin.administracion.notificaciones');
    }
    public function roles()
    {
        return view('admin.administracion.roles');
    }
    public function series()
    {
        return view('admin.administracion.series');
    }
}
