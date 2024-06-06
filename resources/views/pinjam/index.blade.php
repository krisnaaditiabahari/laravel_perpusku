@extends('layouts.main', ['title' => 'PengembalianBuku'])
@section('title-content')
    <i class="fas fa-users mr-2"></i>
    Peminjaman Buku
@endsection
@section('content')
    @if (session('store') == 'success')
        <x-alert type="success">
            <strong>Berhasil dibuat!</strong> Peminjaman Buku berhasil dibuat.
        </x-alert>
    @endif
    @if (session('update') == 'success')
        <x-alert type="success">
            <strong>Berhasil diupdate!</strong> Peminjaman Buku berhasil diupdate.
        </x-alert>
    @endif
    @if (session('destroy') == 'success')
        <x-alert type="success">
            <strong>Berhasil dihapus!</strong> Peminjaman berhasil dihapus.
        </x-alert>
    @endif
    <div class="card card-orange card-outline">
        <div class="card-header form-inline">
            <a href="{{ route('pinjam.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i> Tambah
            </a>
            <form action="?" method="get" class="ml-auto">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" value="<?= request()->search ?>"
                        placeholder="Nama">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice_Peminjaman</th>
                        <th>Nama</th>
                        <th>Judul_Buku</th>
                        <th>Qty</th>
                        <th>Tanggal_Pinjam</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pinjams as $key => $pinjam)
                        <tr>
                            <td>{{ $pinjams->firstItem() + $key }}</td>
                            <td>{{ $pinjam->Invoice_Peminjaman }}</td>
                            <td>{{ $pinjam->Nama }}</td>
                            <td>{{ $pinjam->Judul_Buku }}</td>
                            <td>{{ $pinjam->Qty }}</td>
                            <td>{{ $pinjam->Tanggal_Pinjam }}</td>
                            <td class="text-right">
                                <a href="{{ route('pinjam.edit', [
                                    'pinjam' => $pinjam->id,
                                ]) }}"
                                    class="btn btn-xs text-success p-0 mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button type="button" data-toggle="modal" data-target="#modalDelete"
                                    data-url="{{ route('pinjam.destroy', [
                                        'pinjam' => $pinjam->id,
                                    ]) }}"
                                    class="btn btn-xs text-danger p-0 btn-delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <a href="{{ route('pinjam.print', ['pinjam' => $pinjam->id]) }}"
                                    class="btn btn-xs btn-success" target="_blank">
                                    <i class="fas fa-file-invoice mr-1"></i> Cetak Invoice
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $pinjams->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection

@push('modals')
    <x-modal-delete />
@endpush
