<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CajaChicaController extends Controller
{
    public function index()
    {
        return view('admin.cajas.index');
    }
}
