<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\SelectsController;
use App\Http\Controllers\Utiles\PrintController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(SelectsController::class)->group(function () {

    Route::get('categorias', 'categorias')->name('api.categorias.index');
    Route::get('tipo-afectacion', 'tipoAfectacion')->name('api.tipo-afectacion.index');
    Route::get('unit', 'unit')->name('api.unit.index');
    Route::get('clientes', 'clientes')->name('api.clientes.index');
    Route::get('proveedores', 'proveedores')->name('api.proveedores.index');
    Route::get('series', 'series')->name('api.series.index');
    Route::get('productos', 'productos')->name('api.productos.index');
    Route::get('documentos', 'documentos')->name('api.documentos.index');
    Route::get('tipo-comprobantes', 'tipoComprobantes')->name('api.tipo.comprobantes.index');
    Route::get('catalago', 'catalago')->name('api.catalago.index');
    Route::get('detracciones', 'codigosDetracciones')->name('api.detracciones.index');
    Route::get('metodos-pago', 'metodosPago')->name('api.metodos.pago.index');
    Route::get('puertos', 'puertosPeru')->name('api.puertos.index');
    Route::get('user', 'user')->name('api.user.index');
    Route::get('comprobantes', 'comprobantes')->name('api.comprobantes.index');
    Route::get('ubigeos', 'ubigeos')->name('api.ubigeos.index');
    Route::get('motivos-traslado', 'motivosTraslado')->name('api.motivos.traslado.index');
    Route::get('modalidad-traslado', 'modalidadTraslado')->name('api.modalidad.traslado.index');
    Route::get('sustentos', 'sustentos')->name('api.sustentos.index');
    Route::get('locales', 'locales')->name('api.locales.index');
    Route::get('invoices', 'invoices')->name('api.invoices.index');
});


Route::controller(UtilesController::class)->group(function () {

    Route::get('tipo_cambio', 'tipoCambio')->name('api.tipo-cambio.index');
});



Route::get('/print-receipt/{venta}', [PrintController::class, 'printReceipt'])->name('api.print.receipt');
Route::get('/print-receipt-test', [PrintController::class, 'test'])->name('api.print.test');


Route::get('/card-ventas-compras', [DashboardController::class, 'getDataVentas'])->name('json_data_feed');
