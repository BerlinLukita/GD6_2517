@extends('layouts.main')

@section('title', 'Tambah Promotor')

@section('content')
<h1 class="mb-3">Tambah Promotor</h1>

<form action="{{ route('promotor.store') }}" method="POST">
    @csrf
    @include('partials.promotor-fields')

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('promotor.index') }}"
       class="btn btn-outline-secondary">Batal</a>
</form>
@endsection
