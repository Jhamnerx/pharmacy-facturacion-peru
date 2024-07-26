<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class updateEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresa = \App\Models\Empresa::first();
        if ($empresa) {
            $empresa->update([
                'regimen_type' => 'NRUS',
                'soap_type' => 'sunat',
                'soap_url' => 'https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService',
                'guia_api_datos' => [
                    'cliente_id' => '',
                    'cliente_secret' => '',
                ],
                'sire_datos' => [
                    'url' => 'https://e-beta.sunat.gob.pe/ol-ti-itemision-otroscpe-gem-beta/billService',
                    'cliente_id' => '',
                    'cliente_secret' => '',
                    'usuario' => 'MODDATOS',
                    'clave' => 'MODDATOS'
                ],
                'qpse_datos' => [
                    'usuario' => 'GVKXPJ3Y',
                    'clave' => 'FE5PKUMZ',
                ],
            ]);
        }
    }
}
