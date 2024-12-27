<?php

namespace App\Http\Controllers\Facturacion\Api;

use GuzzleHttp\Client;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;

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
        } else {
            $url = env('QPSE_URL_PRODUCTION');
        }

        return $url;
    }

    public function getToken()
    {
        try {
            $url = $this->getUrl() . '/api/auth/cpe/token';

            $client = new Client(['verify' => false]);

            $parameters = [
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
            $response = json_decode($res->getBody()->getContents(), true);

            return ['token_acceso' => $response['token_acceso']];
        } catch (RequestException $e) {
            return [
                'error' => 'Error al obtener el token: ' . $e->getMessage(),
                'code' => Response::HTTP_BAD_REQUEST
            ];
        } catch (\Exception $e) {
            return [
                'error' => 'Error: ' . $e->getMessage(),
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ];
        }
    }

    public function firmarXmlBase64($nombre_xml, ?string $xml)
    {
        try {
            $url = $this->getUrl() . '/api/cpe/generar';

            $client = new Client(['verify' => false]);

            $tokenResponse = $this->getToken();
            if (isset($tokenResponse['error'])) {
                return $tokenResponse;
            }

            $parameters = [
                'connect_timeout' => 5,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $tokenResponse['token_acceso'],
                ],
                'json' => [
                    'tipo_integracion' => 0,
                    'nombre_archivo' => $nombre_xml,
                    'contenido_archivo' => $xml,
                ],
            ];

            $res = $client->request('POST', $url, $parameters);

            if ($res->getStatusCode() === 200) {
                return json_decode($res->getBody()->getContents(), true);
            } else {
                return [
                    'error' => 'Error: La respuesta no tiene un código de estado 200.',
                    'code' => Response::HTTP_BAD_REQUEST
                ];
            }
        } catch (RequestException $e) {
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $e->getResponse() ? json_decode($e->getResponse()->getBody()->getContents())->message : 'Error: La solicitud falló sin respuesta.';
            return [
                'error' => "Error " . $statusCode . " :" . $message,
                'code' => $statusCode
            ];
        } catch (\Exception $e) {
            return [
                'error' => 'Error: ' . $e->getMessage(),
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ];
        }
    }

    public function enviarXmlBase64($nombre_xml_firmado, $contenido_xml_firmado)
    {

        try {
            $url = $this->getUrl() . '/api/cpe/enviar';

            $client = new Client(['verify' => false]);

            $tokenResponse = $this->getToken();
            if (isset($tokenResponse['error'])) {
                return $tokenResponse;
            }

            $parameters = [
                'connect_timeout' => 5,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $tokenResponse['token_acceso'],
                ],
                'json' => [
                    'nombre_xml_firmado' => $nombre_xml_firmado,
                    'contenido_xml_firmado' => $contenido_xml_firmado,
                ],
            ];

            $res = $client->request('POST', $url, $parameters);

            if ($res->getStatusCode() === 200) {
                return json_decode($res->getBody()->getContents(), true);
            } else {
                return [
                    'error' => 'Error: La respuesta no tiene un código de estado 200.',
                    'code' => Response::HTTP_BAD_REQUEST
                ];
            }
        } catch (RequestException $e) {
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $e->getResponse() ? json_decode($e->getResponse()->getBody()->getContents())->message : 'Error: La solicitud falló sin respuesta.';
            return [
                'error' => "Error " . $statusCode . " :" . $message,
                'code' => $statusCode
            ];
        } catch (\Exception $e) {
            return [
                'error' => 'Error: ' . $e->getMessage(),
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ];
        }
    }

    public function consultaTicket($nombre_archivo)
    {

        try {
            $url = $this->getUrl() . '/api/cpe/consultar/' . $nombre_archivo;

            $client = new Client(['verify' => false]);

            $tokenResponse = $this->getToken();
            if (isset($tokenResponse['error'])) {
                return $tokenResponse;
            }

            $parameters = [
                'connect_timeout' => 5,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $tokenResponse['token_acceso'],
                ],
            ];

            $res = $client->request('POST', $url, $parameters);

            if ($res->getStatusCode() === 200) {
                return json_decode($res->getBody()->getContents(), true);
            } else {
                return [
                    'error' => 'Error: La respuesta no tiene un código de estado 200.',
                    'code' => Response::HTTP_BAD_REQUEST
                ];
            }
        } catch (RequestException $e) {
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = $e->getResponse() ? json_decode($e->getResponse()->getBody()->getContents())->message : 'Error: La solicitud falló sin respuesta.';
            return [
                'error' => "Error " . $statusCode . " :" . $message,
                'code' => $statusCode
            ];
        } catch (\Exception $e) {
            return [
                'error' => 'Error: ' . $e->getMessage(),
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ];
        }
    }
}
