@extends('layouts.main', ['title' => 'Kembalikan Buku'])

@section('title-content')
    <i class="fas fa-book mr-2"></i>
    Kembalikan Buku
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6 col-lg-8">
            <div class="card card-primary">
                <form method="POST" action="{{ route('pengembalianbuku.store') }}" class="card card-orange card-outline">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Detail Peminjaman</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Invoice Peminjaman</label>
                            <input type="text" id="invoice_peminjaman" class="form-control" name="Invoice_Peminjaman" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" id="nama" class="form-control" name="Nama" readonly>
                        </div>
                        <div class="form-group">
                            <label for="judul_buku">Judul Buku:</label>
                            <input type="text" id="judul_buku" class="form-control" name="Judul_Buku" readonly>
                        </div>
                        <div class="form-group">
                            <label for="qty">Qty:</label>
                            <input type="text" id="qty" class="form-control" name="Qty" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                            <input type="text" id="tanggal_pinjam" class="form-control" name="Tanggal_Pinjam" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kembali">Tanggal Kembali:</label>
                            <input type="date" id="tanggal_kembali" class="form-control" name="Tanggal_Kembali">
                        </div>
                        <div class="form-group">
                            <label for="keterlambatan">Keterlambatan:</label>
                            <input type="text" id="keterlambatan" class="form-control" name="Keterlambatan" readonly>
                        </div>
                        <div class="form-group">
                            <label for="denda">Denda:</label>
                            <input type="text" id="denda" class="form-control" name="Denda" readonly>
                        </div>
                        <div class="card-footer form-inline">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                            <button type="button" class="btn btn-black" onclick="window.location.href='{{ route('pengembalianbuku.index') }}'">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var invoicePeminjamanInput = document.getElementById('invoice_peminjaman');
            var namaInput = document.getElementById('nama');
            var judulBukuInput = document.getElementById('judul_buku');
            var qtyInput = document.getElementById('qty');
            var tanggalPinjamInput = document.getElementById('tanggal_pinjam');
            var tanggalKembaliInput = document.getElementById('tanggal_kembali');
            var keterlambatanInput = document.getElementById('keterlambatan');
            var dendaInput = document.getElementById('denda');

            // Set event listener untuk input tanggal kembali
            tanggalKembaliInput.addEventListener('change', function() {
                var tanggalPinjam = new Date(tanggalPinjamInput.value);
                var tanggalKembali = new Date(tanggalKembaliInput.value);

                // Hitung selisih hari
                var diffTime = Math.abs(tanggalKembali - tanggalPinjam);
                var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                // Hitung keterlambatan
                var keterlambatan = diffDays > 7 ? diffDays - 7 : 0;

                // Hitung denda (1000 per hari keterlambatan)
                var denda = keterlambatan * 1000;

                // Set value pada input form
                keterlambatanInput.value = keterlambatan;
                dendaInput.value = denda;
            });

            // Ambil data dari tabel untuk ditampilkan di form
            var invoicePeminjaman = '{{ $pinjam->Invoice_Peminjaman }}';
            var nama = '{{ $pinjam->Nama }}';
            var judulBuku = '{{ $pinjam->Judul_Buku }}';
            var qty = '{{ $pinjam->Qty }}';
            var tanggalPinjam = '{{ $pinjam->Tanggal_Pinjam }}';

            // Set value pada input form
            invoicePeminjamanInput.value = invoicePeminjaman;
            namaInput.value = nama;
            judulBukuInput.value = judulBuku;
            qtyInput.value = qty;
            tanggalPinjamInput.value = tanggalPinjam;
        });
    </script>
@endsection
