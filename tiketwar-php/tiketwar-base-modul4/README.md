# TiketWar - Base Code Modul 4 (PHP Fundamental)

Base code ini adalah **hasil akhir proyek TiketWar dari Modul 4** dalam keadaan lengkap dan berjalan.
Gunakan jika proyek TiketWar milikmu di Modul 4 belum selesai atau masih bermasalah, supaya kamu tetap
punya bahan yang sama dengan teman-temanmu untuk Modul 5 (Laravel Fundamental).

## Isi folder

| File | Fungsi | Bab di Modul 4 |
|---|---|---|
| `index.php` | Halaman publik: variabel, array, diskon, status, daftar konser | 5 - 12 |
| `pesan.php` + `prosesPesan.php` | Form pemesanan tiket + upload bukti bayar | 13 - 14 |
| `login.php` + `prosesLogin.php` | Login admin berbasis session | 15 |
| `dashboard.php` | Halaman admin (terlindungi session) | 16 |
| `tambahTiket.php` + `prosesTambah.php` | Admin menambah tiket war | 16 |
| `prosesHapus.php` | Admin menghapus tiket war | 16 |
| `prosesLogout.php` | Mengakhiri session admin | 16 |
| `bukti_bayar/` | Folder tujuan upload bukti bayar | 14 |

## Cara menjalankan

**Opsi A - XAMPP (seperti Modul 4)**

1. Salin seluruh isi folder ini ke folder `tiketwar` di dalam `htdocs`
   (Windows `C:\xampp\htdocs\tiketwar`, macOS `/Applications/XAMPP/xamppfiles/htdocs/tiketwar`, Linux `/opt/lampp/htdocs/tiketwar`).
2. Nyalakan Apache di XAMPP, lalu buka `http://localhost/tiketwar/`.

**Opsi B - Server bawaan PHP (tanpa XAMPP)**

```
cd tiketwar-base-modul4
php -S 127.0.0.1:8080
```

Lalu buka `http://127.0.0.1:8080/`. Tekan `Ctrl+C` di terminal untuk berhenti.

## Alur yang bisa dicoba

1. `index.php` menampilkan tiga konser, harga setelah diskon, status, dan badge.
2. `pesan.php`: isi form dan unggah gambar JPG/PNG. Hasilnya muncul di `prosesPesan.php`, file tersimpan di `bukti_bayar/`.
3. `login.php`: isi username dan password **apa saja** (sengaja tidak diverifikasi, fokusnya mekanisme session).
4. `dashboard.php`: tambah tiket, lihat daftar, hapus tiket, lalu logout.

Daftar tiket di dashboard disimpan di **session**, jadi hilang saat logout. Itu memang bagian dari desain Modul 4.

## Perbedaan kecil dengan yang diajarkan di Modul 4

Base code ini sedikit lebih aman dan rapi dibanding contoh di modul. Alurnya sama, hanya ditambah:

- `htmlspecialchars()` pada data dari pengguna sebelum ditampilkan (mencegah XSS). Di Modul 5 kamu akan lihat Blade melakukan ini otomatis lewat `{{ }}`.
- Pemeriksaan upload di sisi server: ekstensi harus jpg/jpeg/png, isi file harus benar-benar gambar, dan nama file dibuat unik. Atribut `accept` di form hanya penanda di browser dan bisa dilewati. Tanpa pemeriksaan ini, file `.php` yang diunggah ke folder web bisa dijalankan orang lain.
- File `proses*.php` menolak dibuka langsung lewat browser (diarahkan balik), dan halaman admin selalu mengecek session.
- Status tiket di `index.php` memakai `$sisaTiket` dari bab 7 (nilai 25), bukan nilai contoh pada bab 11.
- Tautan navigasi antarhalaman, dan `.gitignore` agar file upload tidak ikut ter-commit.

## Pemakaian di Modul 5

Folder ini dipakai sebagai **bahan pembanding**: halaman daftar konser di `index.php` (variabel, array, `foreach`)
adalah yang kita bangun ulang dengan route dan Blade di Laravel. Lihat bagian 2.2 dan 3.1 pada Modul 5.

## Status pengujian

Seluruh file sudah diperiksa sintaksnya dan dijalankan dengan server bawaan PHP 8.3 (alur pesan, upload,
login, tambah, hapus, logout, serta penolakan upload file PHP). Belum diuji langsung di XAMPP.
