## Catatan artisan serve dan composer run dev

Modul ini cukup memakai php artisan serve karena tidak memerlukan proses build frontend.

## Versi Tools

- PHP: 8.2.12
- Composer: 2.8.12
- Laravel Installer: 5.20.0

## Cara Menjalankan Proyek TiketWar

1.Nyalakan Apache dan MySQL melalui XAMPP.

2.Buat database tiketwarnew2 melalui phpMyAdmin.

3.Dari folder repository, masuk ke folder proyek Laravel dengan perintah cd tiketwarnew.

4.Install dependensi Composer dengan perintah composer install.

5.Salin file .env.example menjadi .env menggunakan perintah copy .env.example .env pada Windows.

6.Atur konfigurasi database pada file .env sesuai database lokal.

7.Jalankan perintah php artisan key:generate.

8.Jalankan migration dan seeder menggunakan php artisan migrate:fresh --seed untuk membuat tabel dan mengisi data awal.

9.Jalankan aplikasi dengan php artisan serve.

10.Buka alamat http://127.0.0.1:8000 melalui browser.

## Latihan Debugging Modul 8

1.Latihan Debugging : PHP Lama Masih Terpakai

Penyebab: PHP yang digunakan terminal masih mengarah ke versi lama karena urutan PATH di Windows memprioritaskan folder PHP lama.

Solusi:

- Jalankan where php untuk melihat lokasi PHP yang digunakan.

- Atur Environment Variables (PATH) agar folder PHP versi baru berada di urutan paling atas.

- Tutup dan buka kembali terminal.

- Jalankan php -v untuk memastikan versi PHP sudah berubah.

2.Latihan Debugging: artisan Tidak Ditemukan

Penyebab: Perintah dijalankan bukan dari folder utama project Laravel, sehingga file artisan tidak ditemukan.

Solusi: Masuk ke folder project terlebih dahulu dengan cd tiketwar, lalu jalankan php artisan serve.

3.Latihan Debugging: composer run dev Menampilkan Error

Penyebab: Perintah composer run dev menjalankan Vite yang membutuhkan dependensi Node.js, tetapi npm install belum dijalankan.

Solusi: Cukup jalankan php artisan serve karena belum membutuhkan Vite. Jika memang ingin menggunakan Vite, jalankan npm install terlebih dahulu.

4.Latihan Debugging: Ribuan File Muncul di Git

Penyebab: Folder /vendor berisi ribuan file dependensi Composer. Karena baris /vendor di .gitignore dihapus, Git menganggap file tersebut sebagai file baru yang perlu dilacak.

Solusi:
- Tambahkan kembali /vendor ke file .gitignore.
- Jika sudah terlanjur dilacak Git, jalankan git rm -r --cached vendor.
- Jalankan git status untuk memastikan folder vendor tidak lagi muncul sebagai file baru.

5.Latihan Debugging: Tanda Titik Koma

Penyebab: Kurang tanda titik koma (;) setelah perintah return, sehingga menyebabkan syntax error pada PHP.

Solusi: Tambahkan titik koma di akhir baris:

Route::get('/halo', function () {
    return 'Halo, selamat datang di TiketWar!';
});

6.Latihan Debugging: Variabel Tidak Terdefinisi

Penyebab: Variabel $id belum didefinisikan di dalam function karena parameter {id} dari URL belum diteruskan ke function.

Solusi: Tambahkan $id sebagai parameter function:
Route::get('/konser/{id}', function ($id) {
    return 'Detail konser nomor ' . $id;
});

7.Latihan Debugging: View Tidak Ditemukan

Penyebab: Laravel menggunakan Blade sebagai template engine. File view seharusnya menggunakan ekstensi .blade.php, bukan hanya .php.

Solusi: Ubah nama file konser.php menjadi konser.blade.php dan simpan di folder resources/views/.

8.Latihan Debugging: Variabel Tidak Terkirim

Penyebab: Variabel $daftarKonser belum didefinisikan sebelum dipanggil menggunakan compact(), sehingga Laravel tidak menemukan variabel tersebut.

Solusi: Definisikan variabel $daftarKonser terlebih dahulu sebelum mengirimkannya ke view.

9.Latihan Debugging: Penutup yang Lupa

Penyebab: Direktif Blade @if belum ditutup dengan @endif, sehingga menyebabkan error saat halaman dibuka.

Solusi: Tambahkan @endif di bagian akhir kode.
@if ($konser['sisa'] > 0)
    <span class="badge bg-success">Tersedia</span>
@else
    <span class="badge bg-danger">Sold Out</span>
@endif

10.Latihan Debugging: Layout Tidak Ditemukan

Penyebab: Nama folder tidak sesuai dengan yang dipanggil pada @extends('layouts.main'). Laravel mencari folder layouts, tetapi file berada di folder layout.

Solusi: Ubah nama folder layout menjadi layouts agar sesuai dengan pemanggilan pada Blade.

Struktur yang benar:
resources/
└── views/
    └── layouts/
        └── main.blade.php

11.Latihan Debugging: Route Tidak Terdefinisi

Penyebab: Route /tentang belum diberi nama, sehingga Laravel tidak mengenali nama route tentang saat dipanggil menggunakan route('tentang').

Solusi: Tambahkan ->name('tentang') pada route.
Route::view('/tentang', 'about')->name('tentang');

12.Latihan Debugging: Kunci Array Tidak Ada

Penyebab: Route tidak memeriksa apakah $id tersedia di dalam array $daftarKonser sebelum mengakses datanya.

Solusi: Tambahkan isset() dan abort_unless() untuk menampilkan halaman 404 jika ID tidak ditemukan.
Route::get('/konser/{id}', function ($id) use ($daftarKonser) {
    abort_unless(isset($daftarKonser[$id]), 404);

    return view('konser-detail', [
        'id' => $id,
        'konser' => $daftarKonser[$id]
    ]);
});

13.Latihan Debugging: CSS Hilang di Halaman Detail

Penyebab: Path CSS menggunakan alamat relatif (css/style.css). Saat dibuka melalui /konser/1, browser mencari file CSS di lokasi yang salah.

Solusi: Gunakan helper asset() Laravel agar path CSS selalu mengarah ke folder public.
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

## Latihan Debugging Modul 9

1. Lathan Debugging : Koneksi Ditolak

   Penyebab: MySQL belum berjalan atau konfigurasi koneksi database pada file `.env` tidak sesuai, misalnya DB_HOST atau DB_PORT salah.

   Solusi: Pastikan MySQL di XAMPP sudah berjalan. Periksa konfigurasi DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, dan DB_PASSWORD pada file `.env`.

2. Lathan Debugging : Model Belum Punya $fillable

   Penyebab: Model belum memiliki properti `$fillable`, sehingga Laravel menolak proses mass assignment dan menghasilkan MassAssignmentException.

   Solusi: Tambahkan properti `$fillable` pada model Konser dengan mendaftarkan kolom yang boleh diisi. Jika `$fillable` sudah ada tetapi kolom `tanggal` tidak didaftarkan, kolom tersebut akan diabaikan oleh Laravel.

3. Lathan Debugging : 419 Page Expired

   Penyebab: Form menggunakan metode POST tetapi tidak menyertakan token CSRF.

   Solusi: Tambahkan direktif `@csrf` di dalam form agar Laravel dapat memverifikasi permintaan yang dikirim.

4. Lathan Debugging : 405 Method Not Allowed

   Penyebab: Form mengirim metode POST, sedangkan route update menggunakan metode PUT.

   Solusi: Tambahkan `@method('PUT')` setelah `@csrf` di dalam form agar Laravel mengenali permintaan sebagai PUT.


## Latihan Debugging – Modul 10: Transaksi Pesanan

### 1. Debugging 1 – Total dari Form

**Kesalahan:**

Kesalahannya adalah mengambil nilai `total` dari input form menggunakan `$request->total`. Nilai tersebut berasal dari browser sehingga pengguna dapat mengubahnya sendiri melalui Developer Tools (F12), meskipun input menggunakan tipe `hidden`.

**Mengapa berbahaya:**

Pengguna dapat memanipulasi nilai total pembayaran. Contohnya, harga tiket sebenarnya Rp1.500.000, tetapi pengguna mengubah nilai total menjadi Rp1. Dengan demikian, sistem dapat menyimpan total pembayaran yang tidak sesuai dengan harga sebenarnya.

**Perbaikan:**

Nilai total harus dihitung langsung di sisi server berdasarkan harga konser dan jumlah tiket yang dipesan. Jangan mengambil nilai total dari input pengguna.

Contoh perbaikan:

```php
Pesanan::create([
    'konser_id' => $terkunci->id,
    'nama_pemesan' => $data['nama_pemesan'],
    'email' => $data['email'],
    'jumlah' => $data['jumlah'],
    'harga_satuan' => $terkunci->harga,
    'total' => $terkunci->harga * $data['jumlah'],
    'status' => Pesanan::MENUNGGU_BAYAR,
]);
```

Dengan cara ini, total pembayaran selalu dihitung oleh server berdasarkan harga tiket yang berlaku dan jumlah tiket yang dipesan.

### 2. Debugging 2 – Pengecekan Stok Tanpa Kunci

**Kesalahan:**

Kesalahannya adalah melakukan pengecekan stok menggunakan `$konser->sisa` tanpa mengunci baris data konser terlebih dahulu. Pengecekan dan pengurangan stok juga tidak dilindungi dengan transaksi database.

**Mengapa berbahaya:**

Kesalahan ini dapat menyebabkan *overselling*, yaitu tiket terjual melebihi stok yang tersedia.

Contohnya, stok tiket hanya tersisa 1. Dua pembeli melakukan pemesanan hampir bersamaan. Keduanya dapat membaca stok yang sama, yaitu 1, sehingga keduanya lolos pengecekan dan berhasil membuat pesanan. Akibatnya, satu tiket dapat terjual kepada dua pembeli.

**Perbaikan:**

Gunakan `DB::transaction()` untuk memastikan seluruh proses pemesanan berhasil atau dibatalkan bersama-sama. Gunakan `lockForUpdate()` sebelum membaca dan mengecek stok agar pembeli lain harus menunggu sampai transaksi pertama selesai.

Contoh perbaikan:

```php
$berhasil = DB::transaction(function () use ($konser, $data) {
    $terkunci = Konser::lockForUpdate()->findOrFail($konser->id);

    if ($data['jumlah'] > $terkunci->sisa) {
        throw ValidationException::withMessages([
            'jumlah' => 'Sisa tiket hanya ' . $terkunci->sisa . '.',
        ]);
    }

    Pesanan::create([
        'konser_id' => $terkunci->id,
        'nama_pemesan' => $data['nama_pemesan'],
        'email' => $data['email'],
        'jumlah' => $data['jumlah'],
        'harga_satuan' => $terkunci->harga,
        'total' => $terkunci->harga * $data['jumlah'],
        'status' => Pesanan::MENUNGGU_BAYAR,
    ]);

    $terkunci->decrement('sisa', $data['jumlah']);

    return true;
});
```

Dengan menggunakan transaksi database dan `lockForUpdate()`, pengecekan stok, pembuatan pesanan, serta pengurangan stok dilakukan secara aman. Jika terjadi kesalahan, perubahan dalam transaksi akan dibatalkan (*rollback*).

---





   ## Jawaban Pertanyaan Seeder

    Jumlah data tetap 3 promotor dan 5 konser karena perintah php artisan migrate:fresh --seed akan menghapus seluruh tabel terlebih dahulu, menjalankan ulang semua migration, kemudian menjalankan DatabaseSeeder.

    DatabaseSeeder memasukkan data yang sama setiap kali dijalankan, yaitu 3 promotor dan 5 konser. Oleh karena itu, data tidak bertambah menjadi dua kali lipat karena data sebelumnya sudah dihapus sebelum proses seeding dilakukan.

