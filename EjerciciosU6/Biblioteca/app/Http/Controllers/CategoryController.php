<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()
            ->orderBy('name')
            ->paginate(10);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'unique:categories,name'],
        ]);

        // Creamos el slug automáticamente
        $data['slug'] = \Str::slug($data['name']);

        Category::create($data);

        return redirect()->route('categories.index')->with('message', 'Categoría creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
         return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
         $data = $request->validate([
            'name' => ['required', 'string', 'min:2', 'unique:categories,name,' . $category->id],
        ]);

        $data['slug'] = \Str::slug($data['name']);

        $category->update($data);

        return redirect()->route('categories.index')->with('message', 'Categoría actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Antes de borrar, eliminamos las relaciones con libros
        $category->books()->detach();

        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Categoría eliminada');
    }
}
