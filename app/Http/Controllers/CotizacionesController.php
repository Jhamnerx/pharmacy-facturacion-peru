<?php

namespace App\Http\Controllers;

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
}
