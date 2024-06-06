@extends('layouts.main', ['title' => 'Pengembalian Buku'])
@section('title-content')
    <i class="fas fa-users mr-2"></i>
    Pengembalian Buku
@endsection
@section('content')
    @if (session('store') == 'success')
        <x-alert type="success">
            <strong>Berhasil dibuat!</strong> Pengembalian Buku berhasil dibuat.
        </x-alert>
    @endif
    @if (session('update') == 'success')
        <x-alert type="success">
            <strong>Berhasil diupdate!</strong> Pengembalian Buku berhasil diupdate.
        </x-alert>
    @endif
    @if (session('destroy') == 'success')
        <x-alert type="success">
            <strong>Berhasil dihapus!</strong> Pengembalian Buku dihapus.
        </x-alert>
    @endif
    <div class="card card-orange card-outline">
        <div class="card-header form-inline">
            <a href="{{ route('pengembalianbuku.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i> Tambah
            </a>
            <form action="?" method="get" class="ml-auto">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" value="{{ request()->search }}"
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
                        <th>Invoice Peminjaman</th>
                        <th>Nama</th>
                        <th>Judul Buku</th>
                        <th>Qty</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Keterlambatan</th>
                        <th>Denda</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengembalianbukus as $key => $pengembalian)
                        <tr>
                            <td>{{ $pengembalianbukus->firstItem() + $key }}</td>
                            <td>{{ $pengembalian->Invoice_Peminjaman }}</td>
                            <td>{{ $pengembalian->Nama }}</td>
                            <td>{{ $pengembalian->Judul_Buku }}</td>
                            <td>{{ $pengembalian->Qty }}</td>
                            <td>{{ $pengembalian->Tanggal_Pinjam }}</td>
                            <td>{{ $pengembalian->Tanggal_Kembali }}</td>
                            <td>{{ $pengembalian->Keterlambatan }}</td>
                            <td>{{ $pengembalian->Denda }}</td>
                            <td class="text-right">
                                <a href="{{ route('pengembalianbuku.cetakInvoice', $pengembalian) }}"
                                    class="btn btn-xs btn-success">
                                    <i class="fas fa-file-invoice mr-1"></i> Cetak Invoice
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $pengembalianbukus->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection

@push('modals')
    <x-modal-delete />
@endpush
