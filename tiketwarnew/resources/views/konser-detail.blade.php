@extends('layouts.main')

@section('title', $konser->nama) {{-- DIUBAH --}}

@section('content')
<a href="{{ route('konser.index') }}"
    class="btn btn-outline-secondary mb-3">&larr; Kembali ke daftar</a>

<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-3">{{ $konser->nama }}</h3> {{-- DIUBAH --}}

        <p class="text-muted mb-1">
            Promotor: {{ $konser->promotor->nama }}
        </p> {{-- BARU --}}

        <p class="text-muted mb-1">
            Kota: {{ $konser->kota }}
        </p>

        <p class="text-muted mb-1">
            Tanggal: {{ date('d-m-Y', strtotime($konser->tanggal)) }}
        </p> {{-- BARU --}}

        <p class="mb-1">
            Harga: Rp{{ number_format($konser->harga, 0, ',', '.') }}
        </p>

        <p>
            Sisa tiket: {{ $konser->sisa }}
        </p>

        @if ($konser->sisa > 0)
            <button class="btn btn-primary">War Tiket Sekarang</button>
        @else
            <button class="btn btn-secondary" disabled>Sold Out</button>
        @endif
    </div>
</div>
@endsection
