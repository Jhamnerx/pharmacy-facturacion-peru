<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Compras;
use App\Models\Ventas;
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

    public function getDataVentas(Request $request)
    {
        $labels = $this->getLabels(6);
        $total_compras = $this->getTotalesCompras(6);
        $total_ventas = $this->getTotalesVentas(6, $request->divisa);

        return (object)[
            'labels' => $labels,
            'data' => [
                'Compras' => [
                    'totales' => $total_compras,
                ],
                'Ventas' => [
                    'totales' => $total_ventas,
                ],
            ]
        ];
    }

    public static function getLabels($months = 1)
    {
        $labels = [];
        for (
            $i = 0;
            $i < $months;
            $i++
        ) {
            array_push(
                $labels,
                Carbon::now()->startOfMonth()->subMonth($i)->format('m-d-Y')
            );
        }
        return $labels;
    }

    private function getTotalesCompras($nMeses = 1)
    {
        $totales = [];

        for ($i = 0; $i < $nMeses; $i++) {
            // Obtener el mes actual menos $i meses
            $mes = Carbon::now()->subMonth($i)->format('m');

            // Consulta para calcular el total
            $total = Compras::whereMonth(
                'fecha_emision',
                $mes
            )
                ->selectRaw('SUM(CASE 
                            WHEN divisa = "usd" THEN total * tipo_cambio 
                            ELSE total 
                          END) as total_convertido')
                ->value('total_convertido');

            array_push(
                $totales,
                floatval($total)
            );
        }

        return $totales;
    }

    private function getTotalesVentas($nMeses = 1, $divisa = null)
    {
        $totales = [];

        for ($i = 0; $i < $nMeses; $i++) {
            // Obtener el mes actual menos $i meses
            $mes = Carbon::now()->subMonth($i)->format('m');

            // Consulta para calcular el total
            $total = Ventas::withoutGlobalScopes()->whereMonth('created_at', $mes)
                ->selectRaw('SUM(CASE 
                            WHEN divisa = "usd" THEN total * tipo_cambio 
                            ELSE total 
                          END) as total_convertido')
                ->value('total_convertido');

            array_push(
                $totales,
                floatval($total)
            );
        }

        return $totales;
    }
}
