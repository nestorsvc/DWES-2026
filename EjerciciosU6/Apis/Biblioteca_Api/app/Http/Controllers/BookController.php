<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::query()->get();
        return response()->json([
            'success' => true,
            'data' => $books
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => ['required', 'string', 'min:2'],
                'isbn' => ['required', 'string', 'max:100'],
                'published_year' => ['required', 'int'],
                "author_id" => ['required', 'int']
            ]);
            $book = Book::create($data);

            return (response()->json([
                'success' => true,
                'message' => 'Libro creado exitosamente',
                'data' => $book
            ], 201));
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validacion',
                'errors' => $e->getMessage()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrio un error al intentar crear el autor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $book = Book::find($id);
            if (!$book) {
                return response()->json([
                    'success' => false,
                    'message' => 'Libro no encontrado'
                ], 400);
            }
            return response()->json([
                'success' => true,
                'data' => $book
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrio un error al intentar el libro',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $data = $request->validate([
            'title' => ['required', 'string', 'min:2'],
            'isbn' => ['required', 'string', 'max:100'],
            'published_year' => ['required', 'int'],
            "author_id" => ['required', 'int']
        ]);

        $book->update($data);

        return response()->json([
            'success'=>true,
            'message'=>'Libro actualizado correctamente',
            'data'=> $book
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json([
            'success' => true,
            'message'=> 'Libro borrado correctamente'
        ]);
    }
}
