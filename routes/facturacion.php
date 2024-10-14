<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Facturacion\VisualizarArchivosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(VisualizarArchivosController::class)->group(function () {

    Route::get('{formato}/{ventas:uuid}', 'pdf')->name('facturacion.ver.pdf');
    Route::get('{formato}/nota/{ventas:uuid}', 'pdf_nota_venta')->name('facturacion.ver.pdf.nota');


    Route::get('download/xml/{ventas:uuid}', 'xml')->name('facturacion.ver.xml');
    Route::get('download/cdr/{ventas:uuid}', 'cdr')->name('facturacion.ver.cdr');

    //GUIA DE REMISION - VISUALIZAR ARCHIVOS
    Route::get('guia/pdf/{id}/{guia:uuid}', 'pdf_guia')->name('facturacion.guia.ver.pdf');
    Route::get('guia/xml/{guia:uuid}', 'xml_guia')->name('facturacion.guia.ver.xml');
    Route::get('guia/cdr/{guia:uuid}', 'cdr_guia')->name('facturacion.guia.qver.cdr');


    //GUIA DE REMISION - VISUALIZAR ARCHIVOS
    Route::get('nota/pdf/{id}/{comprobantes:uuid}', 'pdf_nota')->name('facturacion.nota.ver.pdf');
    Route::get('nota/xml/{comprobantes:uuid}', 'xml_nota')->name('facturacion.nota.ver.xml');
    Route::get('nota/cdr/{comprobantes:uuid}', 'cdr_nota')->name('facturacion.nota.qver.cdr');



    Route::get('anulaciones/pdf/{id}/{envio_resumen:nombre_xml}', 'pdf_anulacion')->name('facturacion.anulacion.ver.pdf');
    Route::get('anulaciones/xml/{id}/{envio_resumen:nombre_xml}', 'xml_anulacion')->name('facturacion.anulacion.ver.xml');
    Route::get('anulaciones/cdr/{id}/{envio_resumen:nombre_cdr}', 'cdr_anulacion')->name('facturacion.anulacion.ver.cdr');

    Route::get('cotizacion/pdf/{cotizaciones:uuid}', 'pdf_cotizacion')->name('facturacion.cotizacion.ver.pdf');

    Route::get('{formato}/devolucion/{devolucion}', 'pdf_devolucion')->name('devolucion.ver.pdf');
});
