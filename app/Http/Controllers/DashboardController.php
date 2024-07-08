<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function dashboard(Request $request)
    {
        $empresa = Empresa::first();

        if (!$request->session()->has('local_id')) {

            $request->session()->put('local_id', 1);
        }

        return view('dashboard', compact('empresa'));
    }
}
