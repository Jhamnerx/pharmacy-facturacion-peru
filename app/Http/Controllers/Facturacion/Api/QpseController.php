<?php

namespace App\Http\Controllers\Facturacion\Api;

use GuzzleHttp\Client;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\RequestException;

class QpseController extends Controller
{

    public $empresa;

    public function __construct()
    {
        $this->empresa = Empresa::first();
    }

    public function getUrl()
    {
        $url = '';
        if ($this->empresa->modo == 'local' || env('APP_ENV') == 'local') {
            $url = env('QPSE_URL_DEMO');
            //$url = env('QPSE_URL_PRODUCTION');
        } else {
            $url = env('QPSE_URL_PRODUCTION');
        }

        return $url;
    }

    public function getToken()
    {

        $url = 'https://cpe.qpse.pe/api/auth/cpe/token';

        $client = new Client(['verify' => false]);

        $parameters = [
            //'http_errors' => false,
            'connect_timeout' => 5,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'json' => [
                'usuario' => $this->empresa->qpse_datos['usuario'],
                'contraseña' => $this->empresa->qpse_datos['clave'],
            ],
        ];

        $res = $client->request('POST', $url, $parameters);
        $response = json_decode($res->getBody()->getContents());

        return $response->token_acceso;
    }

    public function firmarXmlBase64($nombre_xml, ?string $xml)
    {
        $url = $this->getUrl() . '/api/cpe/generar';

        $client = new Client(['verify' => false]);

        $parameters = [
            'connect_timeout' => 5,
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->getToken(),
            ],
            'json' => [
                'tipo_integracion' => 0,
                'nombre_archivo' => $nombre_xml,
                'contenido_archivo' => $xml,
            ],
        ];

        try {
            $res = $client->request('POST', $url, $parameters);

            if ($res->getStatusCode() === 200) {
                $response = json_decode($res->getBody()->getContents());
                return $response;
            } else {
                // Manejar el caso donde el código de estado no es 200
                throw new \Exception('Error: La respuesta no tiene un código de estado 200.');
            }
        } catch (RequestException $e) {
            // Manejar la excepción de Guzzle
            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                $rs = json_decode($e->getResponse()->getBody()->getContents());
                throw new \Exception("Error " . $statusCode . " :" . $rs->message);
            } else {
                throw new \Exception('Error: La solicitud falló sin respuesta.');
            }
        } catch (\Exception $e) {
            // Manejar otras excepciones
            throw new \Exception('Error: ' . $e->getMessage());
        }
    }
}
