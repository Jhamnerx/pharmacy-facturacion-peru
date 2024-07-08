<?php

namespace Database\Seeders;

use App\Models\Clientes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Clientes::create([
            'razon_social' => 'CLIENTE VARIOS',
            'tipo_documento_id' => '1',
            'local_id' => '1',
            'numero_documento' => '00000000',
            'email' => 'sin-correo@gmail.com',
            'direccion' => 'SIN DIRECCION',

        ]);
        // $user = Clientes::create([
        //     'razon_social' => 'CLIENTE VARIOS',
        //     'tipo_documento_id' => '1',
        //     'local_id' => '2',
        //     'numero_documento' => '00000000',
        //     'email' => 'sin-correo@gmail.com',
        //     'direccion' => 'SIN DIRECCION',

        // ]);

        // $user = Clientes::create([
        //     'razon_social' => 'CLIENTE DE PRUEBA',
        //     'tipo_documento_id' => '1',
        //     'numero_documento' => '12345678',
        //     'direccion' => 'SIN DIRECCION',

        // ]);
        // $user = Clientes::create([
        //     'razon_social' => 'EMPRESA DE PRUEBA',
        //     'tipo_documento_id' => '6',
        //     'numero_documento' => '12345678910',
        //     'direccion' => 'SIN DIRECCION',

        // ]);
    }
}
