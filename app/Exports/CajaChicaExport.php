<?php

namespace App\Exports;

use App\Models\Empresa;
use App\Models\Locales;
use App\Models\CajaChica;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CajaChicaExport implements FromArray, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $cajaChica;
    protected $totalIngresos;
    protected $totalEgresos;
    protected $totalCPE;
    protected $totalNotaVenta;
    protected $resumenPagos;
    protected $empresa;
    protected $local;

    public function __construct(CajaChica $cajaChica, $totalIngresos, $totalEgresos, $totalCPE, $totalNotaVenta, $resumenPagos)
    {

        $this->cajaChica = $cajaChica;
        $this->totalIngresos = $totalIngresos;
        $this->totalEgresos = $totalEgresos;
        $this->totalCPE = $totalCPE;
        $this->totalNotaVenta = $totalNotaVenta;
        $this->resumenPagos = $resumenPagos;
        $this->empresa = Empresa::first();
        $this->local = Locales::where('id', session('local_id'))->first();
    }

    public function array(): array
    {
        // Definir los datos para el reporte en Excel

        $data = [
            // Cabecera
            ['Reporte Punto de Venta'],
            ['Empresa', $this->empresa->razon_social],
            ['RUC', $this->empresa->ruc],
            ['Vendedor', $this->cajaChica->vendedor->name],
            ['Estado de Caja', $this->cajaChica->estado],
            ['Fecha reporte', now()->format('d-m-Y')],
            ['Establecimiento', $this->local->nombre . ' ' . $this->local->direccion],
            [''],
            ['Montos de operación'],
            ['Saldo inicial', 'Saldo final', 'Total Ingresos', 'Total Egresos'],
            [
                number_format($this->cajaChica->monto_inicial, 2),
                number_format($this->cajaChica->monto_final, 2),
                number_format($this->totalIngresos, 2),
                number_format($this->totalEgresos, 2),
            ],
            [''],
            ['Resumen de CPE y Notas de Venta'],
            ['Total efectivo CPE', 'Total efectivo Nota de Venta'],
            [
                number_format($this->totalCPE, 2),
                number_format($this->totalNotaVenta, 2),
            ],
            [''],
            // Resumen de pagos por método de pago
            ['#', 'Método de Pago', 'Total'],
        ];

        // Agregar el resumen de pagos
        $i = 1;
        foreach ($this->resumenPagos as $resumen) {
            $data[] = [$i++, $resumen['metodo_pago'], number_format($resumen['suma_total'], 2)];
        }

        // Agregar la tabla de transacciones
        $data[] = [''];
        $data[] = ['Resumen de Transacciones'];
        $data[] = ['#', 'Tipo Transacción', 'Tipo Documento', 'Documento', 'Fecha de Pago', 'Cliente/Proveedor', 'N° Documento', 'Moneda', 'Total'];

        $i = 1;
        foreach ($this->cajaChica->movimientos as $movimiento) {

            // Definir el tipo de documento según el tipo_comprobante_id
            $tipo_doc = "NOTA DE VENTA";
            switch ($movimiento->movimientoable->tipo_comprobante_id) {
                case '01':
                    $tipo_doc = "FACTURA ELECTRÓNICA";
                    break;
                case '03':
                    $tipo_doc = "BOLETA ELECTRÓNICA";
                    break;
            }

            // Determinar si es una Venta o una Compra y acceder a la relación correcta
            if ($movimiento->movimientoable instanceof \App\Models\Ventas) {
                // Si es una venta, usamos el cliente
                $entidadNombre = $movimiento->movimientoable->cliente->razon_social ?? 'Cliente no disponible';
                $entidadDocumento = $movimiento->movimientoable->cliente->numero_documento ?? 'N/A';
            } elseif ($movimiento->movimientoable instanceof \App\Models\Compras) {
                // Si es una compra, usamos el proveedor
                $entidadNombre = $movimiento->movimientoable->proveedor->razon_social ?? 'Proveedor no disponible';
                $entidadDocumento = $movimiento->movimientoable->proveedor->numero_documento ?? 'N/A';
            } else {
                // Si no es ni venta ni compra, usar valores por defecto
                $entidadNombre = 'Entidad no disponible';
                $entidadDocumento = 'N/A';
            }

            // Agregar los datos a la fila del reporte
            $data[] = [
                $i++,
                $movimiento->tipo == 'ingreso' ? 'Venta' : 'Compra',
                $tipo_doc,
                $movimiento->movimientoable->serie_correlativo,
                $movimiento->movimientoable->fecha_emision,
                $entidadNombre,
                $entidadDocumento,
                $movimiento->movimientoable->divisa,
                number_format($movimiento->movimientoable->total, 2),
            ];
        }
        return $data;
    }

    // Definir los encabezados principales
    public function headings(): array
    {
        return [];
    }

    // Aplicar estilos
    public function styles(Worksheet $sheet)
    {
        return [
            // Encabezado en la primera fila en negrita
            1 => ['font' => ['bold' => true, 'size' => 14]],
            2 => ['font' => ['bold' => true]],
            3 => ['font' => ['bold' => true]],
            // Filas para tabla de montos
            9 => ['font' => ['bold' => true]],
            10 => ['font' => ['bold' => true]],
            14 => ['font' => ['bold' => true]],
        ];
    }
}
