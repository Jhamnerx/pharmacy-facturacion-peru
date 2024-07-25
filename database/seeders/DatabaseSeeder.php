<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categorias;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(EmpresaSeeder::class);
        // $this->call(LocalesSeeder::class);
        // $this->call(MetodoPagoSeeder::class);
        // $this->call(ModalidadTransporteSeeder::class);
        // $this->call(MotivoTrasladoSeeder::class);
        // $this->call(SustentosSeeder::class);
        // $this->call(TipoAfectacionSeeder::class);
        // $this->call(tipoComprobanteSeeder::class);
        // $this->call(tipoDocumentosSeeder::class);
        // $this->call(UbigeosSeeder::class);
        // $this->call(SerieSeeder::class);
        // $this->call(ClientesSeeder::class);
        // //$this->call(CategoriasSeeder::class);
        // // $this->call(ProductosSeeder::class);
        // $this->call(CodigosDetraccionesSeeder::class);
        // $this->call(PermisosSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(CreateLotesForExistingProductsSeeder::class);
        //$this->call(PermisosSeeder::class);
        $this->call(updateEmpresaSeeder::class);
    }
}
