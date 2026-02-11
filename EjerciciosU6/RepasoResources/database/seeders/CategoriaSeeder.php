<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            "nombre"=> "Lacteos",
            "descripcion" => "Donde se encuentran los lacteos",
            "activa"=>true,
        ]);
        Categoria::create([
            "nombre"=> "Frutos secos",
            "descripcion" => "Donde se encuentran los frutos secos",
            "activa"=>true,
        ]);
        Categoria::create([
            "nombre"=> "Bebida",
            "descripcion" => "Donde se encuentran las bebida",
            "activa"=>false,
        ]);
        Categoria::create([
            "nombre"=> "Carne",
            "descripcion" => "Donde se encuentran la carne",
            "activa"=>true,
        ]);
    }
}
