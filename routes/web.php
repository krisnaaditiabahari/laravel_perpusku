<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PengembalianBukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('home')->middleware('auth');

Route::view('login', 'auth.login')->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::singleton('profile', ProfileController::class);
    Route::middleware('can:admin')->group(function () {
        Route::resource('user', UserControler::class);
        Route::resource('books', BooksController::class);
        Route::resource('pinjam', PinjamController::class);
        Route::get('pinjam/{pinjam}/print', [PinjamController::class, 'printInvoice'])->name('pinjam.print');
        Route::resource('pengembalianbuku', PengembalianBukuController::class);
        Route::get('/pengembalianbuku/detail/{id}', [PengembalianBukuController::class, 'detail'])->name('pengembalianbuku.detail');
        Route::post('/pengembalianbuku/store', [PengembalianBukuController::class, 'store'])->name('pengembalianbuku.store');
        Route::get('pengembalianbuku/{pengembalianBuku}/cetak-invoice', [PengembalianBukuController::class, 'cetakInvoice'])->name('pengembalianbuku.cetakInvoice');
       
    });
});
