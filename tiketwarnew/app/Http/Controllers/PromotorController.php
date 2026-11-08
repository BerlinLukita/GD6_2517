<?php

namespace App\Http\Controllers;

use App\Models\Promotor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromotorController extends Controller
{
    public function index(): View
    {
        $daftarPromotor = Promotor::withCount('konsers')
            ->orderBy('nama')
            ->get();

        return view('promotor', compact('daftarPromotor'));
    }

    public function create(): View
    {
        return view('promotor-create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama'   => ['required', 'string', 'max:255'],
            'kontak' => ['required', 'string', 'max:255'],
        ]);

        Promotor::create($data);

        return redirect()->route('promotor.index')
            ->with('success', 'Promotor berhasil ditambahkan.');
    }

    public function edit($id): View
    {
        $promotor = Promotor::findOrFail($id);

        return view('promotor-edit', compact('promotor'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $promotor = Promotor::findOrFail($id);

        $data = $request->validate([
            'nama'   => ['required', 'string', 'max:255'],
            'kontak' => ['required', 'string', 'max:255'],
        ]);

        $promotor->update($data);

        return redirect()->route('promotor.index')
            ->with('success', 'Promotor berhasil diubah.');
    }

    public function destroy($id): RedirectResponse
    {
        $promotor = Promotor::findOrFail($id);

        if ($promotor->konsers()->exists()) {
            return redirect()->route('promotor.index')
                ->with('error', 'Promotor masih punya konser, tidak bisa dihapus.');
        }

        $promotor->delete();

        return redirect()->route('promotor.index')
            ->with('success', 'Promotor berhasil dihapus.');
    }
}
