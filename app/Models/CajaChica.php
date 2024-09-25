<?php

namespace App\Models;

use App\Observers\CajaChicaObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

#[ObservedBy([CajaChicaObserver::class])]
class CajaChica extends Model
{
    use HasFactory;
    protected $fillable = ['numero_referencia', 'monto_inicial', 'monto_final', 'fecha_apertura', 'fecha_cierre', 'estado', 'user_id', 'local_id', 'created_by'];

    protected $table = 'cajas_chicas';

    protected $casts = [
        'fecha_apertura' => 'datetime',
    ];

    // Relación con MovimientoCaja
    public function movimientos()
    {
        return $this->hasMany(MovimientoCaja::class);
    }

    // Relación con Usuario
    public function vendedor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function getPdf()
    {
        $empresa = Empresa::first();
        $local = Locales::where('id', session('local_id'))->first();

        $resumenPagos = $this->obtenerResumenPagos($this->id);

        view()->share([
            'datos' => $this,
            'empresa' => $empresa,
            'local' => $local,
            'resumenPagos' => $resumenPagos['resumenPagos'],
            'totalIngresos' => $resumenPagos['totalIngresos'],
            'totalEgresos' => $resumenPagos['totalEgresos'],
            'totalCPE' => $resumenPagos['totalCPE'],
            'totalNotaVenta' => $resumenPagos['totalNotaVenta'],
        ]);

        $html = view('pdf.caja.pdf');

        $pdf = PDF::loadHTML($html);
        return $pdf->stream('Reporte POS' . auth()->user()->id . "-" . Carbon::now()->format('d-m-Y'));
    }


    public function obtenerResumenPagos($cajaChicaId)
    {
        // Obtener la caja chica con los movimientos (ingresos y egresos)
        $cajaChica = CajaChica::with(['movimientos' => function ($query) {
            $query->whereIn('tipo', ['ingreso', 'egreso']);
        }, 'movimientos.movimientoable'])->find($cajaChicaId);

        // Agrupar por métodos de pago y calcular los ingresos y egresos
        $resumenPagos = $cajaChica->movimientos->groupBy(function ($movimiento) {
            return $movimiento->movimientoable->metodoPago->descripcion;
        })->map(function ($grupo) {
            $ingresos = $grupo->where('tipo', 'ingreso')->sum('monto'); // Sumar los ingresos
            $egresos = $grupo->where('tipo', 'egreso')->sum('monto');   // Sumar los egresos (compras)

            return [
                'metodo_pago' => $grupo->first()->movimientoable->metodoPago->descripcion,
                'ingresos' => $ingresos,
                'egresos' => $egresos,
                'suma_total' => $ingresos - $egresos, // Ingresos menos egresos
            ];
        });

        // Sumar todos los ingresos y egresos globalmente sin importar el método de pago
        $totalIngresos = $cajaChica->movimientos->where('tipo', 'ingreso')->sum('monto');
        $totalEgresos = $cajaChica->movimientos->where('tipo', 'egreso')->sum('monto');

        // Filtrar los movimientos para obtener solo aquellos que están asociados con ventas (App\Models\Ventas)
        $movimientosVentas = $cajaChica->movimientos->filter(function ($movimiento) {
            return $movimiento->movimientoable_type === 'App\\Models\\Ventas';
        });

        // Obtener los totales de CPE (facturas y boletas) filtrando por tipo_comprobante_id en las ventas
        $totalCPE = $movimientosVentas->filter(function ($movimiento) {
            return in_array($movimiento->movimientoable->tipo_comprobante_id, ['01', '03']); // Factura (01) o Boleta (03)
        })->sum(function ($movimiento) {
            return $movimiento->movimientoable->total; // Sumar el campo "total" de las ventas
        });

        // Obtener los totales de Notas de Venta (tipo_comprobante_id = '02')
        $totalNotaVenta = $movimientosVentas->filter(function ($movimiento) {
            return $movimiento->movimientoable->tipo_comprobante_id === '02'; // Nota de Venta (02)
        })->sum(function ($movimiento) {
            return $movimiento->movimientoable->total; // Sumar el campo "total" de las notas de venta
        });

        return [
            'resumenPagos' => $resumenPagos,
            'totalIngresos' => $totalIngresos,
            'totalEgresos' => $totalEgresos,
            'totalCPE' => $totalCPE,                // Total CPE (facturas y boletas)
            'totalNotaVenta' => $totalNotaVenta,    // Total de Notas de Venta
        ];
    }
}
