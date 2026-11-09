<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use App\Models\Promotor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KonserController extends Controller
{
    // Menampilkan daftar konser dan filter berdasarkan kota
    public function index(Request $request): View
    {
        $daftarKonser = Konser::with('promotor')
            ->when(
                $request->query('kota'),
                fn ($query, $kota) => $query->where('kota', $kota)
            )
            ->orderBy('tanggal')
            ->get();

        $daftarKota = Konser::select('kota')
            ->distinct()
            ->orderBy('kota')
            ->pluck('kota');

        return view('konser', compact('daftarKonser', 'daftarKota'));
    }

    // Menampilkan detail konser
    public function show($id): View
    {
        $konser = Konser::with('promotor')->findOrFail($id);

        return view('konser-detail', compact('konser'));
    }

    // Menampilkan form tambah
    public function create(): View
    {
        $daftarPromotor = Promotor::orderBy('nama')->get();

        return view('konser-create', compact('daftarPromotor'));
    }

    // Menyimpan data dari form
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'promotor_id' => ['required', 'exists:promotors,id'],
            'nama'        => ['required', 'string', 'max:255'],
            'kota'        => ['required', 'string', 'max:100'],
            'harga'       => ['required', 'integer', 'min:0'],
            'sisa'        => ['required', 'integer', 'min:0'],
            'tanggal'     => ['required', 'date'],
        ]);

        Konser::create($data);

        return redirect()->route('konser.index')
            ->with('success', 'Konser berhasil ditambahkan.');
    }

    // Menampilkan form ubah
    public function edit($id): View
    {
        $konser = Konser::findOrFail($id);
        $daftarPromotor = Promotor::orderBy('nama')->get();

        return view('konser-edit', compact('konser', 'daftarPromotor'));
    }

    // Menyimpan perubahan
    public function update(Request $request, $id): RedirectResponse
    {
        $konser = Konser::findOrFail($id);

        $data = $request->validate([
            'promotor_id' => ['required', 'exists:promotors,id'],
            'nama'        => ['required', 'string', 'max:255'],
            'kota'        => ['required', 'string', 'max:100'],
            'harga'       => ['required', 'integer', 'min:0'],
            'sisa'        => ['required', 'integer', 'min:0'],
            'tanggal'     => ['required', 'date'],
        ]);

        $konser->update($data);

        return redirect()->route('konser.index')
            ->with('success', 'Konser berhasil diubah.');
    }

    // Menghapus konser
    public function destroy($id): RedirectResponse
    {
        $konser = Konser::findOrFail($id);
        $konser->delete();

        return redirect()->route('konser.index')
            ->with('success', 'Konser berhasil dihapus.');
    }
}
