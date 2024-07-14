<?php

namespace App\Http\Controllers\Facturacion;

use App\Models\Cotizaciones;
use App\Models\Presupuestos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresupuestoPdfController extends Controller
{
    public function pdf(Cotizaciones $presupuesto, $action = null)
    {
        return $presupuesto->getPDFData($action);
    }
    public function sendToMail(Cotizaciones $presupuesto, $data)
    {
        // dd($this)
        return $presupuesto->getPDFDataToMail($data);
    }
}
