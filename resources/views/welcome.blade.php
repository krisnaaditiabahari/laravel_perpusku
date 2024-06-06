@extends('layouts.main', ['title' => 'Beranda'])
@section('title-content')
    <i class="fas fa-home mr-2"></i> Beranda
@endsection

@section('content')
    <div class="row">
        @can('admin')
            <x-box title="Pengembalian Buku" icon="fas fa-user-tie" background="bg-danger" :route="route('pengembalianbuku.index')" :jumlah="$pengembalianbuku->jumlah" />
            <x-box title="Peminjaman Buku" icon="fas fa-list" background="bg-warning" :route="route('pinjam.index')" :jumlah="$pinjam->jumlah" />
            <x-box title="Buku" icon="fas fa-users" background="bg-primary" :route="route('books.index')" :jumlah="$book->jumlah" />
            <x-box title="Pengguna/Anggota" icon="fas fa-box-open" background="bg-success" :route="route('user.index')"
                :jumlah="$user->jumlah" />
        @endcan
    </div>
    <div class="card">
        <div class="card-body">
            <canvas id="myChart"></canvas>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($cart['labels']) ?>,
                datasets: [{
                    label: "{{ $cart['label'] }}",
                    data: <?= json_encode($cart['data']) ?>,
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endpush
