<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $books = Book::orderBy('code')
            ->when($search, function ($q, $search) {
                return $q->where('title', 'like', "%{$search}%");
            })
            ->paginate();

        if ($search) $books->appends(['search' => $search]);

        return view('book.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'max:10'],
            'title' => ['required', 'max:100'],
            'author' => ['nullable', 'max:500'],
            'stock' => ['nullable', 'max:14'],
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('store', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'code' => ['required', 'max:10'],
            'title' => ['required', 'max:100'],
            'author' => ['nullable', 'max:500'],
            'stock' => ['nullable', 'max:14'],
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('update', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return back()->with('destroy', 'success');
    }
}
