@extends('layouts.main', ['title' => 'pinjam'])
@section('title-content')
    <i class="fas fa-users mr-2"></i>
    Peminjaman Buku
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <form method="POST" class="card card-orange card-outline"
                action="{{ route('pinjam.update', ['pinjam' => $pinjam->id]) }}">
                <div class="card-header">
                    <h3 class="card-title">Update Data Peminjaman Buku</h3>
                </div>
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Invoice Peminjaman</label>
                        <x-input name="Invoice_Peminjaman" type="text" :value="$pinjam->Invoice_Peminjaman" readonly />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <x-input name="Nama" type="text" :value="$pinjam->Nama" readonly />
                    </div>
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <select name="Judul_Buku" class="form-control @error('Judul_Buku') is-invalid @enderror">
                            @foreach($books as $book)
                                <option value="{{ $book->title }}" {{ $pinjam->Judul_Buku == $book->title ? 'selected' : '' }}>
                                    {{ $book->title }}
                                </option>
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
                        <x-input name="Qty" type="text" :value="$pinjam->Qty" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <x-input name="Tanggal_Pinjam" type="date" :value="$pinjam->Tanggal_Pinjam" />
                    </div>
                </div>
                <div class="card-footer form-inline">
                    <button type="submit" class="btn btn-primary">
                        Update Peminjaman
                    </button>

                    <a href="{{ route('pinjam.index') }}" class="btn btn-secondary ml-auto">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
