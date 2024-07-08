<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Locales;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class LocalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Locales::create([
            'nombre' => 'local 1',
            'empresa_id' => '1',
        ]);
        // Locales::create([
        //     'nombre' => 'Local 2',
        //     'empresa_id' => '1',
        // ]);


        $units  = [

            [
                'codigo' => "BG",
                'name' => "BOLSA",
                // 'empresa_id' => $empresa->id
            ],
            [
                'codigo' => "BO",
                'name' => "BOTELLAS",
                // 'empresa_id' => $empresa->id
            ],
            [
                'codigo' => "BX",
                'name' => "CAJA",
                // 'empresa_id' => $empresa->id
            ],


            [
                'codigo' => "DZN",
                'name' => "DOCENA",
                // 'empresa_id' => $empresa->id
            ],


            [
                'codigo' => "KGM",
                'name' => "KILOGRAMO",
                // 'empresa_id' => $empresa->id
            ],

            [
                'codigo' => "CA",
                'name' => "LATAS",
                // 'empresa_id' => $empresa->id
            ],

            [
                'codigo' => "LTR",
                'name' => "LITRO",
                // 'empresa_id' => $empresa->id
            ],

            [
                'codigo' => "MGM",
                'name' => "MILIGRAMOS",
                // 'empresa_id' => $empresa->id
            ],



            [
                'codigo' => "PK",
                'name' => "PAQUETE",
                // 'empresa_id' => $empresa->id
            ],
            [
                'codigo' => "PR",
                'name' => "PAR",
                // 'empresa_id' => $empresa->id
            ],

            [
                'codigo' => "C62",
                'name' => "PIEZAS",
                // 'empresa_id' => $empresa->id
            ],

            [
                'codigo' => "NIU",
                'name' => "UNIDAD (BIENES)",
                // 'empresa_id' => $empresa->id
            ],
            [
                'codigo' => "ZZ",
                'name' => "UNIDAD (SERVICIOS)",
                // 'empresa_id' => $empresa->id
            ]
        ];
        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
