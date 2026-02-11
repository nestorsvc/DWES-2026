<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $todo = $request->user()->todos;

        return response()->json([
            'success' => true,
            'data' => $todo
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'descripcion' => 'required|string',
            'completed' => 'required|bool',
            'user_id'=>'required|exists:users,id',
        ]);

        $todo = $request->user()->todos()->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Tarea creada',
            'data' => $todo
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return response()->json([
            "success"=>true,
            "data"=>$todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
