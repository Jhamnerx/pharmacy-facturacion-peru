<?php

namespace App\Http\Controllers\Facturacion\Api;

use Exception;
use Greenter\See;
use App\Models\Ventas;
use App\Models\Empresa;
use App\Models\Comprobantes;
use App\Models\GuiaRemision;
use Greenter\Report\XmlUtils;
use Greenter\Report\HtmlReport;
use Greenter\Model\Company\Address;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Greenter\Ws\Services\SoapClient;
use Greenter\Model\DocumentInterface;
use Illuminate\Support\Facades\Storage;
use Greenter\Model\Response\CdrResponse;
use Greenter\Ws\Services\SunatEndpoints;
use Greenter\Ws\Services\ConsultCdrService;
use Greenter\XMLSecLibs\Certificate\X509Certificate;
use Greenter\XMLSecLibs\Certificate\X509ContentType;
use Greenter\Report\Resolver\DefaultTemplateResolver;

class Util extends Controller
{
    /**
     * @var Util
     */
    private static $current;

    public Empresa $empresa;

    //  PROPIEDAS PUBLICAS PARA ERRORES Y MENSAJES
    public $estado;
    public $mensaje_error;
    public $estado_texto;
    public $mensaje;
    public $nota;
    public $fe_codigo_error;
    public $nombre_xml;
    public $nombre_cdr;
    public $xml_base64;
    public $cdr_base64;
    public $fe_estado;
    public $hash;
    public $hash_cdr;
    public $ticketS;
    public $code_sunat;
    public $qr;

    private function __construct()
    {
        $this->empresa = Empresa::first();
    }

    public static function getInstance(): Util
    {
        if (!self::$current instanceof self) {
            self::$current = new self();
        }

        return self::$current;
    }

    public function getSee()
    {

        $ruta_certificado = $this->empresa->ruta_cert . '.pem';

        $see = new See();

        $see->setBuilderOptions([
            'strict_variables' => false,
            'optimizations' => 0,
            'debug' => true,
            'cache' => storage_path('framework/cache/data/facturacion/see'),
        ]);

        if ($this->empresa->modo == 'local' || env('APP_ENV') == 'local') {
            $see->setService(SunatEndpoints::FE_BETA);
        } else {
            $see->setService(SunatEndpoints::FE_PRODUCCION);
        }

        //$see->setCodeProvider(new XmlErrorCodeProvider());
        if ($this->empresa->soap_type == 'sunat') {
            if (!Storage::disk('facturacion')->exists($ruta_certificado)) {
                throw new Exception('No se pudo cargar el certificado (Sunat)');
            }


            $see->setCertificate(Storage::disk('facturacion')->get($ruta_certificado));
        }
        /**
         * Clave SOL
         * Ruc     = 20496172168
         * Usuario = MODDATOS
         * Clave   = moddatos
         */
        $see->setClaveSOL(trim($this->empresa->ruc), $this->empresa->sunat_datos['usuario_sol_sunat'], $this->empresa->sunat_datos['clave_sol_sunat']);
        $see->setCachePath(storage_path('framework/cache/data/facturacion/see'));

        return $see;
    }

    public function getSeeApi()
    {

        $ruta_certificado = $this->empresa->ruta_cert . '.pem';

        if ($this->empresa->modo == 'local' || env('APP_ENV') == 'local') {

            $api = new \Greenter\Api([
                'auth' => 'https://gre-test.nubefact.com/v1',
                'cpe' => 'https://gre-test.nubefact.com/v1',
            ]);


            if ($this->empresa->soap_type == 'sunat') {
                $certificate = Storage::disk('facturacion')->get($ruta_certificado);
                if ($certificate === false) {
                    throw new Exception('No se pudo cargar el certificado');
                }
                $api->setCertificate($certificate);
            }

            $api->setBuilderOptions([
                'strict_variables' => true,
                'optimizations' => 0,
                'debug' => true,
                'cache' => false,
            ])
                ->setApiCredentials('test-85e5b0ae-255c-4891-a595-0b98c65c9854', 'test-Hty/M6QshYvPgItX2P0+Kw==')
                ->setClaveSOL(trim($this->empresa->ruc), 'MODDATOS', 'MODDATOS');


            return $api;
        } else {

            $see = new \Greenter\Api([
                'auth' => 'https://api-seguridad.sunat.gob.pe/v1',
                'cpe' => 'https://api-cpe.sunat.gob.pe/v1',
            ]);

            $certificate = Storage::disk('facturacion')->get($ruta_certificado);
            if ($certificate === false) {
                throw new Exception('No se pudo cargar el certificado');
            }


            $see->setBuilderOptions([
                'strict_variables' => true,
                'optimizations' => 0,
                'debug' => true,
                'cache' => false,
            ]);

            $see->setCertificate($certificate);
            $see->setClaveSOL(trim($this->empresa->ruc), $this->empresa->sunat_datos['usuario_sol_sunat'], $this->empresa->sunat_datos['clave_sol_sunat']);
            $see->setApiCredentials($this->empresa->guia_api_datos['cliente_id'], $this->empresa->guia_api_datos['cliente_secret']);

            return $see;
        }
    }

    /**
     * @return ConsultCdrService
     */
    public function getCdrStatusService(): ConsultCdrService
    {
        $ws = new SoapClient(SunatEndpoints::FE_CONSULTA_CDR . '?wsdl');
        $ws->setCredentials(trim($this->empresa->ruc) . $this->empresa->sunat_datos['usuario_sol_sunat'], $this->empresa->sunat_datos['clave_sol_sunat']);

        $service = new ConsultCdrService();
        $service->setClient($ws);

        return $service;
    }

    public function getCompany(): \Greenter\Model\Company\Company
    {
        return (new \Greenter\Model\Company\Company())
            ->setRuc($this->empresa->ruc)
            ->setRazonSocial($this->empresa->razon_social)
            ->setNombreComercial($this->empresa->nombre_comercial)
            ->setAddress((new Address())
                ->setUbigueo($this->empresa->direccion['ubigeo'])
                ->setDistrito($this->empresa->direccion['distrito'])
                ->setProvincia($this->empresa->direccion['provincia'])
                ->setDepartamento($this->empresa->direccion['departamento'])
                ->setCodLocal('0000')
                ->setDireccion($this->empresa->direccion['direccion']))
            ->setEmail($this->empresa->correo)
            ->setTelephone($this->empresa->telefono);
    }


    public function showResponse(DocumentInterface $document, CdrResponse $cdr)
    {

        //$this->nombre_xml = $document->getName();
        $this->code_sunat = (int)$cdr->getCode();
        $code = (int)$cdr->getCode();
        if ($code === 0) {
            //SI EL CODIGO ES 0 EL ESTADO DE LA FACTURA ES
            $this->estado = 'ACEPTADA';
            $this->fe_estado = '1';

            if (count($cdr->getNotes()) > 0) {

                $this->estado = 'OBSERVACIONES:';
                // Corregir estas observaciones en siguientes emisiones.
                $this->nota = $cdr->getNotes();
                $this->mensaje = $cdr->getDescription() . ' CON OBSERVACIONES';
                $this->fe_estado = '3';
            }
        } else if ($code >= 2000 && $code <= 3999) {
            //SI EL CODIGO ESTA ENTRE ESTOS SE RECOGE EL MENSAJE Y EL CODIGO DE ERROR
            $this->estado = 'RECHAZADA';
            $this->mensaje_error = $cdr->getDescription();
            $this->fe_codigo_error = $code;
            $this->fe_estado = '2';
        } else {
            /* Esto no debería darse, pero si ocurre, es un CDR inválido que debería tratarse como un error-excepción. */
            /*code: 0100 a 1999 */
            $this->mensaje = 'Excepción';
        }

        $this->mensaje = $cdr->getDescription();
        $this->qr = $cdr->getReference();

        // $this->empresa->soap_type == 'sunat' ??  $this->hash = $this->getHash($document);

        //$this->hash = $this->getHash($document);

        return $this->getResults();
    }

    public function getResults()
    {
        $results
            =  [
                'success' => true,
                'estado_texto' => $this->estado,
                'fe_mensaje_sunat' => $this->mensaje,
                'fe_mensaje_error' => $this->mensaje_error,
                'nota' => $this->nota,
                'fe_codigo_error' => $this->fe_codigo_error,
                'nombre_xml' => $this->nombre_xml,
                'nombre_cdr' => $this->nombre_cdr,
                'xml_base64' => $this->xml_base64,
                'cdr_base64' => $this->cdr_base64,
                'fe_estado' => $this->fe_estado,
                'hash' => $this->hash,
                'hash_cdr' => $this->hash_cdr,
                'code_sunat' => $this->code_sunat,
                'qr' => $this->qr,

            ];
        return $results;
    }

    public function getErrorResponse(\Greenter\Model\Response\Error $error)
    {
        $results
            =  [
                'success' => false,
                'estado_texto' => 'RECHAZADA.',
                'fe_mensaje_sunat' => $this->mensaje,
                'fe_mensaje_error' => $error->getMessage(),
                'nota' => $this->nota,
                'fe_codigo_error' => $error->getCode(),
                'nombre_xml' => $this->nombre_xml,
                'nombre_cdr' => $this->nombre_cdr,
                'xml_base64' => $this->xml_base64,
                'cdr_base64' => $this->cdr_base64,
                'fe_estado' => $error->getCode() == 'HTTP' ? '0' : '2',
                'hash' => $this->hash,
                'hash_cdr' => $this->hash_cdr,
                'code_sunat' => $this->code_sunat,
                'qr' => $this->qr,

            ];
        if ($error->getCode() == '98') {
            $results['fe_estado'] = '0';
            $results['estado_texto'] = 'ESTADO: EN PROCESO';
        }
        if ($error->getCode() == '0109') {
            $results['fe_estado'] = '0';
            $results['estado_texto'] = 'ESTADO: EN PROCESO. ENVIE NUEVAMENTE';
        }

        if ($error->getCode() == 'env:Client') {
            $results['fe_estado'] = '0';
            $results['estado_texto'] = 'ESTADO: SOLO XML CREADO';
        }
        if ($error->getCode() == 'env:Server') {
            $results['fe_estado'] = '0';
            $results['estado_texto'] = 'ESTADO: SOLO XML CREADO';
        }
        if ($error->getCode() == '0111') {
            $results['fe_estado'] = '0';
            $results['estado_texto'] = 'ESTADO: SOLO XML CREADO';
        }

        return $results;
    }

    public function signXmlQpse(DocumentInterface $document, $xml)
    {
        $this->nombre_xml = $document->getName();

        try {
            $qpse = new QpseController();
            $response = $qpse->firmarXmlBase64($document->getName(), base64_encode($xml));

            if (isset($response['error'])) {
                // Handle error if the response contains an error
                throw new \Exception($response['error']);
            }

            // If no errors, assign the values to the properties
            $this->writeFile($document->getName() . '.xml', base64_decode($response['xml']), 'xml');
            $this->xml_base64 = $response['xml'];
            $this->hash = $response['codigo_hash'];
            return $response;
        } catch (\Exception $e) {
            dd($e);
            // Handle errors: you can log the error, return a specific response, etc.
            // For example, log the error or rethrow a custom exception
            $this->fe_estado = '4';
            $this->estado = "ESTADO: XML NO FIRMADO";
            $this->mensaje = 'Error al firmar el XML';
            Log::error('Error al firmar el XML: ' . $e->getMessage());
            throw new \Exception('Error al firmar el XML: ' . $e->getMessage());
        }
    }

    public function sendXmlQpse($nombre_xml, $xml_base64)
    {

        try {
            $qpse = new QpseController();
            $response = $qpse->enviarXmlBase64($nombre_xml, $xml_base64);

            if (isset($response['error'])) {
                // Handle error if the response contains an error
                throw new \Exception($response['error']);
            }

            $this->cdr_base64 = $response['cdr'];
            $this->mensaje = $response['mensaje'];
            $this->estado = 'ACEPTADA';
            $this->fe_estado = 1;

            $this->writeFile('R-' . $nombre_xml . '.xml', base64_decode($response['cdr']), 'cdr');
            $xml = Storage::disk('facturacion')->get($this->empresa->ruta_cdr . 'R-' . $nombre_xml . '.xml');
            $this->hash_cdr = $this->getHashFromFile($xml);
            $this->nombre_cdr = 'R-' . $nombre_xml;
        } catch (\Exception $e) {
            // Handle errors: you can log the error, return a specific response, etc.
            // For example, log the error or rethrow a custom exception
            $this->fe_estado = 0;
            $this->estado = "ESTADO: CDR NO RECIBIDO";
            $this->mensaje = 'Error al enviar el XML';
            $this->nombre_cdr = 'R-' . $nombre_xml;
            Log::error('Error al enviar el XML: ' . $e->getMessage());
            throw new \Exception('Error al enviar el XML: ' . $e->getMessage());
        }
    }

    public function writeXml(DocumentInterface $document, ?string $xml): void
    {
        $this->writeFile($document->getName() . '.xml', $xml, 'xml');
        $this->xml_base64 = base64_encode($xml);
        $this->nombre_xml = $document->getName();
        $this->nombre_cdr = 'R-' . $document->getName();
        $this->hash = $this->getHash($document);
    }

    public function writeXmlOnly(DocumentInterface $document, ?string $xml)
    {
        $this->writeFile($document->getName() . '.xml', $xml, 'xml');
        return base64_encode($xml);
    }

    public function writeCdr(DocumentInterface $document, ?string $zip): void
    {
        $this->writeFile('R-' . $document->getName() . '.zip', $zip, 'cdr');
        $this->cdr_base64 = base64_encode($zip);
        $xml = $this->ExtractXmlCrdZip('R-' . $document->getName());
        $this->hash_cdr = $this->getHashFromFile($xml);
        $this->nombre_cdr = 'R-' . $document->getName();
    }

    //FUNCION PARA GUARDAR ARCHIVOS EN STORAGE
    public function writeFile(?string $filename, ?string $content, $type): void
    {
        if (getenv('GREENTER_NO_FILES')) {
            return;
        }
        if ($type == 'xml') {

            $fileDir = $this->empresa->ruta_xml;
        } else {
            $fileDir = $this->empresa->ruta_cdr;
        }

        if (!Storage::disk('facturacion')->exists($fileDir)) {

            Storage::makeDirectory($fileDir);
        }

        Storage::disk('facturacion')->put($fileDir . DIRECTORY_SEPARATOR . $filename, $content);
    }

    //EXTRAER XML CDR DEL ZIP
    public function ExtractXmlCrdZip($nombre_archivo)
    {
        $zip = new \ZipArchive();

        try {
            if ($zip->open(Storage::disk('facturacion')->path($this->empresa->ruta_cdr . $nombre_archivo . '.zip')) === true) //rpta es identica existe el archivo
            {
                $zip->extractTo(Storage::disk('facturacion')->path($this->empresa->ruta_cdr), $nombre_archivo . '.xml');
                $zip->close();

                return Storage::disk('facturacion')->get($this->empresa->ruta_cdr . $nombre_archivo . '.xml');
            }
        } catch (\Exception $e) {
        }
    }

    //OBTENER Y VISUALIZAR PDF INVOICE
    public function getPdf(Ventas $venta, $formato)
    {
        $twigOptions = [
            'cache' => storage_path('framework/cache/data/facturacion/pdf'),
            'strict_variables' => true,
        ];

        if ($formato == 'pdf') {
            $path = base_path('resources/views/templates/comprobantes');

            $report = new HtmlReport($path, $twigOptions);
            $report->setTemplate('invoice.html.twig');
        } else {
            $path = base_path('resources/views/templates/comprobantes/ticket');

            $report = new HtmlReport($path, $twigOptions);
            $report->setTemplate('invoice.html.twig');
        }

        //$report->setTemplate('invoice.html.twig');

        $params = [
            'system' => [
                'logo' => Storage::get($this->empresa->logo), // Logo de Empresa
                'hash' => $venta->hash, // Valor Resumen
            ],
            'user' => [
                'header'     => 'Telf: ' . $this->empresa->telefono, // Texto que se ubica debajo de la dirección de empresa
                'extras'     => [
                    // Leyendas adicionales
                    ['name' => 'CONDICION DE PAGO', 'value' => $venta->metodoPago->descripcion],
                    ['name' => 'FORMA DE PAGO', 'value' => $venta->clase ? $venta->clase->getFormaPago()->getTipo() : $venta->forma_pago],
                    ['name' => 'VENDEDOR', 'value' => $venta->user->name],
                ],
                //'footer' => 'Resumen',
                'footer' => view('templates.comprobantes.footer'),

            ]
        ];

        if ($venta->forma_pago == 'CREDITO') {

            $params['user']['cuotas'] = view('templates.comprobantes.cuotas', ['venta' => $venta, 'formato' => $formato]);
        }

        if ($venta->detraccion) {

            $params['user']['detraccion'] = view('templates.comprobantes.detraccion', compact('venta', 'formato'));
        }

        if ($venta->descuento) {
            $params['user']['descuento'] = view('templates.comprobantes.descuentos', compact('venta'));
        }
        if ($venta->anticipos()->count() > 0) {
            $params['user']['anticipos'] = view('templates.comprobantes.anticipos', compact('venta'));
        }

        $html = $report->render($venta->clase, $params);

        return $html;
    }

    public function getPdfNotaVenta(Ventas $venta) {}

    //OBTENER Y VISUALIZAR PDF INVOICE
    public function getPdfNota(Comprobantes $invoice)
    {

        $twigOptions = [
            'cache' => storage_path('framework/cache/data/facturacion/pdf'),
            'strict_variables' => true,
        ];

        $report = new HtmlReport('', $twigOptions);
        $resolver = new DefaultTemplateResolver();
        $report->setTemplate($resolver->getTemplate($invoice->clase));

        $params = [
            'system' => [
                'logo' => Storage::get($this->empresa->logo), // Logo de Empresa
                'hash' => $invoice->hash, // Valor Resumen
            ],
            'user' => [
                'header'     => 'Telf: ' . $this->empresa->telefono, // Texto que se ubica debajo de la dirección de empresa
                'footer' => ''
            ]
        ];

        $html = $report->render($invoice->clase, $params);

        return $html;
    }


    public function getPdfGuia(GuiaRemision $guia)
    {

        $twigOptions = [
            'cache' => storage_path('framework/cache/data/facturacion/pdf'),
            'strict_variables' => true,
        ];

        $path = base_path('resources/views/templates/guia-remision');

        $report = new HtmlReport($path, $twigOptions);
        $report->setTemplate('despatch.html.twig');

        $params = [
            'system' => [
                'logo' => Storage::get($this->empresa->logo),
                'hash' => $guia->hash,
            ],
            'user' => [
                'header'     => 'Telf: ' . $this->empresa->telefono,

            ]
        ];

        if ($guia->dispositivos->count() > 0 || $guia->sim_cards->count() > 0) {

            $params['user']['dispositivos'] = view('templates.guia-remision.dispositivos', compact('guia'));
        }

        if ($guia->qr) {
            $params['user']['qr'] = view('templates.guia-remision.qr', ['qr' => $guia->qr]);
        }

        $html = $report->render($guia->clase, $params);

        return $html;
    }


    //OBTENER HASH DE XML INVOICE
    public function getHash(DocumentInterface $document): ?string
    {

        $see = $this->getSee('');
        $xml = $see->getXmlSigned($document);
        return (new XmlUtils())->getHashSign($xml);
    }

    //OBTENER HASH DE CDR RESPUESTA DE SUNAT
    public function getHashFromFile($xml): ?string
    {
        return (new XmlUtils())->getHashSign($xml);
    }

    public function downloadXml($clase)
    {
        $ruta = $this->empresa->ruta_xml . $clase->nombre_xml . '.xml';

        return Storage::disk('facturacion')->download($ruta, $clase->nombre_xml . '.xml');
    }

    public function downloadCdr($clase)
    {
        $ruta = "/" . $this->empresa->ruta_cdr . $clase->nombre_cdr . '.xml';


        return Storage::disk('facturacion')->download($ruta, $clase->nombre_cdr . '.xml');
    }

    public function convertToPem($ruta, $password)
    {
        try {

            $pfx = Storage::disk('facturacion')->get($ruta);
            $certificate = new X509Certificate($pfx, $password);
            $pem = $certificate->export(X509ContentType::PEM);
            Storage::disk('facturacion')->put('/certificado/certificado' . '.pem', $pem);

            $this->empresa->update([
                'ruta_cert' => 'certificado/certificado'
            ]);

            return "exito";
        } catch (\Throwable $th) {

            return $th->getMessage();
        }
    }
    public function convertToCer($ruta, $password)
    {
        try {

            $pfx = Storage::disk('facturacion')->get($ruta);
            $certificate = new X509Certificate($pfx, $password);
            $cer = $certificate->export(X509ContentType::CER);
            Storage::disk('facturacion')->put('/certificado/certificado' . '.cer', $cer);

            $this->empresa->update([
                'ruta_cert' => 'certificado/certificado'
            ]);

            return "exito";
        } catch (\Throwable $th) {

            return $th->getMessage();
        }
    }

    //OBTENER Y VISUALIZAR PDF INVOICE
    public function getPdfInvoice($invoice)
    {

        $twigOptions = [
            'cache' => storage_path('framework/cache/data/facturacion/pdf'),
            'strict_variables' => true,
        ];

        $report = new HtmlReport('', $twigOptions);
        $resolver = new DefaultTemplateResolver();
        $report->setTemplate($resolver->getTemplate($invoice->clase));

        $params = [
            'system' => [
                'logo' => Storage::get($this->empresa->logo), // Logo de Empresa
                'hash' => $invoice->hash, // Valor Resumen
            ],
            'user' => [
                'header'     => 'Telf: ' . $this->empresa->telefono, // Texto que se ubica debajo de la dirección de empresa
                'footer' => ''
            ]
        ];

        $html = $report->render($invoice->clase, $params);

        return $html;
    }
}
