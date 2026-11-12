@extends('layouts.main')

@section('title', 'Pesan Tiket')

@section('content')
<h1 class="mb-3">Pesan Tiket</h1>

<div class="card mb-4">
    <div class="card-body">
        <h2 class="h5">{{ $konser->nama }}</h2>
        <p class="mb-1">Kota: {{ $konser->kota }}</p>
        <p class="mb-1">Harga per tiket:
            Rp {{ number_format($konser->harga, 0, ',', '.') }}
        </p>
        <p class="mb-0">Sisa tiket: {{ $konser->sisa }}</p>
    </div>
</div>

<form action="{{ route('pesanan.store', $konser) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
        <input type="text" name="nama_pemesan" id="nama_pemesan"
            class="form-control @error('nama_pemesan') is-invalid @enderror"
            value="{{ old('nama_pemesan') }}">
        @error('nama_pemesan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah Tiket</label>
        <input type="number" min="1" name="jumlah" id="jumlah"
            class="form-control @error('jumlah') is-invalid @enderror"
            value="{{ old('jumlah', 1) }}">
        @error('jumlah')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">Total harga dihitung otomatis oleh server.</div>
    </div>

    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    <a href="{{ route('konser.detail', ['id' => $konser->id]) }}"
        class="btn btn-outline-secondary">Batal</a>
</form>
@endsection
