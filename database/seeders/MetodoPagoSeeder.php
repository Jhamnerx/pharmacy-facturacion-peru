<?php

namespace Database\Seeders;

use App\Models\MetodoPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $metodos = [
            [
                'codigo' => '001',
                'descripcion' => 'Depósito en cuenta'
            ],
            [
                'codigo' => '002',
                'descripcion' => 'Giro'
            ],
            [
                'codigo' => '003',
                'descripcion' => 'Transferencia bancaria'
            ],
            [
                'codigo' => '004',
                'descripcion' => 'Orden de pago'
            ],
            [
                'codigo' => '005',
                'descripcion' => 'Tarjeta de débito'
            ],
            [
                'codigo' => '006',
                'descripcion' => 'Tarjeta de crédito'
            ],
            // [
            //     'codigo' => '007',
            //     'descripcion' => 'Cheques con la cláusula de \"NO NEGOCIABLE\", \"INTRANSFERIBLES\", \"NO A LA ORDEN\" u otra equivalente, a que se refiere el inciso g) del artículo 5° de la ley'
            // ],
            // [
            //     'codigo' => '008',
            //     'descripcion' => 'Efectivo, por operaciones en las que no existe obligación de utilizar medio de pago'
            // ],
            [
                'codigo' => '009',
                'descripcion' => 'Efectivo'
            ],
            // [
            //     'codigo' => '010',
            //     'descripcion' => 'Medios de pago usados en comercio exterior'
            // ],
            // [
            //     'codigo' => '011',
            //     'descripcion' => 'Documentos emitidos por las EDPYMES y las cooperativas de ahorro y crédito no autorizadas a captar depósitos del público'
            // ],
            // [
            //     'codigo' => '012',
            //     'descripcion' => 'Tarjeta de crédito emitida en el país o en el exterior por una empresa no perteneciente al sistema financiero, cuyo objeto principal sea la emisión y administración de tarjetas de crédito'
            // ],
            // [
            //     'codigo' => '013',
            //     'descripcion' => 'Tarjetas de crédito emitidas en el exterior por empresas bancarias o financieras no domiciliadas'
            // ],
            // [
            //     'codigo' => '101',
            //     'descripcion' => 'Transferencias – Comercio exterior'
            // ],
            // [
            //     'codigo' => '102',
            //     'descripcion' => 'Cheques bancarios - Comercio exterior'
            // ],
            // [
            //     'codigo' => '103',
            //     'descripcion' => 'Orden de pago simple - Comercio exterior'
            // ],
            // [
            //     'codigo' => '104',
            //     'descripcion' => 'Orden de pago documentario - Comercio exterior'
            // ],
            // [
            //     'codigo' => '105',
            //     'descripcion' => 'Remesa simple - Comercio exterior'
            // ],
            // [
            //     'codigo' => '106',
            //     'descripcion' => 'Remesa documentaria - Comercio exterior'
            // ],
            // [
            //     'codigo' => '107',
            //     'descripcion' => 'Carta de crédito simple - Comercio exterior'
            // ],
            // [
            //     'codigo' => '108',
            //     'descripcion' => 'Carta de crédito documentario - Comercio exterior'
            // ],
            [
                'codigo' => '999',
                'descripcion' => 'Otros medios de pago'
            ],
        ];

        foreach ($metodos as $metodo) {

            MetodoPago::create($metodo);
        }
    }
}
