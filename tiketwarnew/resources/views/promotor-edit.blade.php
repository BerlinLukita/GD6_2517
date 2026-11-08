@extends('layouts.main')

@section('title', 'Ubah Promotor')

@section('content')
<h1 class="mb-3">Ubah Promotor</h1>

<form action="{{ route('promotor.update', ['id' => $promotor->id]) }}"
      method="POST">
    @csrf
    @method('PUT')
    @include('partials.promotor-fields')

    <button type="submit" class="btn btn-primary">Perbarui</button>
    <a href="{{ route('promotor.index') }}"
       class="btn btn-outline-secondary">Batal</a>
</form>
@endsection
