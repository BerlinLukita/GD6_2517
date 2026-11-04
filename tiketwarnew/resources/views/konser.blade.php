<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Konser - TiketWar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-3">Daftar Konser</h1>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Konser</th>
                    <th>Kota</th>
                    <th>Harga</th>
                    <th>Sisa</th>
                    <th>Status</th>
                </tr>
            </thead>
           <tbody>
                @forelse ($daftarKonser as $id => $konser)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $konser['nama'] }}</td>
                        <td>{{ $konser['kota'] }}</td>
                        <td>Rp{{ number_format($konser['harga'], 0, ',', '.') }}</td>
                        <td>{{ $konser['sisa'] }}</td>
                        <td>
                            @if ($konser['sisa'] > 10)
                                <span class="badge bg-success">Tersedia</span>
                            @elseif ($konser['sisa'] > 0)
                                <span class="badge bg-warning text-dark">Hampir habis</span>
                            @else
                                <span class="badge bg-danger">Sold Out</span>
                            @endif
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada konser.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>