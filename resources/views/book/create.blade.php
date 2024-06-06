@extends('layouts.main', ['title' => 'Pelanggan'])
@section('title-content')
    <i class="fas fa-book mr-2"></i>
    Buku
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <form method="POST" action="{{ route('book.store') }}" class="card card-orange card-outline">
                <div class="card-header">
                    <h3 class="card-title">Masukan Buku Baru</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label>Code</label>
                        <x-input name="code" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <x-input name="title" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <x-input name="author" type="text" />
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <x-input name="stock" type="text" />
                    </div>
                </div>
                <div class="card-footer form-inline">
                    <button type="submit" class="btn btn-primary">
                        Simpan Buku
                    </button>
                    <a href="{{ route('book.index') }}" class="btn btn-secondary ml-auto">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
