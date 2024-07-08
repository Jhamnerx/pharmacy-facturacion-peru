<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function ventas()
    {
        return view('admin.reportes.ventas');
    }
    public function compras()
    {
        return view('admin.reportes.compras');
    }
}
