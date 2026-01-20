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
        return view('authors.index',compact('authors'));
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
            'name'=> ['required','string','min:2'],
            'country'=>['nullable','string','max:100'],
            'birth_date'=> ['nullable','string','date'],
        ]);
        $author = Author::create($data);

        return redirect()->route('authors.index')->with('message','Autor Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $data = $request->validate([
            'name'=> ['required','string','min:2'],
            'country'=>['nullable','string','max:100'],
            'birth_date'=> ['nullable','date'],
        ]);

        $author->update($data);
        return redirect()->route('authors.index')->with('message','Autor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('message','Autor eliminado');

    }
}
