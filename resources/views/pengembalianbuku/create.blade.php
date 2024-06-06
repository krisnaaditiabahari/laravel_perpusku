@extends('layouts.main', ['title' => 'Pengembalian Buku'])

@section('title-content')
    <i class="fas fa-users mr-2"></i>
    Form Pengembalian Buku
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <form method="POST" action="{{ route('pengembalianbuku.store') }}" class="card card-orange card-outline">
                <div class="card-header">
                    <h3 class="card-title">Buat Pengembalian Buku Baru</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label>Invoice Peminjaman</label>
                        <select id="invoice_peminjaman" name="Invoice_Peminjaman"
                            class="form-control @error('Invoice_Peminjaman') is-invalid @enderror">
                            <option value="">Pilih Invoice</option>
                            @foreach ($pinjams as $pinjam)
                                <option value="{{ $pinjam->id }}">
                                    {{ $pinjam->Invoice_Peminjaman }}
                                </option>
                            @endforeach
                        </select>
                        @error('Invoice_Peminjaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Tambahkan Tombol Tampilkan Data -->
                    <button type="button" id="tampilkan_data" class="btn btn-info mb-3">
                        Tampilkan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tampilkanDataButton = document.getElementById('tampilkan_data');
            var invoiceSelect = document.getElementById('invoice_peminjaman');

            tampilkanDataButton.addEventListener('click', function() {
                var selectedOption = invoiceSelect.options[invoiceSelect.selectedIndex];
                if (selectedOption.value) {
                    window.location.href = '{{ route("pengembalianbuku.detail", ":id") }}'.replace(':id', selectedOption.value);
                }
            });
        });
    </script>
@endsection
