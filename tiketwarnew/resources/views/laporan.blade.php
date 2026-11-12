@extends('layouts.main')

@section('title', 'Laporan Penjualan')

@section('content')
<h1 class="mb-3">Laporan Penjualan</h1>

<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="display-6">{{ $totalPesanan }}</div>
                <div class="text-muted">Total Pesanan</div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="h2 mt-2">Rp{{ number_format($pendapatan, 0, ',', '.') }}</div>
                <div class="text-muted">Pendapatan (Lunas)</div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="display-6">{{ $perStatus->get('menunggu_bayar', 0) }}</div>
                <div class="text-muted">Menunggu Bayar</div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="display-6">{{ $perStatus->get('batal', 0) }}</div>
                <div class="text-muted">Dibatalkan</div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('laporan.index') }}" method="GET"
      class="row g-2 align-items-end mb-3">
    <div class="col-md-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="">-- Semua status --</option>
            <option value="menunggu_bayar"
                @selected(request('status') == 'menunggu_bayar')>
                Menunggu bayar
            </option>
            <option value="lunas"
                @selected(request('status') == 'lunas')>
                Lunas
            </option>
            <option value="batal"
                @selected(request('status') == 'batal')>
                Batal
            </option>
        </select>
    </div>

    <div class="col-md-3">
        <label for="dari" class="form-label">Dari tanggal</label>
        <input type="date" name="dari" id="dari" class="form-control"
               value="{{ request('dari') }}">
    </div>

    <div class="col-md-3">
        <label for="sampai" class="form-label">Sampai tanggal</label>
        <input type="date" name="sampai" id="sampai" class="form-control"
               value="{{ request('sampai') }}">
    </div>

    <div class="col-md-3">
        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="{{ route('laporan.index') }}"
           class="btn btn-outline-secondary">Reset</a>
    </div>
</form>

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
        </tr>
    </thead>
    <tbody>
        @forelse ($daftarPesanan as $pesanan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pesanan->created_at->format('d-m-Y H:i') }}</td>
                <td>{{ $pesanan->nama_pemesan }}</td>
                <td>{{ $pesanan->konser->nama }}</td>
                <td>{{ $pesanan->jumlah }}</td>
                <td>Rp{{ number_format($pesanan->total, 0, ',', '.') }}</td>
                <td>
                    @include('partials.badge-status', ['status' => $pesanan->status])
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada pesanan yang cocok.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
