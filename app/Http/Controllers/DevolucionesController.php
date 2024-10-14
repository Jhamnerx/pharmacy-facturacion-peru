<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class DevolucionesController extends Controller
{

    public static function middleware(): array
    {
        return [
            new Middleware('role_or_permission:admin|devoluciones.ver', only: ['index']),
            new Middleware('role_or_permission:admin|devoluciones.crear', only: ['create']),
        ];
    }



    public function index()
    {
        return view('admin.devoluciones.index');
    }

    public function create()
    {
        return view('admin.devoluciones.create');
    }
}
