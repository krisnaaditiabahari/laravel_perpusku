<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::create([
            'nama' => 'Angga',
            'username' => 'M001',
            'role' => 'member',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::create([
            'nama' => 'Ferry',
            'username' => 'M002',
            'role' => 'member',
            'password' => bcrypt('password'),
        ]);

        \App\Models\User::create([
            'nama' => 'Putri',
            'username' => 'M003',
            'role' => 'member',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Book::create([
            'code' => 'JK-45',
            'title' => "Harry Potter",
            'author' => "J.K Rowling",
            'stock' => 1,
        ]);

        \App\Models\Book::create([
            'code' => 'SHR-1',
            'title' => "A Study in Scarlet",
            'author' => "Arthur Conan Doyle",
            'stock' => 1,
        ]);

        \App\Models\Book::create([
            'code' => 'TW-11',
            'title' => "Twilight",
            'author' => "Stephenie Meyer",
            'stock' => 1,
        ]);

        \App\Models\Book::create([
            'code' => 'HOB-83',
            'title' => "The Hobbit, or There and Back Again",
            'author' => "J.R.R. Tolkien",
            'stock' => 1,
        ]);

        \App\Models\Book::create([
            'code' => 'NRN-7',
            'title' => "The Lion, the Witch and the Wardrobe",
            'author' => "C.S. Lewis",
            'stock' => 1,
        ]);

        \App\Models\Pinjam::create([
            'Invoice_Peminjaman' => 'INV-0001',
            'Nama' => 'Putri',
            'Judul_Buku' => 'Twilight',
            'Qty' => '1',
            'Tanggal_Pinjam' => Carbon::now()->subDays(7),
        ]);

        \App\Models\Pinjam::create([
            'Invoice_Peminjaman' => 'INV-0002',
            'Nama' => 'Angga',
            'Judul_Buku' => 'The Hobbit, or There and Back Again',
            'Qty' => '1',
            'Tanggal_Pinjam' => Carbon::now()->subDays(7),
        ]);

        \App\Models\Pinjam::create([
            'Invoice_Peminjaman' => 'INV-0003',
            'Nama' => 'Ferry',
            'Judul_Buku' => 'The Lion, the Witch and the Wardrobe',
            'Qty' => '1',
            'Tanggal_Pinjam' => Carbon::now()->subDays(7),
        ]);
    }
}
