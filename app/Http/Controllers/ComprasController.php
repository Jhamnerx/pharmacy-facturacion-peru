<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index()
    {
        return view('admin.compras.index');
    }
    public function create()
    {
        return view('admin.compras.create');
    }
}
