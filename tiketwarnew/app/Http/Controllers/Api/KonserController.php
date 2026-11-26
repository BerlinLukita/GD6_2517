<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KonserResource;
use App\Models\Konser;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class KonserController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $daftarKonser = Konser::with('promotor')->orderBy('tanggal')->get();

        return KonserResource::collection($daftarKonser);
    }

    public function show(Konser $konser): KonserResource
    {
        return new KonserResource($konser->load('promotor'));
    }
}