<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\plantilla;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create(
            [
                'tipo_documento' => '6',
                'razon_social' => 'PHARMA',
                'nombre_comercial' => 'PHARMA',
                'ruc' => '10987654321',
                'logo' => 'imagenes/logo.png',
                'banner' => 'imagenes/banner.png',
                'direccion' => [
                    "ubigeo" => "130101",
                    "direccion" => "A.H. NUEVO JERUSALEN",
                    "departamento" => "LA LIBERTAD",
                    "provincia" => "TRUJILLO",
                    "distrito" => "LA ESPERANZA"
                ],
                'telefono' => '987654321',
                'pais' => 'PE',
                'modo' => 'local', #producccion
                'sunat_datos' => [
                    "usuario_sol_sunat" => "MODDATOS",
                    "clave_sol_sunat" => "MODDATOS",
                    "clave_certificado_cdt" => "admin",
                    'guia_cliente_id' => 'test-85e5b0ae-255c-4891-a595-0b98c65c9854',
                    'guia_secret' => 'test-Hty/M6QshYvPgItX2P0+Kw==',
                ],
                'correo' => 'correo@gmail.com',
                'mail_config' => [
                    'correo_ventas' => 'ventas@email.com',
                    'correo_soporte' => 'ventas@email.com',
                    'servidor' => 'mboxhosting.com',
                    'password' => '1105gviG',
                    'puerto' => '587',
                    'seguridad' => 'tls',
                    'tipo_envio' => 'smtp',
                ],
                'bienes_selva' => false,
                'servicios_selva' => false,
                'igv' => 18,
                'icbper' => 0.50,
                'ruta_xml' => 'xml/',
                'ruta_cdr' => 'cdr/',
                'ruta_cert' => 'certificado/certificado',
                'terminos' => '["Esta cotizaci\u00f3n es valida hasta su fecha de caducidad","El tiempo de entrega es inmediata previa solicitud con anticipaci\u00f3n"]',
                'extra' => [
                    'texto_superior_login' => 'Bienvenido a BLAS PHARMA',
                    'texto_inferio_login' => '',
                ],
            ]
        );
    }
}
