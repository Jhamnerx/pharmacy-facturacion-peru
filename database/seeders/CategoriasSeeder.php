<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['nombre' => 'Medicamentos', 'descripcion' => 'Medicamentos y tratamientos para diversas enfermedades.'],
            ['nombre' => 'Vitaminas y Suplementos', 'descripcion' => 'Vitaminas, minerales y otros suplementos dietéticos.'],
            ['nombre' => 'Cuidado Personal', 'descripcion' => 'Productos para el cuidado personal y la higiene.'],
            ['nombre' => 'Cuidado de la Piel', 'descripcion' => 'Cremas, lociones y otros productos para el cuidado de la piel.'],
            ['nombre' => 'Cuidado del Cabello', 'descripcion' => 'Shampoos, acondicionadores y tratamientos capilares.'],
            ['nombre' => 'Salud Sexual', 'descripcion' => 'Productos para la salud sexual y reproductiva.'],
            ['nombre' => 'Productos Naturales', 'descripcion' => 'Remedios y productos a base de ingredientes naturales.'],
            ['nombre' => 'Bebés y Maternidad', 'descripcion' => 'Productos para bebés y madres.'],
            ['nombre' => 'Equipos Médicos', 'descripcion' => 'Equipos y dispositivos médicos.'],
            ['nombre' => 'Primera Ayuda', 'descripcion' => 'Productos para primeros auxilios y emergencias.'],
            ['nombre' => 'Homeopatía', 'descripcion' => 'Productos homeopáticos y terapias alternativas.'],
            ['nombre' => 'Ortopedia', 'descripcion' => 'Productos ortopédicos y de rehabilitación.'],
            ['nombre' => 'Cuidado Dental', 'descripcion' => 'Productos para la higiene y el cuidado dental.'],
            ['nombre' => 'Dermocosmética', 'descripcion' => 'Productos cosméticos con beneficios dermatológicos.'],
            ['nombre' => 'Cuidado de Ojos', 'descripcion' => 'Productos para el cuidado y la higiene ocular.'],
            ['nombre' => 'Alimentos y Bebidas', 'descripcion' => 'Alimentos y bebidas saludables.'],
            ['nombre' => 'Herbolaria', 'descripcion' => 'Productos a base de hierbas y plantas medicinales.'],
            ['nombre' => 'Belleza y Cosmética', 'descripcion' => 'Productos de belleza y cosmética.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Desinfección y Limpieza', 'descripcion' => 'Productos para la desinfección y limpieza del hogar.'],
            ['nombre' => 'Accesorios Médicos', 'descripcion' => 'Accesorios y herramientas médicas.'],
        ];

        foreach ($categories as $category) {
            Categorias::create([
                'nombre' => $category['nombre'],
                'descripcion' => $category['descripcion'],
                'estado' => (bool)random_int(0, 1),
                'local_id' => 1,
            ]);
        }
    }
}
