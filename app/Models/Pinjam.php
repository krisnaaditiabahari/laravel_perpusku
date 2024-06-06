<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['Invoice_Peminjaman', 'Nama', 'Judul_Buku', 'Qty', 'Tanggal_Pinjam'];

}
