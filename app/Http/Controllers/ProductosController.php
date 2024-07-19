<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProductosController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('role_or_permission:admin|productos.ver', only: ['index', 'lotes']),
        ];
    }

    public function index()
    {
        return view('admin.productos.index');
    }

    public function lotes()
    {
        return view('admin.lotes.index');
    }
}
