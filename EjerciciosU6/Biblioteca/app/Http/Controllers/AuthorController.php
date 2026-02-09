<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::query()->orderBy('name')->paginate(10);
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'country' => ['nullable', 'string', 'max:100'],
            'birth_date' => ['nullable', 'string', 'date'],
        ]);
        Author::create($data);

        return redirect()->route('authors.index')->with('message', 'Autor Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $author = Author::with(['books.categories'])->findOrFail($id);
        return view('authors.show', compact('author'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view("authors.edit", compact("author"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
        ]);

        $author->update($validated);

        return redirect()->route('authors.index')
            ->with('success', 'Autor actualizado correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Autor eliminado correctamente.');
    }
}
