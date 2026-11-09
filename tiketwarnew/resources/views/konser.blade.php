@extends('layouts.main')

@section('title', 'Daftar Konser')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-3">Daftar Konser</h1>
    <a href="{{ route('konser.create') }}" class="btn btn-success">Tambah Konser</a>
</div>

{{-- Filter Konser berdasarkan Kota --}}
<form action="{{ route('konser.index') }}" method="GET" class="d-flex align-items-center gap-2 mb-3">
    <label for="kota" class="form-label mb-0">Filter Kota:</label>

    <select name="kota" id="kota" class="form-select" style="max-width: 250px;">
        <option value="" @selected(!request('kota'))>Semua kota</option>

        @foreach ($daftarKota as $kota)
            <option value="{{ $kota }}" @selected(request('kota') == $kota)>
                {{ $kota }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Filter</button>

    <a href="{{ route('konser.index') }}" class="btn btn-secondary">Reset</a>
</form>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Konser</th>
            <th>Promotor</th>
            <th>Kota</th>
            <th>Tanggal</th>
            <th>Harga</th>
            <th>Sisa</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($daftarKonser as $konser)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td class="{{ $konser->sisa == 0 ? 'sold-out' : '' }}">
                    {{ $konser->nama }}
                </td>

                <td>{{ $konser->promotor->nama }}</td>

                <td>{{ $konser->kota }}</td>

                <td>{{ date('d-m-Y', strtotime($konser->tanggal)) }}</td>

                <td>Rp{{ number_format($konser->harga, 0, ',', '.') }}</td>

                <td>{{ $konser->sisa }}</td>

                <td>
                    @if ($konser->sisa > 10)
                        <span class="badge bg-success">Tersedia</span>
                    @elseif ($konser->sisa > 0)
                        <span class="badge bg-warning text-dark">Hampir habis</span>
                    @else
                        <span class="badge bg-danger">Sold Out</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('konser.detail', ['id' => $konser->id]) }}"
                       class="btn btn-sm btn-primary">Detail</a>

                    <a href="{{ route('konser.edit', ['id' => $konser->id]) }}"
                       class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('konser.destroy', ['id' => $konser->id]) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Hapus konser ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">
                    Belum ada konser.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
