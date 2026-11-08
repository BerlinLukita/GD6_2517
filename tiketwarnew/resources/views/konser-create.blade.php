@extends('layouts.main')

@section('title', 'Tambah Konser')

@section('content')
<h1 class="mb-3">Tambah Konser</h1>

<form action="{{ route('konser.store') }}" method="POST">
    @csrf
    @include('partials.konser-fields')

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('konser.index') }}" class="btn btn-outline-secondary">Batal</a>
</form>
@endsection
