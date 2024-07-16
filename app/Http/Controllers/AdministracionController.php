<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdministracionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('role_or_permission:admin', only: ['ajustes', 'cuenta', 'sunat', 'notificaciones', 'roles', 'series']),
        ];
    }

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
