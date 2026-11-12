@extends('layouts.main')

@section('title', 'Daftar Pesanan')

@section('content')
<h1 class="mb-3">Daftar Pesanan</h1>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Pemesan</th>
            <th>Konser</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($daftarPesanan as $pesanan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pesanan->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    {{ $pesanan->nama_pemesan }}<br>
                    <small class="text-muted">{{ $pesanan->email }}</small>
                </td>
                <td>{{ $pesanan->konser->nama }}</td>
                <td>{{ $pesanan->jumlah }}</td>
                <td>Rp{{ number_format($pesanan->total, 0, ',', '.') }}</td>
                <td>
                    @include('partials.badge-status', ['status' => $pesanan->status])
                </td>
                <td>
                    @if ($pesanan->status === 'menunggu_bayar')
                        <form action="{{ route('pesanan.bayar', $pesanan) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                    class="btn btn-sm btn-success">Bayar</button>
                        </form>

                        <form action="{{ route('pesanan.batal', $pesanan) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Batalkan pesanan ini?')">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger">Batal</button>
                        </form>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Belum ada pesanan.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
