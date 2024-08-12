<?php

namespace App\Jobs;

use App\Models\Ventas;
use App\Models\Empresa;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Controllers\Facturacion\Api\Util;
use App\Http\Controllers\Facturacion\Api\QpseController;

class SendSignXmlTask implements ShouldQueue
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
            ->where('fe_estado', '4')
            ->where('tipo_comprobante_id', '!=', '02')
            ->whereNotNull('clase')
            ->get();

        if ($ventas->isEmpty()) {
            Log::info('No se encontró ninguna venta con fe_estado 4.');
            return;
        }

        $empresa = Empresa::first();
        $util = Util::getInstance();

        foreach ($ventas as $venta) {

            $qpse = new QpseController();
            $ruta = "/" . $empresa->ruta_xml . $venta->nombre_xml . '.xml';
            $response = $qpse->firmarXmlBase64($venta->nombre_xml, base64_encode(Storage::disk('facturacion')->get($ruta)));

            if (isset($response['error'])) {
                Log::error("error al firmar el xml de la venta ID {$venta->serie_correlativo}: Código de error {$response['error']}");
                return;
            } else {
                Log::info("xml de la venta ID {$venta->serie_correlativo} firmado correctamente.");
            }

            $util->writeFile($venta->nombre_xml . '.xml', base64_decode($response['xml']), 'xml');

            $venta->update([
                'fe_estado' => 0,
                'hash' => $response['codigo_hash'],
                'xml_base64' => $response['xml']
            ]);
        }
    }
}
