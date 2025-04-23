<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;



class BookController extends Controller
{
    public function index()
    {
        $books = Book::all(); 
        
        return view('books.index', compact('books'));

        
    }

    public function create()
    {
        return view('books.create');

    }

    public function riview()
    {
        $books = Book::all();
        return view('books.riview', compact('books'));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'description' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('covers', 'public');
            $validated['cover'] = basename($cover);
        }
    
        Book::create($validated);
    
        return redirect()->route('books.riview')->with('success', 'Buku berhasil ditambahkan!');
    }

    
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'description' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('covers', 'public');
            $validated['cover'] = basename($cover);
    
            if ($book->cover && file_exists(storage_path('app/public/covers/' . $book->cover))) {
                unlink(storage_path('app/public/covers/' . $book->cover));
            }
        }
    
        $book->update($validated);
    
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

   
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

    $book->delete();

    return redirect()->route('books.riview')->with('success', 'Review berhasil dihapus!');
    }
}
