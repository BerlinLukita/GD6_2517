@extends('layouts.main')

@section('title', 'Daftar Promotor')

@section('content')
<h1 class="mb-3">Daftar Promotor</h1>

<a href="{{ route('promotor.create') }}"
   class="btn btn-primary mb-3">Tambah Promotor</a>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Nama Promotor</th>
            <th>Kontak</th>
            <th>Jumlah Konser</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftarPromotor as $promotor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $promotor->nama }}</td>
                <td>{{ $promotor->kontak }}</td>
                <td>{{ $promotor->konsers_count }}</td>
                <td>
                    <a href="{{ route('promotor.edit', ['id' => $promotor->id]) }}"
                       class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('promotor.destroy', ['id' => $promotor->id]) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Hapus promotor ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    Belum ada data promotor.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
