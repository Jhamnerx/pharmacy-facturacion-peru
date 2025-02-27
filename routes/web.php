<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CajaChicaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Api\SelectsController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\Utiles\PrintController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\Clientes\ClienteUtilController;
use App\Http\Controllers\Comprobantes\ComprobantesController;
use App\Http\Controllers\DevolucionesController;
use App\Http\Controllers\Facturacion\VisualizarArchivosController;




Route::middleware([
    'auth',
    config('jetstream.auth_session'),
])->controller(DashboardController::class)->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    //  Route::get('dashboard', 'dashboard')->name('dashboard');
});

Route::controller(ComprasController::class)->middleware(['auth'])->group(function () {

    Route::get('compras', 'index')->name('admin.compras.index');
    Route::get('compras/registrar', 'create')->name('admin.compras.create');
    Route::get('compras/editar/{compra}', 'editar')->name('admin.compras.edit');
});

Route::controller(ClientesController::class)->middleware(['auth'])->group(function () {

    Route::get('clientes', 'index')->name('admin.clientes.index');
});

Route::controller(ProveedoresController::class)->middleware(['auth'])->group(function () {

    Route::get('proveedores', 'index')->name('admin.proveedores.index');
});

Route::controller(ProductosController::class)->middleware(['auth'])->group(function () {

    Route::get('productos', 'index')->name('admin.productos.index');
    Route::get('lotes', 'lotes')->name('admin.lotes.index');
});

Route::controller(CategoriasController::class)->middleware(['auth'])->group(function () {

    Route::get('categorias', 'index')->name('admin.categorias.index');
});


Route::controller(ComprobantesController::class)->middleware(['auth'])->group(function () {

    Route::get('ventas', 'index')->name('admin.ventas.index');
    Route::get('pos/invoice', 'pos')->name('admin.pos.create');
    Route::get('emitir/invoice', 'emitir')->name('admin.invoice.create');
    Route::get('emitir/nota-credito', 'emitirNotaCredito')->name('admin.nota.credito.create');
    Route::get('emitir/nota-debito', 'emitirNotaDebito')->name('admin.nota.debito.create');
});

Route::controller(CajaChicaController::class)->middleware(['auth'])->group(function () {

    Route::get('caja', 'index')->name('admin.caja.index');
});

Route::controller(DevolucionesController::class)->middleware(['auth'])->group(function () {

    Route::get('devoluciones', 'index')->name('admin.devoluciones.index');
    Route::get('devoluciones/registrar', 'create')->name('admin.devoluciones.create');
});



Route::controller(CotizacionesController::class)->middleware(['auth'])->group(function () {

    Route::get('cotizaciones', 'index')->name('admin.cotizaciones.index');
    Route::get('cotizaciones/emitir', 'emitir')->name('admin.cotizaciones.create');
    Route::get('cotizaciones/{cotizacion}/editar', 'editar')->name('admin.cotizaciones.edit');
});





Route::controller(AdministracionController::class)->middleware(['auth'])->group(function () {
    Route::get('ajustes/empresa', 'ajustes')->name('admin.ajustes.empresa');
    Route::get('ajustes/sunat', 'sunat')->name('admin.ajustes.sunat');
    Route::get('ajustes/cuenta', 'cuenta')->name('admin.ajustes.cuenta');
    Route::get('ajustes/series', 'series')->name('admin.ajustes.series');
    Route::get('ajustes/notificaciones', 'notificaciones')->name('admin.ajustes.notificaciones');
    Route::get('ajustes/roles', 'roles')->name('admin.ajustes.roles');
});

Route::controller(UsuariosController::class)->middleware(['auth'])->group(function () {

    Route::get('usuarios', 'index')->name('admin.usuarios.index');
});

Route::controller(ReportesController::class)->group(function () {

    Route::get('reportes/ventas', 'ventas')->name('admin.reportes.ventas');
    Route::get('reportes/compras', 'compras')->name('admin.reportes.compras');
});

route::controller(ClienteUtilController::class)->group(function () {
    route::get('consulta/invoice', 'consultaInvoice')->name('admin.consulta.invoice');
});


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/impersonate/{userId}', [AdminController::class, 'impersonate'])->name('impersonate');
});

Route::get('/stop-impersonating', [AdminController::class, 'stopImpersonating'])->name('stopImpersonating');



Route::controller(VisualizarArchivosController::class)->group(function () {

    Route::get('caja-chica/reporte/{cajaChica}', 'cajaChicaReporte')->name('caja.chica.reporte');
    Route::get('caja-chica/reporte-resumen-operacion-diarias/{cajaChica}', 'cajaChicaReporteOperacionDiarias')->name('caja.chica.reporte.operaciones.diarias');
});
