<?php

namespace Database\Seeders;

use App\Models\Pelicula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelicula::create([
            "titulo"=>"La vida de pi",
            "director"=>"Nestor",
            "duracion"=>180,
            "clasificacion"=>"+18",
            "sinopsis"=>"Una historia de la vida de la vida de la vida",
            "fecha_estreno"=>"03-05-2026",
            "sala_id"=>1
        ]);
        Pelicula::create([
            "titulo"=>"Amadeo",
            "director"=>"Paco",
            "duracion"=>200,
            "clasificacion"=>"+18",
            "sinopsis"=>"La historia de amadeo",
            "fecha_estreno"=>"02-06-2029",
            "sala_id"=>2
        ]);
        Pelicula::create([
            "titulo"=>"Pirri",
            "director"=>"Miguel",
            "duracion"=>180,
            "clasificacion"=>"+18",
            "sinopsis"=>"Una historia de la vida pirri",
            "fecha_estreno"=>"03-09-2026",
            "sala_id"=>3
        ]);
        Pelicula::create([
            "titulo"=>"Cristo",
            "director"=>"Jesus",
            "duracion"=>180,
            "clasificacion"=>"+16",
            "sinopsis"=>"Una historia de la vida dios",
            "fecha_estreno"=>"01-05-2027",
            "sala_id"=>4
        ]);
        Pelicula::create([
            "titulo"=>"Castaña",
            "director"=>"Pablo",
            "duracion"=>90,
            "clasificacion"=>"+12",
            "sinopsis"=>"Una historia de la vida de pablo",
            "fecha_estreno"=>"03-05-2026",
            "sala_id"=>1
        ]);
        Pelicula::create([
            "titulo"=>"Suances",
            "director"=>"Sergio",
            "duracion"=>190,
            "clasificacion"=>"+18",
            "sinopsis"=>"Una historia de la vida suances",
            "fecha_estreno"=>"03-05-2027",
            "sala_id"=>2
        ]);
        Pelicula::create([
            "titulo"=>"El nin",
            "director"=>"Nestor",
            "duracion"=>180,
            "clasificacion"=>"+18",
            "sinopsis"=>"Una historia de la vida del nin",
            "fecha_estreno"=>"03-05-2026",
            "sala_id"=>3
        ]);
        Pelicula::create([
            "titulo"=>"Miengo",
            "director"=>"Diego",
            "duracion"=>180,
            "clasificacion"=>"+18",
            "sinopsis"=>"Una historia de la vida de miengo",
            "fecha_estreno"=>"12-12-2026",
            "sala_id"=>4
        ]);
    }
}
