<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['author', 'categories'])->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'isbn' => 'required|string|unique:books,isbn',
            'published_year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'description' => 'nullable|string',
            'is_available' => 'boolean',
        ]);

        $book = Book::create([
            'title' => $validated['title'],
            'author_id' => $validated['author_id'],
            'isbn' => $validated['isbn'],
            'published_year' => $validated['published_year'] ?? null,
            'description' => $validated['description'] ?? null,
            'is_available' => $request->has('is_available'),
        ]);

        // Adjuntar categorías a la tabla pivote
        $book->categories()->attach($validated['categories']);

        return redirect()->route('books.index')
            ->with('success', 'Libro creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::with(['author', 'categories', 'loans.user'])->findOrFail($id);
        return view('books.show', compact('book'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::with(['categories'])->findOrFail($id);
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'isbn' => 'required|string|unique:books,isbn,' . $id,
            'published_year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'description' => 'nullable|string',
            'is_available' => 'boolean',
        ]);

        $book->update([
            'title' => $validated['title'],
            'author_id' => $validated['author_id'],
            'isbn' => $validated['isbn'],
            'published_year' => $validated['published_year'] ?? null,
            'description' => $validated['description'] ?? null,
            'is_available' => $request->has('is_available'),
        ]);

        // Sincronizar categorías
        $book->categories()->sync($validated['categories']);

        return redirect()->route('books.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->categories()->detach(); // elimina relaciones pivot
        $book->delete();

        return redirect()->route('books.index')->with('message', 'Libro eliminado');
    }
}
