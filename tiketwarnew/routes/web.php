<?php

use App\Http\Controllers\PesananController;
use App\Http\Controllers\KonserController;
use App\Http\Controllers\PromotorController;
use App\Models\Konser;
use App\Models\Promotor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $jumlahKonser = Konser::count();
    $jumlahPromotor = Promotor::count();
    $totalSisaTiket = Konser::sum('sisa');

    return view('home', compact(
        'jumlahKonser',
        'jumlahPromotor',
        'totalSisaTiket'
    ));
})->name('home');

Route::view('/tentang', 'about')->name('tentang');
Route::view('/kontak', 'kontak')->name('kontak');

Route::get('/konser', [KonserController::class, 'index'])
    ->name('konser.index');

Route::get('/konser/create', [KonserController::class, 'create'])
    ->name('konser.create');

Route::post('/konser', [KonserController::class, 'store'])
    ->name('konser.store');

Route::get('/konser/{id}', [KonserController::class, 'show'])
    ->whereNumber('id')
    ->name('konser.detail');

Route::get('/konser/{id}/edit', [KonserController::class, 'edit'])
    ->whereNumber('id')
    ->name('konser.edit');

Route::put('/konser/{id}', [KonserController::class, 'update'])
    ->whereNumber('id')
    ->name('konser.update');

Route::delete('/konser/{id}', [KonserController::class, 'destroy'])
    ->whereNumber('id')
    ->name('konser.destroy');

// CRUD Promotor
Route::get('/promotor', [PromotorController::class, 'index'])
    ->name('promotor.index');

Route::get('/promotor/create', [PromotorController::class, 'create'])
    ->name('promotor.create');

Route::post('/promotor', [PromotorController::class, 'store'])
    ->name('promotor.store');

Route::get('/promotor/{id}/edit', [PromotorController::class, 'edit'])
    ->whereNumber('id')
    ->name('promotor.edit');

Route::put('/promotor/{id}', [PromotorController::class, 'update'])
    ->whereNumber('id')
    ->name('promotor.update');

Route::delete('/promotor/{id}', [PromotorController::class, 'destroy'])
    ->whereNumber('id')
    ->name('promotor.destroy');
    
Route::get('/konser/{konser}/pesan', [PesananController::class, 'create'])
    ->whereNumber('konser')
    ->name('pesanan.create');

Route::post('/konser/{konser}/pesan', [PesananController::class, 'store'])
    ->whereNumber('konser')
    ->name('pesanan.store');

Route::get('/pesanan', [PesananController::class, 'index'])
    ->name('pesanan.index');

Route::patch('/pesanan/{pesanan}/bayar', [PesananController::class, 'bayar'])
    ->whereNumber('pesanan')
    ->name('pesanan.bayar');

Route::patch('/pesanan/{pesanan}/batal', [PesananController::class, 'batal'])
    ->whereNumber('pesanan')
    ->name('pesanan.batal');