<?php

use Illuminate\Support\Facades\Route;

$daftarKonser = [
 1 => ['nama' => 'Coldplay - Music of the Spheres', 'kota' => 'Jakarta', 'harga' => 1500000,
'sisa' => 25],
 2 => ['nama' => 'NCT Dream - The Dream Show', 'kota' => 'Jakarta', 'harga' => 1200000, 'sisa'
=> 0],
 3 => ['nama' => 'Dewa 19 - Pesta Rakyat', 'kota' => 'Yogyakarta', 'harga' => 450000, 'sisa' =>
120],
];

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo, selamat datang di TiketWar!';
});

Route::get('/ping', function () {
    return ['status' => 'ok', 'aplikasi' => 'TiketWar'];
});

Route::get('/konser/{id}', function ($id) {
    return 'Detail konser nomor ' . $id;
})->whereNumber('id')->name('konser.detail');


Route::get('/tentang', function () {
    return 'Halaman Tentang TiketWar';
})->name('tentang');

Route::get('/info', function () {
    return redirect()->route('tentang');
});

Route::get('/konser', function () use ($daftarKonser) {
    return view('konser', compact('daftarKonser'));
})->name('konser.index');