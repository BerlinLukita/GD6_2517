@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <h1 class="display-5 fw-bold">Selamat Datang di TiketWar</h1>
        <p class="lead">Tempat war tiket konser paling gercep!</p>
        <a href="{{ route('konser.index') }}" class="btn btn-primary btn-lg">Lihat Daftar
Konser</a>
    </div>
@endsection