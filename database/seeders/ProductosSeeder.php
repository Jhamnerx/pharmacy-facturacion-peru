<?php

namespace Database\Seeders;

use App\Models\Productos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Example data, replace with actual data extracted from Excel
        $products = [
            ['codigo' => 'P001', 'nombre' => 'Paracetamol 500mg', 'forma_farmaceutica' => 'Tableta', 'numero_registro_sanitario' => 'RS-12345'],
            ['codigo' => 'P002', 'nombre' => 'Ibuprofeno 200mg', 'forma_farmaceutica' => 'Cápsula', 'numero_registro_sanitario' => 'RS-67890'],
            // Add more products as needed
        ];

        // Populate the products array to have 50 items
        while (count($products) < 50) {
            $products[] = [
                'codigo' => 'P' . str_pad(count($products) + 1, 3, '0', STR_PAD_LEFT),
                'nombre' => $faker->word . ' ' . $faker->numberBetween(100, 1000) . 'mg',
                'forma_farmaceutica' => $faker->randomElement(['Tableta', 'Cápsula', 'Jarabe']),
                'numero_registro_sanitario' => 'RS-' . $faker->numberBetween(10000, 99999),
            ];
        }

        foreach ($products as $product) {
            Productos::create([
                'tipo_afectacion' => '10',
                'nombre' => $product['nombre'],
                'codigo' => $product['codigo'],
                'forma_farmaceutica' => $product['forma_farmaceutica'],
                'presentacion' => $faker->sentence,
                'numero_registro_sanitario' => $product['numero_registro_sanitario'],
                'stock_minimo' => $faker->numberBetween(10, 100),
                'stock' => $faker->numberBetween(100, 1000),
                'afecto_icbper' => $faker->boolean,
                'estado' => $faker->boolean,
                'ventas' => $faker->numberBetween(0, 500),
                'divisa' => 'PEN',
                'tipo' => 'producto',
                'categoria_id' => $faker->numberBetween(1, 20), // Assuming 20 categories
                'local_id' => 1,
                'unit_code' => 'NIU',
                'precio_unitario' => $faker->randomFloat(4, 150, 200),
                'precio_minimo' => $faker->randomFloat(4, 100, 150),
                'costo_unitario' => $faker->randomFloat(4, 50, 100),
                'user_id' => 1,
            ]);
        }
    }
}
