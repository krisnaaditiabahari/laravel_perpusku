<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengembalian_bukus', function (Blueprint $table) {
            $table->id();
            $table->string('Invoice_Peminjaman');
            $table->string('Nama');
            $table->string('Judul_Buku');
            $table->unsignedInteger('Qty');
            $table->date('Tanggal_Pinjam');
            $table->date('Tanggal_Kembali');
            $table->unsignedInteger('Keterlambatan');
            $table->unsignedInteger('Denda');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_bukus');
    }
};
