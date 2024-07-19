<?php

namespace Database\Seeders;

use App\Models\Lote;
use App\Models\Productos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateLotesForExistingProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::transaction(function () {

            // Obtener todos los productos
            $productos = Productos::all();

            foreach ($productos as $producto) {
                // Verificar si el producto tiene lote y fecha de vencimiento
                if ($producto->lote) {

                    // Crear un nuevo lote para el producto
                    Lote::create([
                        'producto_id' => $producto->id,
                        'codigo_lote' => $producto->lote,
                        'fecha_vencimiento' => $producto->fecha_vencimiento,
                        'proveedor_id' => null, // Usar el proveedor por defecto
                        'stock' => $producto->stock, // Usar el stock del producto
                        // Otros campos según sea necesario

                    ]);
                }
            }
        });
    }
}
