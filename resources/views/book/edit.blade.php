@extends('layouts.main', ['title' => 'Books'])

@section('title-content')
    <i class="fas fa-users mr-2"></i>
    Pelanggan
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <form method="POST" class="card card-orange card-outline"
                action="{{ route('books.update', ['book' => $book->id]) }}">
                <div class="card-header">
                    <h3 class="card-title">Ubah Data Buku</h3>
                </div>
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Code</label>
                        <x-input name="code" type="text" :value="$book->code" />
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <x-input name="title" type="text" :value="$book->title" />
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <x-input name="author" type="text" :value="$book->author" />
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <x-input name="stock" type="text" :value="$book->stock" />
                    </div>
                </div>
                <div class="card-footer form-inline">
                    <button type="submit" class="btn btn-primary">
                        Update Data Buku
                    </button>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary ml-auto">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
