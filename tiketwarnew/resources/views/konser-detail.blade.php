@extends('layouts.main')

@section('title', $konser->nama)

@section('content')
<a href="{{ route('konser.index') }}"
   class="btn btn-outline-secondary mb-3">&larr; Kembali ke daftar</a>

<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-3">{{ $konser->nama }}</h3>

        <p class="text-muted mb-1">
            Promotor: {{ $konser->promotor->nama }}
        </p>

        <p class="text-muted mb-1">
            Kota: {{ $konser->kota }}
        </p>

        <p class="text-muted mb-1">
            Tanggal: {{ date('d-m-Y', strtotime($konser->tanggal)) }}
        </p>

        <p class="mb-1">
            Harga: Rp{{ number_format($konser->harga, 0, ',', '.') }}
        </p>

        <p>
            Sisa tiket: {{ $konser->sisa }}
        </p>

        {{-- Menampilkan deskripsi jika tersedia --}}
        @if ($konser->deskripsi)
            <hr>
            <h5>Deskripsi Konser</h5>
            <p>{{ $konser->deskripsi }}</p>
        @endif

        @if($konser->sisa > 0)
        <a href="{{ route('pesanan.create', $konser) }}"
        class="btn btn-primary">War Tiket Sekarang</a>
        @else
        <button class="btn btn-secondary" disabled>Sold Out</button>
        @endif

    </div>
</div>
@endsection
