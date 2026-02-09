<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salas = Sala::all();
        return view('salas.index',compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            "nombre"=>"required|string",
            "capacidad"=>"required|int",
            "tipo"=>"required|string",
            "activa"=>"required|boolean"
        ]);

        Sala::create($data);

        return redirect()->route('salas.index')->with("message","Sala creada correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sala = Sala::find($id);
        return view("salas.show",compact("sala"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sala $sala)
    {
        return view("salas.edit",compact("sala"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sala $sala)
    {
         $data = $request->validate([
            "nombre"=>"required|string",
            "capacidad"=>"nullable|int",
            "tipo"=>"nullable|string",
            "activa"=>"nullable|boolean"
        ]);

        $sala->update($data);

        return redirect()->route('salas.index')->with("message","Sala creada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sala $sala)
    {
        $sala->delete();
        return redirect()->route("salas.index")->with("message","Sala eliminada correctamente");
    }
}
