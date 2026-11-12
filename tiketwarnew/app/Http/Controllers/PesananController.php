<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Pesanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PesananController extends Controller
{
    // Menampilkan daftar pesanan
    public function index(): View
    {
        $daftarPesanan = Pesanan::with('konser')
            ->latest()
            ->get();

        return view('pesanan', compact('daftarPesanan'));
    }

    // Menampilkan form pemesanan tiket
    public function create(Konser $konser): View
    {
        return view('pesanan-create', compact('konser'));
    }

    // Menyimpan pesanan baru
    public function store(Request $request, Konser $konser): RedirectResponse
    {
        $data = $request->validate([
            'nama_pemesan' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'jumlah' => ['required', 'integer', 'min:1'],
        ]);

        DB::transaction(function () use ($konser, $data) {

            // Mengunci data konser agar stok tetap konsisten
            $terkunci = Konser::lockForUpdate()
                ->findOrFail($konser->id);

            // Memeriksa ketersediaan tiket
            if ($data['jumlah'] > $terkunci->sisa) {
                throw ValidationException::withMessages([
                    'jumlah' => 'Sisa tiket hanya ' . $terkunci->sisa . '.',
                ]);
            }

            // Membuat pesanan
            Pesanan::create([
                'konser_id' => $terkunci->id,
                'nama_pemesan' => $data['nama_pemesan'],
                'email' => $data['email'],
                'jumlah' => $data['jumlah'],
                'harga_satuan' => $terkunci->harga,
                'total' => $terkunci->harga * $data['jumlah'],
                'status' => Pesanan::MENUNGGU_BAYAR,
            ]);

            // Mengurangi stok tiket
            $terkunci->decrement('sisa', $data['jumlah']);
        });

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil dibuat. Status: menunggu bayar.');
    }

    // Mengubah status pesanan menjadi lunas
    public function bayar(Pesanan $pesanan): RedirectResponse
    {
        $berhasil = DB::transaction(function () use ($pesanan) {

            $terkunci = Pesanan::lockForUpdate()
                ->findOrFail($pesanan->id);

            if ($terkunci->status !== Pesanan::MENUNGGU_BAYAR) {
                return false;
            }

            $terkunci->update([
                'status' => Pesanan::LUNAS,
            ]);

            return true;
        });

        if (!$berhasil) {
            return redirect()->route('pesanan.index')
                ->with('error', 'Hanya pesanan menunggu bayar yang bisa dibayar.');
        }

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan ditandai lunas.');
    }

    // Membatalkan pesanan dan mengembalikan stok tiket
    public function batal(Pesanan $pesanan): RedirectResponse
    {
        $berhasil = DB::transaction(function () use ($pesanan) {

            $terkunci = Pesanan::lockForUpdate()
                ->findOrFail($pesanan->id);

            if ($terkunci->status !== Pesanan::MENUNGGU_BAYAR) {
                return false;
            }

            // Mengembalikan stok tiket konser
            Konser::lockForUpdate()
                ->findOrFail($terkunci->konser_id)
                ->increment('sisa', $terkunci->jumlah);

            // Mengubah status pesanan menjadi batal
            $terkunci->update([
                'status' => Pesanan::BATAL,
            ]);

            return true;
        });

        if (!$berhasil) {
            return redirect()->route('pesanan.index')
                ->with('error', 'Hanya pesanan menunggu bayar yang bisa dibatalkan.');
        }

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan dibatalkan dan stok dikembalikan.');
    }
}
