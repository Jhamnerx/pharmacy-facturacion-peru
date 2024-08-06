<?php

namespace App\Exports;

use App\Models\Productos;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class reporteProductosCapital extends StringValueBinder implements FromQuery, WithMapping, WithHeadings, WithCustomValueBinder, ShouldAutoSize, WithEvents
{
    use Exportable, RegistersEventListeners;

    protected static $totalCosto;
    protected static $totalVenta;

    public function __construct()
    {
        // Calcular los totales
        $totales = Productos::query()
            ->whereNull('deleted_at')
            ->selectRaw('SUM(stock * costo_unitario) as totalCosto, SUM(stock * precio_unitario) as totalVenta')
            ->first();

        self::$totalCosto = $totales->totalCosto;
        self::$totalVenta = $totales->totalVenta;
    }
    public function query()
    {
        return Productos::query();
    }

    public function headings(): array
    {
        return [
            'Código',
            'Nombre',
            'Forma Farmacéutica',
            'Stock',
            'Precio de Compra',
            'Precio de Venta',
            'Total Costo',
            'Total Venta',
        ];
    }

    public function map($producto): array
    {
        return [
            $producto->codigo,
            $producto->nombre,
            $producto->forma_farmaceutica,
            $producto->stock,
            $this->convertToNumber($producto->costo_unitario),
            $this->convertToNumber($producto->precio_unitario),
            $this->convertToNumber($producto->stock * $producto->costo_unitario),
            $this->convertToNumber($producto->stock * $producto->precio_unitario),
        ];
    }


    private function convertToNumber($value)
    {
        return is_numeric($value) ? (float) $value : 0;
    }

    public static function afterSheet(AfterSheet $event)
    {
        // Agregar totales en la primera fila
        $event->sheet->insertNewRowBefore(1, 2);
        $event->sheet->setCellValue('A1', 'Totales');
        $event->sheet->setCellValue('G1', self::$totalCosto);
        $event->sheet->setCellValue('H1', self::$totalVenta);

        // Formatear las celdas como números
        $event->sheet->getDelegate()->getStyle('G1')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_00);
        $event->sheet->getDelegate()->getStyle('H1')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_00);
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => [self::class, 'afterSheet'],
        ];
    }
}
