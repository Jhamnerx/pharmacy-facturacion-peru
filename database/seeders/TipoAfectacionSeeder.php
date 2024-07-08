<?php

namespace Database\Seeders;

use App\Models\TipoAfectacion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoAfectacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [

            [
                'codigo' => '10',
                'descripcion' => 'Gravado - Operación Onerosa',
                'codigo_afectacion' => '1000',
                'nombre_afectacion' => 'IGV',
                'tipo_afectacion' => 'VAT',
                'letra' => 'S'
            ],

            [
                'codigo' => '20',
                'descripcion' => 'Exonerado - Operación Onerosa',
                'codigo_afectacion' => '9997',
                'nombre_afectacion' => 'EXO',
                'tipo_afectacion' => 'VAT',
                'letra' => 'E'
            ], [
                'codigo' => '30',
                'descripcion' => 'Inafecto - Operación Onerosa',
                'codigo_afectacion' => '9998',
                'nombre_afectacion' => 'INA',
                'tipo_afectacion' => 'FRE',
                'letra' => 'O'
            ]

            // [
            //     'codigo' => '40',
            //     'descripcion' => 'Exportación de Bienes o Servicios',
            //     'codigo_afectacion' => '9995',
            //     'nombre_afectacion' => 'EXP',
            //     'tipo_afectacion' => 'FRE',
            //     'letra' => 'G'
            // ],


        ];

        foreach ($tipos as $tipo) {

            TipoAfectacion::create($tipo);
        }
    }
}
