@extends('layouts.main', ['title' => 'pinjam'])

@section('title-content')
    <i class="fas fa-users mr-2"></i>
    Form Peminjaman Buku
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <form method="POST" action="{{ route('pinjam.store') }}" class="card card-orange card-outline">
                <div class="card-header">
                    <h3 class="card-title">Buat Peminjaman Buku Baru</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label>Invoice Peminjaman</label>
                        <x-input name="Invoice_Peminjaman" type="text" value="INV-" />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <select name="Nama" class="form-control @error('Nama') is-invalid @enderror">
                            <option value="">Pilih Nama</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->nama }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                        @error('Nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <select name="Judul_Buku" class="form-control @error('Judul_Buku') is-invalid @enderror">
                            <option value="">Pilih Judul Buku</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->title }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                        @error('Judul_Buku')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Qty</label>
                        <x-input name="Qty" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <x-input name="Tanggal_Pinjam" type="date" id="tanggal_pinjam" />
                    </div>
                </div>
                <div class="card-footer form-inline">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <a href="{{ route('pinjam.index') }}" class="btn btn-secondary ml-auto">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
