<?php

namespace Database\Seeders;

use App\Models\Productos;
use App\Models\Categorias;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CopyProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $categorias = Categorias::with('productos.lotes')->get();

            // Inicializar el contador del código del producto
            $codeCounter = $this->initializeCodeCounter(2);

            foreach ($categorias as $categoria) {
                // Clonar la categoría
                $nuevaCategoria = Categorias::create([
                    'nombre' => $categoria->nombre,
                    'descripcion' => $categoria->descripcion,
                    'local_id' => 2,
                ]);

                // Clonar los productos de la categoría
                foreach ($categoria->productos as $producto) {
                    $nuevoProducto = $producto->replicate();
                    $nuevoProducto->local_id = 2;
                    $nuevoProducto->categoria_id = $nuevaCategoria->id;
                    $nuevoProducto->codigo = $this->generateProductCode($codeCounter);
                    $nuevoProducto->save();

                    // Incrementar el contador del código del producto
                    $codeCounter++;

                    // Clonar los lotes del producto
                    foreach ($producto->lotes as $lote) {
                        $nuevoLote = $lote->replicate();
                        $nuevoLote->producto_id = $nuevoProducto->id;
                        $nuevoLote->local_id = 2;
                        $nuevoLote->save();
                    }
                }
            }
        });
    }

    /**
     * Inicializar el contador del código del producto basado en el último producto del local dado.
     *
     * @param int $local_id
     * @return int
     */
    private function initializeCodeCounter(int $local_id): int
    {
        $latestProduct = Productos::where('local_id', $local_id)->latest('id')->first();

        if (!$latestProduct) {
            return 1;
        } else {
            return intval(substr($latestProduct->codigo, 2)) + 1;
        }
    }

    /**
     * Generar el código del producto basado en el contador actual.
     *
     * @param int $counter
     * @return string
     */
    private function generateProductCode(int $counter): string
    {
        $prefix = 'MD'; // Los tres caracteres fijos
        return $prefix . str_pad($counter, 5, '0', STR_PAD_LEFT); // Llenar con ceros a la izquierda para que tenga 5 dígitos
    }
}
