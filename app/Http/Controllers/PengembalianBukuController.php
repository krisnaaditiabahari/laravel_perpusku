<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\PengembalianBuku;
use App\Models\Pinjam;
use App\Models\User;
use App\Models\Book;
use Carbon\Carbon;
use PDF;

class PengembalianBukuController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $pengembalianbukus = PengembalianBuku::orderBy('id')
            ->when($search, function ($q, $search) {
                return $q->where('Nama', 'like', "%{$search}%");
            })
            ->paginate();

        if ($search) $pengembalianbukus->appends(['search' => $search]);

        return view('pengembalianbuku.index', [
            'pengembalianbukus' => $pengembalianbukus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $books = Book::all();
        $pinjams = Pinjam::all();
        return view('pengembalianbuku.create', compact('users', 'books', 'pinjams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'Invoice_Peminjaman' => 'required|string',
            'Nama' => 'required|string',
            'Judul_Buku' => 'required|string',
            'Qty' => 'required|integer',
            'Tanggal_Pinjam' => 'required|date',
            'Tanggal_Kembali' => 'required|date',
            'Keterlambatan' => 'required|integer',
            'Denda' => 'required|integer',
        ]);

        // Simpan data ke database
        PengembalianBuku::create([
            'Invoice_Peminjaman' => $request->Invoice_Peminjaman,
            'Nama' => $request->Nama,
            'Judul_Buku' => $request->Judul_Buku,
            'Qty' => $request->Qty,
            'Tanggal_Pinjam' => $request->Tanggal_Pinjam,
            'Tanggal_Kembali' => $request->Tanggal_Kembali,
            'Keterlambatan' => $request->Keterlambatan,
            'Denda' => $request->Denda,
        ]);

        // Redirect setelah berhasil menyimpan data
        return redirect()->route('pengembalianbuku.index')->with('success', 'Data pengembalian buku berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(PengembalianBuku $pengembalianBuku)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengembalianBuku $pengembalianBuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengembalianBuku $pengembalianBuku)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengembalianBuku $pengembalianBuku)
    {
        $pengembalianBuku->delete();

        return back()->with('destroy', 'success');
    }

    public function detail($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        return view('pengembalianbuku.kembalikan_buku', compact('pinjam'));
    }

    public function cetakInvoice(PengembalianBuku $pengembalianBuku)
    {
        $pdf = PDF::loadView('pengembalianbuku.invoice', ['pengembalianBuku' => $pengembalianBuku]);
        return $pdf->stream('invoice_pengembalian_buku.pdf');
    }
}
