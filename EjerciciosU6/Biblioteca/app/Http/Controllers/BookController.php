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
        $books = Book::query()
            ->with(['author', 'categories'])
            ->orderBy('title')
            ->paginate(10);

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
        $data = $request->validate([
            'title' => ['required', 'string', 'min:2'],
            'isbn' => ['nullable', 'string', 'unique:books,isbn'],
            'author_id' => ['required', 'exists:authors,id'],
            'published_year' => ['nullable', 'numeric'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:categories,id'],
        ]);

        $book = Book::create($data);

        // Sincroniza categorías en la tabla pivot
        if (!empty($data['categories'])) {
            $book->categories()->sync($data['categories']);
        }

        return redirect()->route('books.index')->with('message', 'Libro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load(['author', 'categories']);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        $book->load('categories');

        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'min:2'],
            'isbn' => ['nullable', 'string', 'unique:books,isbn,' . $book->id],
            'author_id' => ['required', 'exists:authors,id'],
            'published_year' => ['nullable', 'numeric'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:categories,id'],
        ]);

        $book->update($data);

        // Sincroniza categorías en la tabla pivot
        $book->categories()->sync($data['categories'] ?? []);

        return redirect()->route('books.index')->with('message', 'Libro actualizado');
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
