<?php

namespace App\Http\Controllers\Comprobantes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComprobantesController extends Controller
{

    public function index()
    {
        return view('admin.comprobantes.index');
    }

    public function pos()
    {
        return view('admin.comprobantes.pos');
    }
    public function emitir()
    {
        return view('admin.comprobantes.emitir');
    }
}
