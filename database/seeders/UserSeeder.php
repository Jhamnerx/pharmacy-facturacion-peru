<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Jhamner Sifuentes Vasquez',
            'email' => 'jhamnerx1x@gmail.com',
            'password' => bcrypt('12345678'),
            'local_id' => 1
        ]);
        $user = User::create([
            'name' => 'Lizeth Ramirez Blas',
            'email' => 'lizethramirezblas21102000@gmail.com',
            'password' => bcrypt('12345678'),
            'local_id' => 1
        ]);
    }
}
