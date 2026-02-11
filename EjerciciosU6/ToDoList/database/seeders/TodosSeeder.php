<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::create([
            "title" => "Estudiar Laravel",
            "descripcion" => "Estudiar apis con laravel para el examen del jueves",
            "completed" => false,
            "user_id" => 1
        ]);

        Todo::create([
            "title" => "Estudiar React",
            "descripcion" => "Estudiar react para llevar preparado el examen del jueves",
            "completed" => false,
            "user_id" => 1
        ]);

        Todo::create([
            "title" => "Trabajo DWES",
            "descripcion" => "Entregar trabajo a Oscar de autenticacion en laravel",
            "completed" => true,
            "user_id" => 1
        ]);
    }
}
