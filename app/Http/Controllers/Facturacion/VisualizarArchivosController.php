<?php

namespace App\Http\Controllers\Facturacion;

use App\Models\Ventas;
use App\Models\Comprobantes;
use App\Models\Cotizaciones;
use App\Models\EnvioResumen;
use App\Models\GuiaRemision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CajaChica;

class VisualizarArchivosController extends Controller
{
    public function pdf($formato, $uuid)
    {
        $venta = Ventas::where('uuid', $uuid)->firstOrFail();

        return $venta->getPdf($formato);
    }

    public function pdf_nota_venta($formato, $uuid)
    {
        $venta = Ventas::where('uuid', $uuid)->firstOrFail();

        return $venta->getPdfNotaVenta($formato);
    }

    public function ticket($uuid) {}

    public function xml($uuid)
    {
        $venta = Ventas::where('uuid', $uuid)->firstOrFail();
        return $venta->downloadXml();
    }

    public function cdr($uuid) {}


    public function pdf_guia($id, $uuid)
    {
        $guia = GuiaRemision::where('uuid', $uuid)->where('id', $id)->firstOrFail();
        return $guia->getPdf();
    }

    public function xml_guia($uuid)
    {
        $guia = GuiaRemision::where('uuid', $uuid)->firstOrFail();

        return $guia->downloadXml();
    }


    public function pdf_nota($id, $uuid)
    {
        $comprobante = Comprobantes::where('uuid', $uuid)->where('id', $id)->firstOrFail();
        return $comprobante->getPdf();
    }

    public function xml_nota($uuid)
    {
        $comprobante = Comprobantes::where('uuid', $uuid)->firstOrFail();

        return $comprobante->downloadXml();
    }


    public function pdf_anulacion($id, $nombre_xml)
    {
        $envio_resumen = EnvioResumen::where('nombre_xml', $nombre_xml)->where('id', $id)->firstOrFail();
        return $envio_resumen->getPdf();
    }

    public function xml_anulacion($id, $nombre_xml)
    {
        $envio_resumen = EnvioResumen::where('nombre_xml', $nombre_xml)->where('id', $id)->firstOrFail();
        return $envio_resumen->downloadXml();
    }

    public function cdr_anulacion($id, $nombre_cdr)
    {
        $envio_resumen = EnvioResumen::where('nombre_cdr', $nombre_cdr)->where('id', $id)->firstOrFail();
        return $envio_resumen->downloadCdr();
    }


    public function pdf_cotizacion($uuid)
    {
        $cotizacion = Cotizaciones::where('uuid', $uuid)->firstOrFail();

        return $cotizacion->getPDFData();
    }


    public function cajaChicaReporte(CajaChica $cajaChica)
    {
        return $cajaChica->getPdf();
    }
}
