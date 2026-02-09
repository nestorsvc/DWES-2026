<?php

namespace Database\Seeders;

use App\Models\User;
use App\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=>"nestor",
            "email"=>"admin@biblioteca.com",
            // Guardamos la contraseña cifrada con la herramienta de laravel Hash::make(password)
            "password"=>Hash::make("password"),
            "role"=>UserRole::ADMIN,
        ]);

        User::create([
            "name"=>"diego",
            "email"=>"bibliotecario@biblioteca.com",
            "password"=>Hash::make("password"),
            "role"=>UserRole::LIBRARIAN
        ]);

        User::create([
            "name"=>"pablo",
            "email"=>"socio@biblioteca.com",
            "password"=>Hash::make("password"),
            "role"=>UserRole::USER
        ]);
    }
}
