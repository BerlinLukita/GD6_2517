@extends('layouts.main')

@section('title', 'Daftar Konser')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3"> {{-- DIUBAH --}}
<h1 class="mb-3">Daftar Konser</h1>
<a href="{{ route('konser.create') }}" class="btn btn-success">Tambah Konser</a> {{-- BARU --}}
</div>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Konser</th>
            <th>Promotor</th> {{-- BARU --}}
            <th>Kota</th>
            <th>Tanggal</th> {{-- BARU --}}
            <th>Harga</th>
            <th>Sisa</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftarKonser as $konser) {{-- DIUBAH --}}
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="{{ $konser->sisa == 0 ? 'sold-out' : '' }}">{{ $konser->nama }}</td>
                <td>{{ $konser->promotor->nama }}</td> {{-- BARU --}}
                <td>{{ $konser->kota }}</td>
                <td>{{ date('d-m-Y', strtotime($konser->tanggal)) }}</td> {{-- BARU --}}
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
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Belum ada konser.</td> {{-- DIUBAH: 9 --}}
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
