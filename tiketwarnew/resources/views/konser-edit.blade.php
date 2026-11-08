@extends('layouts.main')

@section('title', 'Ubah Konser')

@section('content')
<h1 class="mb-3">Ubah Konser</h1>

<form action="{{ route('konser.update', ['id' => $konser->id]) }}" method="POST">
    @csrf
    @method('PUT')
    @include('partials.konser-fields')

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('konser.index') }}" class="btn btn-outline-secondary">Batal</a>
</form>
@endsection
