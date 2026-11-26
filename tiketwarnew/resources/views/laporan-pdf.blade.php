<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pesanan TiketWar</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #222;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 4px;
        }

        p {
            margin: 2px 0 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #999;
            padding: 5px 6px;
            text-align: left;
        }

        th {
            background: #e5e7eb;
        }

        .kanan {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Laporan Pesanan TiketWar</h1>

    <p>Dicetak: {{ now()->format('d-m-Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pemesan</th>
                <th>Konser</th>
                <th class="kanan">Jumlah</th>
                <th class="kanan">Total</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($daftarPesanan as $pesanan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pesanan->created_at->format('d-m-Y') }}</td>
                    <td>{{ $pesanan->nama_pemesan }}</td>
                    <td>{{ $pesanan->konser->nama }}</td>
                    <td class="kanan">{{ $pesanan->jumlah }}</td>
                    <td class="kanan">
                        Rp{{ number_format($pesanan->total, 0, ',', '.') }}
                    </td>
                    <td>{{ str_replace('_', ' ', $pesanan->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Tidak ada pesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p style="margin-top: 12px;">
        <strong>Pendapatan (pesanan lunas pada daftar ini):</strong><br>
        Rp{{ number_format($pendapatan, 0, ',', '.') }}
    </p>
</body>
</html>
