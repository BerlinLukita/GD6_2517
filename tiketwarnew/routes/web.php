
<?php

use Illuminate\Support\Facades\Route;

$daftarKonser = [
    1 => [
        'nama' => 'Coldplay - Music of the Spheres',
        'kota' => 'Jakarta',
        'harga' => 1500000,
        'sisa' => 25,
        'tanggal' => '2027-03-15'
    ],
    2 => [
        'nama' => 'NCT Dream - The Dream Show',
        'kota' => 'Jakarta',
        'harga' => 1200000,
        'sisa' => 0,
        'tanggal' => '2027-04-20'
    ],
    3 => [
        'nama' => 'Dewa 19 - Pesta Rakyat',
        'kota' => 'Yogyakarta',
        'harga' => 450000,
        'sisa' => 120,
        'tanggal' => '2027-05-10'
    ],
    4 => [
        'nama' => 'Sheila On 7 - Tunggu Aku Di',
        'kota' => 'Surabaya',
        'harga' => 750000,
        'sisa' => 8,
        'tanggal' => '2027-06-15'
    ],
    5 => [
        'nama' => 'Hindia - Lagipula Hidup Akan Berakhir',
        'kota' => 'Bandung',
        'harga' => 500000,
        'sisa' => 50,
        'tanggal' => '2027-07-25'
    ],
];

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/konser', function () use ($daftarKonser) {
    return view('konser', compact('daftarKonser'));
})->name('konser.index');


Route::get('/konser/kota/{kota}', function ($kota) use ($daftarKonser) {

    $kota = ucfirst(strtolower($kota));

    $hasil = collect($daftarKonser)->where('kota', $kota);

    return view('konser', [
        'daftarKonser' => $hasil,
        'judul' => 'Konser di ' . $kota
    ]);

})->whereAlpha('kota')->name('konser.kota');


Route::get('/konser/{id}', function ($id) use ($daftarKonser) {
    abort_unless(isset($daftarKonser[$id]), 404);

    return view('konser-detail', [
        'id' => $id,
        'konser' => $daftarKonser[$id],
    ]);
})->whereNumber('id')->name('konser.detail');

Route::view('/tentang', 'about')->name('tentang');
