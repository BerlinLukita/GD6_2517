@extends('layouts.main')

@section('title', 'Beranda')

@section('content')

    {{-- Banner --}}
    <img src="{{ asset('images/banner.jpg') }}"
         class="img-fluid rounded mb-4"
         alt="Banner konser TiketWar">

    {{-- Hero --}}
    <div class="hero text-center mb-4">
        <h1 class="display-5 fw-bold">
            Selamat Datang di TiketWar
        </h1>

        <p class="lead">
            Tempat war tiket konser paling gercep!
        </p>

        <a href="{{ route('konser.index') }}"
           class="btn btn-light btn-lg">
            Lihat Daftar Konser
        </a>
    </div>

    {{-- Summary --}}
    <h2 class="text-center mb-4">Ringkasan TiketWar</h2>

    <div class="row g-4 mb-4">

        {{-- Jumlah Konser --}}
        <div class="col-md-4">
            <div class="card text-bg-primary h-100 shadow-sm">
                <div class="card-body text-center py-4">
                    <h5 class="card-title">Jumlah Konser</h5>
                    <h2 class="display-4 fw-bold">
                        {{ $jumlahKonser }}
                    </h2>
                    <p class="card-text">
                        Total konser yang terdaftar
                    </p>
                </div>
            </div>
        </div>

        {{-- Jumlah Promotor --}}
        <div class="col-md-4">
            <div class="card text-bg-success h-100 shadow-sm">
                <div class="card-body text-center py-4">
                    <h5 class="card-title">Jumlah Promotor</h5>
                    <h2 class="display-4 fw-bold">
                        {{ $jumlahPromotor }}
                    </h2>
                    <p class="card-text">
                        Total promotor yang terdaftar
                    </p>
                </div>
            </div>
        </div>

        {{-- Total Sisa Tiket --}}
        <div class="col-md-4">
            <div class="card text-bg-warning h-100 shadow-sm">
                <div class="card-body text-center py-4">
                    <h5 class="card-title">Total Sisa Tiket</h5>
                    <h2 class="display-4 fw-bold">
                        {{ number_format($totalSisaTiket, 0, ',', '.') }}
                    </h2>
                    <p class="card-text">
                        Total tiket yang masih tersedia
                    </p>
                </div>
            </div>
        </div>

    </div>

@endsection
