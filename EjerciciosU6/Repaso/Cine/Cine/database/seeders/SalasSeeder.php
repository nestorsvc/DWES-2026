<?php

namespace Database\Seeders;

use App\Models\Sala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sala::create([
        "nombre"=>"Sala Santander",
        "capacidad"=>200,
        "tipo"=>"normal",
        "activa"=>true
        ]);

        Sala::create([
        "nombre"=>"Sala Torrelavega",
        "capacidad"=>150,
        "tipo"=>"3D",
        "activa"=>false
        ]);

        Sala::create([
        "nombre"=>"Sala Suances",
        "capacidad"=>300,
        "tipo"=>"normal",
        "activa"=>true
        ]);

        Sala::create([
        "nombre"=>"Sala Cartes",
        "capacidad"=>100,
        "tipo"=>"normal",
        "activa"=>true
        ]);
    }
}
