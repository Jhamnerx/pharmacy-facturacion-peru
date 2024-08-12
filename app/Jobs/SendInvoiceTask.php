<?php

namespace App\Jobs;

use App\Models\Ventas;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Controllers\Facturacion\Api\ApiFacturacion;
use Illuminate\Support\Facades\Log;

class SendInvoiceTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $ventas = Ventas::withoutGlobalScopes()
            ->where('fe_estado', '0')
            ->where('tipo_comprobante_id', '!=', '02')
            ->whereNotNull('clase')
            ->get();

        if ($ventas->isEmpty()) {
            Log::info('No se encontró ninguna venta con fe_estado 0.');
            return;
        }

        foreach ($ventas as $venta) {
            $api = new ApiFacturacion();
            $mensaje = $api->sendInvoiceOnly($venta);

            if (isset($mensaje['fe_codigo_error'])) {
                Log::error("Error al enviar la factura de la venta ID {$venta->serie_correlativo}: Código de error {$mensaje['fe_codigo_error']}");
            } else {
                Log::info("Factura de la venta ID {$venta->serie_correlativo} enviada correctamente.");
            }
        }
    }
}
