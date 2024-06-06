<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pengembalian Buku</title>
    <style>
        /* CSS styling untuk invoice */
        body {
            font-family: Arial, sans-serif;
        }

        @page {
            size: landscape;
        }

        .invoice-container {
            width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h2 {
            margin-bottom: 5px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details p {
            margin: 5px 0;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .invoice-total {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h2>Invoice Pengembalian Buku</h2>
            <p>Tanggal: {{ date('Y-m-d') }}</p>
        </div>
        <div class="invoice-details">
            <p><strong>Invoice Peminjaman:</strong> {{ $pengembalianBuku->Invoice_Peminjaman }}</p>
            <p><strong>Nama:</strong> {{ $pengembalianBuku->Nama }}</p>
            <p><strong>Judul Buku:</strong> {{ $pengembalianBuku->Judul_Buku }}</p>
            <p><strong>Qty:</strong> {{ $pengembalianBuku->Qty }}</p>
            <p><strong>Tanggal Pinjam:</strong> {{ $pengembalianBuku->Tanggal_Pinjam }}</p>
            <p><strong>Tanggal Kembali:</strong> {{ $pengembalianBuku->Tanggal_Kembali }}</p>
            <p><strong>Keterlambatan:</strong> {{ $pengembalianBuku->Keterlambatan }}</p>
            <p><strong>Denda:</strong> {{ $pengembalianBuku->Denda }}</p>
        </div>
        <table class="invoice-table">
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $pengembalianBuku->Invoice_Peminjaman }}</td>
                    <td>{{ $pengembalianBuku->Nama }}</td>
                    <td>{{ $pengembalianBuku->Judul_Buku }}</td>
                    <td>{{ $pengembalianBuku->Qty }}</td>
                    <td>{{ $pengembalianBuku->Tanggal_Pinjam }}</td>
                    <td>{{ $pengembalianBuku->Tanggal_Kembali }}</td>
                    <td>{{ $pengembalianBuku->Keterlambatan }}</td>
                    <td>{{ $pengembalianBuku->Denda }}</td>
                </tr>
            </tbody>
        </table>
        <div class="invoice-total">
            <p><strong>Total Denda:</strong> {{ $pengembalianBuku->Denda }}</p>
        </div>
    </div>
</body>

</html>
