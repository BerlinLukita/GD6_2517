## Catatan artisan serve dan composer run dev

Modul ini cukup memakai php artisan serve karena tidak memerlukan proses build frontend.

## Versi Tools

- PHP: 8.2.12
- Composer: 2.8.12
- Laravel Installer: 5.20.0

## Latihan Debugging

1. Latihan Debugging : PHP Lama Masih Terpakai

Penyebab: PHP yang digunakan terminal masih mengarah ke versi lama karena urutan PATH di Windows memprioritaskan folder PHP lama.

Solusi:

- Jalankan where php untuk melihat lokasi PHP yang digunakan.

- Atur Environment Variables (PATH) agar folder PHP versi baru berada di urutan paling atas.

- Tutup dan buka kembali terminal.

- Jalankan php -v untuk memastikan versi PHP sudah berubah.

2. Latihan Debugging: artisan Tidak Ditemukan

Penyebab: Perintah dijalankan bukan dari folder utama project Laravel, sehingga file artisan tidak ditemukan.

Solusi: Masuk ke folder project terlebih dahulu dengan cd tiketwar, lalu jalankan php artisan serve.

3. Latihan Debugging: composer run dev Menampilkan Error

Penyebab: Perintah composer run dev menjalankan Vite yang membutuhkan dependensi Node.js, tetapi npm install belum dijalankan.

Solusi: Cukup jalankan php artisan serve karena belum membutuhkan Vite. Jika memang ingin menggunakan Vite, jalankan npm install terlebih dahulu.

4. Latihan Debugging: Ribuan File Muncul di Git

Penyebab: Folder /vendor berisi ribuan file dependensi Composer. Karena baris /vendor di .gitignore dihapus, Git menganggap file tersebut sebagai file baru yang perlu dilacak.

Solusi:
- Tambahkan kembali /vendor ke file .gitignore.
- Jika sudah terlanjur dilacak Git, jalankan git rm -r --cached vendor.
- Jalankan git status untuk memastikan folder vendor tidak lagi muncul sebagai file baru.

5. Latihan Debugging: Tanda Titik Koma

Penyebab: Kurang tanda titik koma (;) setelah perintah return, sehingga menyebabkan syntax error pada PHP.

Solusi: Tambahkan titik koma di akhir baris:

Route::get('/halo', function () {
    return 'Halo, selamat datang di TiketWar!';
});

6. Latihan Debugging: Variabel Tidak Terdefinisi

Penyebab: Variabel $id belum didefinisikan di dalam function karena parameter {id} dari URL belum diteruskan ke function.

Solusi: Tambahkan $id sebagai parameter function:
Route::get('/konser/{id}', function ($id) {
    return 'Detail konser nomor ' . $id;
});

7. Latihan Debugging: View Tidak Ditemukan

Penyebab: Laravel menggunakan Blade sebagai template engine. File view seharusnya menggunakan ekstensi .blade.php, bukan hanya .php.

Solusi: Ubah nama file konser.php menjadi konser.blade.php dan simpan di folder resources/views/.

8. Latihan Debugging: Variabel Tidak Terkirim

Penyebab: Variabel $daftarKonser belum didefinisikan sebelum dipanggil menggunakan compact(), sehingga Laravel tidak menemukan variabel tersebut.

Solusi: Definisikan variabel $daftarKonser terlebih dahulu sebelum mengirimkannya ke view.

9. Latihan Debugging: Penutup yang Lupa

Penyebab: Direktif Blade @if belum ditutup dengan @endif, sehingga menyebabkan error saat halaman dibuka.

Solusi: Tambahkan @endif di bagian akhir kode.
@if ($konser['sisa'] > 0)
    <span class="badge bg-success">Tersedia</span>
@else
    <span class="badge bg-danger">Sold Out</span>
@endif

10. Latihan Debugging: Layout Tidak Ditemukan

Penyebab: Nama folder tidak sesuai dengan yang dipanggil pada @extends('layouts.main'). Laravel mencari folder layouts, tetapi file berada di folder layout.

Solusi: Ubah nama folder layout menjadi layouts agar sesuai dengan pemanggilan pada Blade.

Struktur yang benar:
resources/
└── views/
    └── layouts/
        └── main.blade.php

11. Latihan Debugging: Route Tidak Terdefinisi

Penyebab: Route /tentang belum diberi nama, sehingga Laravel tidak mengenali nama route tentang saat dipanggil menggunakan route('tentang').

Solusi: Tambahkan ->name('tentang') pada route.
Route::view('/tentang', 'about')->name('tentang');

12. Latihan Debugging: Kunci Array Tidak Ada

Penyebab: Route tidak memeriksa apakah $id tersedia di dalam array $daftarKonser sebelum mengakses datanya.

Solusi: Tambahkan isset() dan abort_unless() untuk menampilkan halaman 404 jika ID tidak ditemukan.
Route::get('/konser/{id}', function ($id) use ($daftarKonser) {
    abort_unless(isset($daftarKonser[$id]), 404);

    return view('konser-detail', [
        'id' => $id,
        'konser' => $daftarKonser[$id]
    ]);
});

13. Latihan Debugging: CSS Hilang di Halaman Detail

Penyebab: Path CSS menggunakan alamat relatif (css/style.css). Saat dibuka melalui /konser/1, browser mencari file CSS di lokasi yang salah.

Solusi: Gunakan helper asset() Laravel agar path CSS selalu mengarah ke folder public.
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
