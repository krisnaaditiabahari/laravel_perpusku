@extends('layouts.main', ['title' => 'Invoice Peminjaman'])

@section('content')
    <div class="container mt-5">
        <div class="card ">
            <h3 class="center">{{ config('app.name') }}</h3>
            <p class="center">
                Rancaekek, Kab. Bandung
            </p>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Invoice: {{ $pinjam->Invoice_Peminjaman }}</h4>
                        <h4>Nama: {{ $pinjam->Nama }}</h4>
                        <h4>Judul Buku: {{ $pinjam->Judul_Buku }}</h4>
                        <h4>Qty: {{ $pinjam->Qty }}</h4>
                        <h4>Tanggal Pinjam: {{ $pinjam->Tanggal_Pinjam }}</h4>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button onclick="window.print()" class="btn btn-primary">
                    <i class="fas fa-print"></i> Cetak
                </button>
            </div>
        </div>
    </div>
@endsection
