<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ComprasController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('role_or_permission:admin|compras.ver', only: ['index']),
            new Middleware('role_or_permission:admin|compras.crear', only: ['create']),
        ];
    }

    public function index()
    {
        return view('admin.compras.index');
    }

    public function create()
    {
        return view('admin.compras.create');
    }
    public function editar($id)
    {
        $compra = Compras::findOrFail($id);
        return view('admin.compras.editar', compact('compra'));
    }
}
