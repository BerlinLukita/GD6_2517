<?php

namespace App\Http\Controllers;

use App\Models\Konser;
use Illuminate\View\View;

class KonserController extends Controller
{
    public function index(): View
    {
        $daftarKonser = Konser::with('promotor')
            ->orderBy('tanggal')
            ->get();

        return view('konser', compact('daftarKonser'));
    }

    public function show($id): View
    {
        $konser = Konser::with('promotor')->findOrFail($id);

        return view('konser-detail', compact('konser'));
    }
}
