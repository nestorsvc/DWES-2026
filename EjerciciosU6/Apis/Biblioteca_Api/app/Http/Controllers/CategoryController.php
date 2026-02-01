<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use COM;
use Exception;
use League\Config\Exception\ValidationException;
use PhpParser\Node\Expr;
use PHPUnit\TextUI\XmlConfiguration\FailedSchemaDetectionResult;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->get();

        return response()->json([
            'success' => true,
            'data' => $categories
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                "name" => ['required', 'string'],
                "slug" => ['required', 'string']
            ]);
            $category = Category::create($data);
            return response()->json([
                'success' => true,
                'message' => 'Categoria creado con extio',
                'data' => $category
            ], 201);
        } catch (ValidationException $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error de validacion',
                'error' => $e->getMessage()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrio un error al intentar crear la categoria',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        try {

            if (!$category) {
                return response()->json([
                    'success' => false,
                    'message' => 'Categoria no encontrada'
                ], 400);
            }

            return response()->json([
                'success' => true,
                'data' => $category
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrio un error al intentar obtener el autor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validate([
            "name" => ['required', 'string'],
            "slug" => ['required', 'string']
        ]);

        $category->update($data);

        return response()->json([
            'success'=>true,
            'message'=>'Categoria actualizada correctamente',
            'data' => $category
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();
        return response()->json([
            'success' => true,
            'message' => 'Categoria borrada correctamente'
        ],200);
    }
}
