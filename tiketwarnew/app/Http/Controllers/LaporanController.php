<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LaporanController extends Controller
{
    public function index(Request $request): View
    {
        $daftarPesanan = $this->pesananTerfilter($request)->latest()->get();

        $totalPesanan = Pesanan::count();

        $pendapatan = Pesanan::where('status', Pesanan::LUNAS)->sum('total');

        $perStatus = Pesanan::select('status', DB::raw('count(*) as jumlah'))
            ->groupBy('status')
            ->pluck('jumlah', 'status');

        return view('laporan', compact(
            'daftarPesanan', 'totalPesanan', 'pendapatan', 'perStatus'
        ));
    }

    public function pdf(Request $request)
    {
        $daftarPesanan = $this->pesananTerfilter($request)->latest()->get();

        $pendapatan = $daftarPesanan
            ->where('status', Pesanan::LUNAS)
            ->sum('total');

        $pdf = Pdf::loadView('laporan-pdf', compact(
            'daftarPesanan', 'pendapatan'
        ))->setPaper('a4', 'portrait');

        return $pdf->download('laporan-pesanan.pdf');
    }

    private function pesananTerfilter(Request $request): Builder
    {
        return Pesanan::with('konser')
            ->when($request->query('status'), function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($request->query('dari'), function ($query, $dari) {
                $query->whereDate('created_at', '>=', $dari);
            })
            ->when($request->query('sampai'), function ($query, $sampai) {
                $query->whereDate('created_at', '<=', $sampai);
            });
    }
}
