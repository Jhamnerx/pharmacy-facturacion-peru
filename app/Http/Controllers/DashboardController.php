<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class DashboardController extends Controller
{

    // public static function middleware(): array
    // {
    //     return [
    //         new Middleware('role_or_permission:admin|dashboard.ver', only: ['dashboard']),
    //     ];
    // }

    public function dashboard(Request $request)
    {
        $empresa = Empresa::first();

        if (!$request->session()->has('local_id')) {

            $request->session()->put('local_id', 1);
        }

        return view('dashboard', compact('empresa'));
    }
}
