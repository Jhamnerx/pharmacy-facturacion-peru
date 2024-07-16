<?php

namespace App\Http\Controllers;

use App\Models\Cotizaciones;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class CotizacionesController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('role_or_permission:admin|cotizaciones.ver', only: ['index']),
            new Middleware('role_or_permission:admin|cotizaciones.crear', only: ['emitir']),
            new Middleware('role_or_permission:admin|cotizaciones.editar', only: ['editar']),
        ];
    }
    public function index()
    {
        return view('admin.cotizaciones.index');
    }

    public function emitir()
    {
        return view('admin.cotizaciones.create');
    }
    public function editar($id)
    {
        $cotizacion = Cotizaciones::findOrFail($id);
        return view('admin.cotizaciones.edit', compact('cotizacion'));
    }
}
