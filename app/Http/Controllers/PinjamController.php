<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $pinjams = Pinjam::orderBy('id')
            ->when($search, function ($q, $search) {
                return $q->where('Nama', 'like', "%{$search}%");
            })
            ->paginate();

        if ($search) $pinjams->appends(['search' => $search]);

        return view('pinjam.index', [
            'pinjams' => $pinjams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $books = Book::all();
        return view('pinjam.create', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Invoice_Peminjaman' => ['required', 'max:100'],
            'Nama' => ['required', 'max:100'],
            'Judul_Buku' => ['required', 'max:100'],
            'Qty' => ['required', 'max:10'],
            'Tanggal_Pinjam' => ['required', 'max:100'],
        ]);

        $data = $request->all();
        Pinjam::create($data);
        return redirect()->route('pinjam.index')->with('store', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjam $pinjam)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $books = Book::all(); // Mengambil semua data buku
        return view('pinjam.edit', compact('pinjam', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjam $pinjam)
    {
        $request->validate([
            'Invoice_Peminjaman' => ['required', 'max:100'],
            'Nama' => ['required', 'max:100'],
            'Judul_Buku' => ['required', 'max:100'],
            'Qty' => ['required', 'max:10'],
            'Tanggal_Pinjam' => ['required', 'max:100'],
        ]);

        $data = $request->all();
        $pinjam->update($data);
        return redirect()->route('pinjam.index')->with('update', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjam $pinjam)
    {
        $pinjam->delete();

        return back()->with('destroy', 'success');
    }

    public function printInvoice(Pinjam $pinjam)
    {
        return view('pinjam.invoice', compact('pinjam'));
    }
}
