<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::query()->orderBy("name")->get();

        return response()->json([
            'success' => true,
            'data' => $authors
        ], 200); // Codigo OK
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validar los datos del cliente
            $data = $request->validate([
                'name' => ['required', 'string', 'min:2'],
                'country' => ['nullable', 'string', 'max:100'],
                'birth_date' => ['nullable', 'date'],
            ]);
            // Crear el autor
            $author = Author::create($data);
            // Respuesta de éxito con código 201
            return response()->json([
                'success' => true,
                'message' => 'Autor creado exitosamente',
                'data' => $author,
            ], 201); // HTTP Created

        } catch (ValidationException $e) {
            // Manejar errores de validación
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->getMessage(), // Retorna los errores específicos de validación
            ], 422); // HTTP Unprocessable Entity

        } catch (Exception $e) {
            // Manejar errores inesperados
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al intentar crear el autor.',
                'error' => $e->getMessage(),
                // Mensaje detallado solo para pruebas (no en producción)
            ], 500); // HTTP Internal Server Error
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Buscar el autor por ID
            $author = Author::find($id);
            if (!$author) {
                // Retornar error si no se encuentra
                return response()->json([
                    'success' => false,
                    'message' => 'Autor no encontrado',
                ], 404); // HTTP Not Found
            }
            // Respuesta de éxito
            return response()->json([
                'success' => true,
                'data' => $author,
            ], 200); // HTTP OK
        } catch (Exception $e) {
            // Manejar errores inesperados
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al intentar obtener el autor.',
                'error' => $e->getMessage(),
            ], 500); // HTTP Internal Server Error
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'country' => ['nullable', 'string', 'max:100'],
            'birth_date' => ['nullable', 'date']
        ]);
        Author::update($data);

        return response()->json([
            'success' => true,
            'message' => 'Autor actualizado correctamente',
            'data' => Author::find($id) // Sacamos el autor desde su id
        ], 200); // Codigo OK
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);
        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Autor eliminado correctamente',
        ], 200);
    }
}
