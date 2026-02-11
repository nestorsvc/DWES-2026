<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaDetalleResource;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return CategoriaResource::collection($categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "nombre" => 'required',
            "descripcion" => "nullable",
            "activa" => "boolean",
        ]);

        $categoria = Categoria::create($data);
        return new CategoriaResource($categoria);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        $categoria->load("productos");
        return new CategoriaDetalleResource($categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $data = $request->validate([
            "nombre" => 'required',
            "descripcion" => "nullable",
            "activa" => "boolean",
        ]);

        $categoria->update($data);
        return new CategoriaResource($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
