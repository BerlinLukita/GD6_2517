
@extends('layouts.main')

@section('title', 'Daftar Konser')

@section('content')

    <h1 class="mb-3">{{ $judul ?? 'Daftar Konser' }}</h1>

    <div class="mb-3">
        <a href="{{ route('konser.index') }}" class="btn btn-primary btn-sm">
            Semua Konser
    </a>

    <a href="{{ route('konser.kota', ['kota' => 'Jakarta']) }}"
        class="btn btn-outline-primary btn-sm">
        Jakarta
    </a>

    <a href="{{ route('konser.kota', ['kota' => 'Yogyakarta']) }}"
       class="btn btn-outline-primary btn-sm">
        Yogyakarta
    </a>
</div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Konser</th>
                <th>Kota</th>
                <th>Harga</th>
                <th>Sisa</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($daftarKonser as $id => $konser)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td class="{{ $konser['sisa'] == 0 ? 'sold-out' : '' }}">
                        {{ $konser['nama'] }}
                    </td>

                    <td>{{ $konser['kota'] }}</td>

                    <td>
                        Rp{{ number_format($konser['harga'], 0, ',', '.') }}
                    </td>

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

                    <td>
                        {{ date('d-m-Y', strtotime($konser['tanggal'])) }}
                    </td>

                    <td>
                        <a href="{{ route('konser.detail', ['id' => $id]) }}"
                           class="btn btn-sm btn-primary">
                            Detail
                        </a>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="8" class="text-center">
                        Belum ada konser.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
