<?php

namespace App\Http\Controllers;

use App\Models\PengembalianBuku;
use App\Models\Pinjam;
use App\Models\User;
use App\Models\Book;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $pengembalianbuku = PengembalianBuku::selectRaw('count(*) as jumlah')->first();
        $pinjam = Pinjam::selectRaw('count(*) as jumlah')->first();
        $book = Book::selectRaw('count(*) as jumlah')->first();
        $user = User::selectRaw('count(*) as jumlah')->first();

        $cart = [
            'labels' => ['Januari', 'Februari', 'Maret', 'April', 'Mei'],
            'data' => [10, 20, 30, 40, 50],
            'label' => 'Jumlah Buku'
        ];

        return view('welcome', [
            'pengembalianbuku' => $pengembalianbuku,
            'pinjam' => $pinjam,
            'book' => $book,
            'user' => $user,
            'cart' => $cart, // Pastikan untuk mengirimkan variabel $cart ke view
        ]);
    }
}
