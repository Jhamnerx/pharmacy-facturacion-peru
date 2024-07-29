<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Generator;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class UtilesController extends Controller
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    public $faker;

    public static function tipoCambio()
    {

        $cambio = Cache::get('cambio');

        if ($cambio) {

            return $cambio;
        } else {

            try {

                $token = env('TOKEN_API_CONSULTA_SUNAT');

                $client = new Client(['base_uri' => 'https://api.apis.net.pe', 'verify' => false]);

                $parameters = [
                    'http_errors' => false,
                    'connect_timeout' => 5,
                    'headers' => [
                        'Authorization' => 'Bearer ' . $token,
                        'Referer' => 'https://apis.net.pe/api-sunat-tipo-de-cambio',
                        'User-Agent' => 'laravel/guzzle',
                        'Accept' => 'application/json',
                    ],
                ];

                $res = $client->request('GET', '/v2/sunat/tipo-cambio', $parameters);
                $response = json_decode($res->getBody()->getContents(), true);


                if (array_key_exists('precioVenta', $response)) {

                    Cache::put(
                        'cambio',
                        round($response["precioVenta"], 4),
                        now()->addHours(4)
                    );
                    Cache::put(
                        'precioVenta',
                        round($response["precioVenta"], 4),
                        now()->addHours(4)
                    );
                    Cache::put(
                        'precioCompra',
                        $response["precioCompra"],
                        now()->addHours(4)
                    );
                    return round($response["precioVenta"], 4);
                }
            } catch (\Exception $e) {

                return $e->getMessage();
            }
        }
    }

    public function consultaEmpresa($numero)
    {
        // Datos
        $token = env('TOKEN_API_CONSULTA_SUNAT');

        $client = new Client(['base_uri' => 'https://api.apis.net.pe', 'verify' => false]);

        $parameters = [
            'http_errors' => false,
            'connect_timeout' => 5,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Referer' => 'https://apis.net.pe/api-consulta-ruc',
                'User-Agent' => 'laravel/guzzle',
                'Accept' => 'application/json',
            ],
            'query' => ['numero' => $numero]
        ];
        // Para usar la versión 1 de la api, cambiar a /v1/ruc
        $res = $client->request('GET', '/v2/sunat/ruc', $parameters);
        $response = json_decode($res->getBody()->getContents(), true);

        if (array_key_exists('message', $response)) {
            return false;
        }
        return $response;
    }

    public function consultaPersona($numero)
    {
        //datos
        $token = env('TOKEN_API_CONSULTA_SUNAT');
        $client = new Client(['base_uri' => 'https://api.apis.net.pe', 'verify' => false]);
        // Iniciar llamada a API
        $parameters = [
            'http_errors' => false,
            'connect_timeout' => 5,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Referer' => 'https://api.apis.net.pe/v2/reniec/dni',
                'User-Agent' => 'laravel/guzzle',
                'Accept' => 'application/json',
            ],
            'query' => ['numero' => $numero]
        ];
        // Datos de persona según padron reducido
        $res = $client->request('GET', '/v2/reniec/dni', $parameters);
        $response = json_decode($res->getBody()->getContents(), true);

        if (array_key_exists('message', $response)) {
            return false;
        }
        return $response;
    }
}
