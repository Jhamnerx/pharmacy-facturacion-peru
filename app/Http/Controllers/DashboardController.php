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
        $total_compras = $this->getTotalesCompras(6, $request->local_id);
        $total_ventas = $this->getTotalesVentas(6, $request->divisa, $request->local_id);
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
    public function getDataVentasDiarias(Request $request)
    {
        $labels = $this->getLabelsDaily(7);
        $total_ventas = $this->getTotalesVentasDiarias(6, $request->divisa, $request->local_id);
        return (object)[
            'labels' => $labels,
            'data' => [
                'Ventas' => [
                    'totales' => $total_ventas,
                ],
            ]
        ];
    }
    public static function getLabelsDaily($day = 1)
    {
        $labels = [];
        for (
            $i = 0;
            $i < $day;
            $i++
        ) {
            array_push(
                $labels,
                Carbon::now()->startOfDay()->subDay($i)->format('d-m-Y')
            );
        }
        return $labels;
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

    private function getTotalesCompras($nMeses = 1, $local_id = null)
    {
        $totales = [];

        for ($i = 0; $i < $nMeses; $i++) {
            // Obtener el mes actual menos $i meses
            $mes = Carbon::now()->subMonth($i)->format('m');

            // Consulta para calcular el total
            $total = Compras::withoutGlobalScopes()->whereMonth(
                'fecha_emision',
                $mes
            )->where('local_id', $local_id)
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

    private function getTotalesVentas($nMeses = 1, $divisa = null, $local_id = null)
    {
        $totales = [];

        for ($i = 0; $i < $nMeses; $i++) {
            // Obtener el mes actual menos $i meses
            $mes = Carbon::now()->subMonth($i)->format('m');

            // Consulta para calcular el total
            $total = Ventas::withoutGlobalScopes()->where('local_id', $local_id)->whereMonth('created_at', $mes)
                ->whereNull('deleted_at')
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

    private function getTotalesVentasDiarias($dias = 1, $divisa = null, $local_id = null)
    {
        $totales = [];

        for ($i = 0; $i < $dias; $i++) {
            // Obtener el mes actual menos $i meses
            $mes = Carbon::now()->subDay($i)->format('d');

            // Consulta para calcular el total
            $total = Ventas::withoutGlobalScopes()->where('local_id', $local_id)->whereDay('created_at', $mes)
                ->whereNull('deleted_at')
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
