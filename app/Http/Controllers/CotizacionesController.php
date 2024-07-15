<?php

namespace App\Http\Controllers;

use App\Models\Cotizaciones;
use Illuminate\Http\Request;

class CotizacionesController extends Controller
{
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
