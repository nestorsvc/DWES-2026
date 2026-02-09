<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Sala;
use Illuminate\Http\Request;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Pelicula::all();
        return view("peliculas.index", compact("peliculas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salas = Sala::where('activa', true)->get();
        return view("peliculas.create", compact("salas"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "titulo" => "required|string",
            "director" => "required|string",
            "duracion" => "required|int",
            "clasificacion" => "required|string",
            "sinopsis" => "required|string",
            "fecha_estreno" => "required",
            "sala_id" => "required"
        ]);

        Pelicula::create($data);
        return redirect()->route("peliculas.index")->with("message", "Pelicula creada correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);
        return view("peliculas.show", compact("pelicula"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        $salas = Sala::where('activa', true)->get();
        return view("peliculas.edit", compact("salas"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $data = $request->validate([
            "titulo" => "required|string",
            "director" => "required|string",
            "duracion" => "required|int",
            "clasificacion" => "required|string",
            "sinopsis" => "required|string",
            "fecha_estreno" => "required",
            "sala_id" => "required|exists:salas"
        ]);

        $pelicula->update($data);
        return redirect()->route("peliculas.index")->with("message", "Pelicula editada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return redirect()->route("peliculas.index")->with("message","Pelicula eliminada con exito");
    }
}
