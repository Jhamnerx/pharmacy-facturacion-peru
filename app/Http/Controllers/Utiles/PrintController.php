<?php

namespace App\Http\Controllers\Utiles;

use Exception;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Ventas;
use App\Models\Empresa;

use Barryvdh\DomPDF\PDF;
use Mike42\Escpos\Printer;
use Illuminate\Http\Request;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\GdEscposImage;
use App\Http\Controllers\Controller;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\ImagickEscposImage;
use Illuminate\Support\Facades\Storage;
use Luecano\NumeroALetras\NumeroALetras;
use Mike42\Escpos\PrintConnectors\RawbtPrintConnector;

class PrintController extends Controller
{

    public function printReceipt($ventaId)
    {

        $venta = Ventas::withoutGlobalScopes()->findOrFail($ventaId);

        $empresa = Empresa::first();

        $profile = CapabilityProfile::load("POS-5890");

        /* Fill in your own connector here */
        $connector = new RawbtPrintConnector();

        /* Start the printer */
        $logo = EscposImage::load(storage_path('app/public/imagenes/print-logo.png'), false);
        $printer = new Printer($connector, $profile);


        /* Print top logo */
        if ($profile->getSupportsGraphics()) {
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->graphics($logo);
        }
        if ($profile->getSupportsBitImageRaster() && !$profile->getSupportsGraphics()) {
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->bitImage($logo);
        }

        // Encabezado de la factura
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text($empresa->nombre_comericla . "\n");
        $printer->text($empresa->direccion['direccion'] . "\n");
        $printer->text("Tel: " . $empresa->telefono . "\n");
        $printer->text("Email: " . $empresa->correo . "\n");
        $printer->text($empresa->ruc . "\n");
        $printer->text("Fecha: " . $venta->fecha_emision->format('d-m-Y') . "\n");
        $printer->feed();

        // Título de la factura
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text($venta->tipoComprobante->descripcion . " ELECTRONICA\n");
        $printer->text($venta->serie_correlativo . "\n");
        $printer->feed();

        // Detalles del cliente
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("Cliente: " . $venta->cliente->razon_social . "\n");
        $printer->text("Dirección: " . $venta->cliente->direccion . "\n");
        if ($venta->cliente->numero_documento) {
            $printer->text("RUC/DNI: " . $venta->cliente->numero_documento . "\n");
        }
        $printer->text($venta->divisa == 'PEN' ? 'Tipo Moneda: SOLES' : 'Tipo Moneda: DOLARES' . "\n");

        $printer->feed();

        // Detalle de la factura
        $printer->text("Cantidad  Descripción                Precio\n");
        $printer->text("------------------------------------------------\n");
        $items = $venta->detalle()->select('cantidad', 'descripcion', 'total')->get()->toArray();

        foreach ($items as $item) {
            $printer->text(sprintf("%-8s %-24s %8.2f\n", round($item['cantidad'], 2), $item['descripcion'], round($item['total'], 2)));
        }
        $printer->text("------------------------------------------------\n");


        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text(sprintf("Gravadas: %s %8.2f\n", $venta->divisa == 'PEN' ? 'S/' : '$', round($venta->op_gravadas, 2)));

        if ($venta->op_exoneradas > 0) {
            $printer->text(sprintf("Exoneradas: %s %8.2f\n", $venta->divisa == 'PEN' ? 'S/' : '$', round($venta->op_exoneradas, 2)));
        }
        if ($venta->op_inafectas > 0) {
            $printer->text(sprintf("Inafectas: %s %8.2f\n", $venta->divisa == 'PEN' ? 'S/' : '$', round($venta->op_inafectas, 2)));
        }

        $printer->text(sprintf("IGV: %s %8.2f\n", $venta->divisa == 'PEN' ? 'S/' : '$', round($venta->igv, 2)));

        if ($venta->descuento > 0) {
            $printer->text(sprintf("Descuento Total (-): %s %8.2f\n", $venta->divisa == 'PEN' ? 'S/' : '$', round($venta->descuento, 2)));
        }
        if ($venta->icbper > 0) {
            $printer->text(sprintf("ICBPER: %s %8.2f\n", $venta->divisa == 'PEN' ? 'S/' : '$', round($venta->icbper, 2)));
        }

        $printer->text(sprintf("Total: %s %8.2f\n", $venta->divisa == 'PEN' ? 'S/' : '$', round($venta->total, 2)));

        //MONTO EN SOLES

        $printer->feed(2);
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $formatter = new NumeroALetras();
        $printer->text($formatter->toInvoice($venta->total, 2, $venta->divisa == 'PEN' ? 'SOLES' : 'DÓLARES') . "\n");

        // // RQ Code
        $printer2 = new Printer($connector); // dirty printer profile hack !!
        $printer2->setJustification(Printer::JUSTIFY_CENTER);
        $printer2->qrCode($this->textoQr($empresa, $venta), Printer::QR_ECLEVEL_M, 8);
        $printer2->feed();

        // Información adicional
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->feed();
        $printer->text("Información Adicional\n");
        $printer->text("LEYENDA\n");


        if ($venta->forma_pago == 'CREDITO') {
            $printer->text("FORMA DE PAGO: Crédito\n");

            foreach ($venta->detalle_cuotas->toArray() as $key => $cuota) {
                $printer->text("Fecha de pago " . ($key + 1) . ": " . $cuota['fecha'] . "\n");
                $printer->text("Cuota " . ($key + 1) . ": " . $cuota['importe'] . "\n");
            }
        } else {
            $printer->text("FORMA DE PAGO: Contado\n");
        }

        $printer->text("VENDEDOR: " . $venta->user->name . "\n");

        if ($venta->comentario != null) {
            $printer->text("OBSERVACIONES:\n");
            $printer->text($venta->comentario . "\n");
        }
        // Pie de página
        $printer->feed(1);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("Gracias por su compra\n");

        // Cortar el papel
        $printer->cut();

        // Cerrar la conexión
        $printer->close();
    }

    public function textoQr($empresa, $venta)
    {
        $ruc = $empresa->ruc;
        $tipo_documento = $venta->tipo_comprobante_id;
        $serie = $venta->serie;
        $correlativo = $venta->correlativo;
        $igv = $venta->igv;
        $total = $venta->total;
        $fecha = $venta->fecha_emision->format('Y-m-d');
        $cliente_docT = $venta->cliente->tipo_documento_id;
        $doc_cliente = $venta->cliente->numero_documento;

        $texto_qr =
            $ruc .
            '|' .
            $tipo_documento .
            '|' .
            $serie .
            '|' .
            $correlativo .
            '|' .
            $igv .
            '|' .
            $total .
            '|' .
            $fecha .
            '|' .
            $cliente_docT .
            '|' .
            $doc_cliente;

        return $texto_qr;
    }


    public function printReceipt1($ventaId)
    {
        $venta = Ventas::findOrFail($ventaId);
        $empresa = Empresa::first();

        try {

            $profile = CapabilityProfile::load("POS-5890");

            /* Fill in your own connector here */
            $connector = new RawbtPrintConnector();

            /* Start the printer */
            $logo = EscposImage::load(storage_path('app/public/imagenes/logo.png'), false);
            $printer = new Printer($connector, $profile);


            /* Print top logo */
            if ($profile->getSupportsGraphics()) {
                $printer->graphics($logo);
            }
            if ($profile->getSupportsBitImageRaster() && !$profile->getSupportsGraphics()) {
                $printer->bitImage($logo);
            }

            /* Information for the receipt */


            /* Date is kept the same for testing */
            $date = "Monday 6th of April 2015 02:56:25 PM";

            /* Start the printer */
            //  $logo = EscposImage::load("resources/rawbtlogo.png", false);


            // /* Print top logo */
            // if ($profile->getSupportsGraphics()) {
            //     $printer->graphics($logo);
            // }
            // if ($profile->getSupportsBitImageRaster() && !$profile->getSupportsGraphics()) {
            //     $printer->bitImage($logo);
            // }

            /* Name of shop */
            // $printer->setJustification(Printer::JUSTIFY_CENTER);
            // $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            // $printer->text("ExampleMart Ltd.\n");
            // $printer->selectPrintMode();
            // $printer->text("Shop No. 42.\n");
            // $printer->feed();

            // /* Title of receipt */
            // $printer->setEmphasis(true);
            // $printer->text("SALES INVOICE\n");
            // $printer->setEmphasis(false);

            // /* Items */
            // $printer->setJustification(Printer::JUSTIFY_LEFT);
            // $printer->setEmphasis(true);
            // $printer->text(new item('', '$'));
            // $printer->setEmphasis(false);

            // foreach ($items as $item) {
            //     $printer->text($item->getAsString(40)); // for 58mm Font A
            // }

            // $printer->setEmphasis(true);
            // $printer->text($subtotal->getAsString(32));
            // $printer->setEmphasis(false);
            // $printer->feed();

            // /* Tax and total */
            // $printer->text($tax->getAsString(32));
            // $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
            // $printer->text($total->getAsString(32));
            // $printer->selectPrintMode();

            // /* Footer */
            // $printer->feed(2);
            // $printer->setJustification(Printer::JUSTIFY_CENTER);
            // $printer->text("Thank you for shopping\n");
            // $printer->text("at ExampleMart\n");
            // $printer->text("For trading hours,\n");
            // $printer->text("please visit example.com\n");
            // $printer->feed(2);
            // $printer->text($date . "\n");

            // /* Barcode Default look */
            // $printer->barcode("ABC", Printer::BARCODE_CODE39);
            // $printer->feed();
            // $printer->feed();

            // // Demo that alignment QRcode is the same as text
            // $printer2 = new Printer($connector); // dirty printer profile hack !!
            // $printer2->setJustification(Printer::JUSTIFY_CENTER);
            // $printer2->qrCode("https://rawbt.ru/mike42", Printer::QR_ECLEVEL_M, 8);
            // $printer2->text("rawbt.ru/mike42\n");
            // $printer2->setJustification();
            // $printer2->feed();

            /* Cut the receipt and open the cash drawer */
            $printer->cut();
            $printer->pulse();
        } catch (Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        } finally {
            if (isset($printer)) {
                $printer->close();
            }
        }
    }

    public function test()
    {
        $profile = CapabilityProfile::load("POS-5890");

        /* Fill in your own connector here */
        $connector = new RawbtPrintConnector();

        /* Start the printer */
        $printer = new Printer($connector, $profile);

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("Prueba de impresion!!\n");

        // Cortar el papel
        $printer->cut();

        // Cerrar la conexión
        $printer->close();
    }
}
