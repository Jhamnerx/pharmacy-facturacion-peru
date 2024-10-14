<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class CajaChicaController extends Controller
{

    public static function middleware(): array
    {
        return [
            new Middleware('role_or_permission:admin|caja_chica.ver', only: ['index']),
        ];
    }
    public function index()
    {
        return view('admin.cajas.index');
    }
}
