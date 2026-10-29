<?php
// ============================================================
// TiketWar - index.php (hasil akhir Modul 4, bab 5 sampai 12)
// ============================================================

// Bab 7-8: variabel dasar (penamaan camelCase)
$namaKonser = "Coldplay - Music of the Spheres";
$hargaTiket = 1500000;
$sisaTiket = 25;
$sudahSoldOut = false;
$kategoriTiket = "Festival";

// Bab 9: array konser (associative array di dalam indexed array)
$daftarKonser = [
  [
    "nama" => "Coldplay - Music of the Spheres",
    "tanggal" => "2026-03-15",
    "kategori" => "Festival",
    "harga" => 1500000
  ],
  [
    "nama" => "Dewa 19 Reunion Show",
    "tanggal" => "2026-04-02",
    "kategori" => "VIP",
    "harga" => 2500000
  ],
  [
    "nama" => "NCT Dream World Tour",
    "tanggal" => "2026-05-20",
    "kategori" => "Reguler",
    "harga" => 900000
  ],
];

// Bab 10: operator - hitung diskon 20% untuk konser pertama
$hargaAsli = $daftarKonser[0]["harga"];
$persenDiskon = 20;
$hargaSetelahDiskon = $hargaAsli - ($hargaAsli * $persenDiskon / 100);
$tiketMasihAda = $sisaTiket > 0;

// Bab 11: kondisional - status ketersediaan tiket
if ($sisaTiket > 10) {
  $statusTiket = "Masih Banyak";
} elseif ($sisaTiket > 0) {
  $statusTiket = "Sisa Dikit, Buruan!";
} else {
  $statusTiket = "Sold Out";
}

// Bab 11: switch - badge sesuai kategori konser pertama
$kategori = $daftarKonser[0]["kategori"];
switch ($kategori) {
  case "Festival": $badge = "Festival Pass"; break;
  case "VIP": $badge = "VIP Access"; break;
  case "Reguler": $badge = "Reguler"; break;
  default: $badge = "Kategori tidak dikenali";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>TiketWar</title>
</head>
<body>
  <h1>TiketWar</h1>

  <?php
  echo "Selamat datang di TiketWar - war tiket konser paling gercep!";
  ?>

  <p>
    <a href="pesan.php">Pesan Tiket</a> |
    <a href="login.php">Login Admin</a>
  </p>

  <h2>Konser Pilihan</h2>
  <p>Konser: <?php echo $namaKonser; ?></p>
  <p>Harga: Rp<?php echo number_format($hargaTiket, 0, ",", "."); ?></p>
  <p>Sisa tiket: <?php echo $sisaTiket; ?></p>
  <p>Kategori: <?php echo $kategoriTiket; ?></p>

  <p>Harga asli: Rp<?php echo number_format($hargaAsli, 0, ",", "."); ?></p>
  <p>Setelah diskon <?php echo $persenDiskon; ?>%: Rp<?php echo number_format($hargaSetelahDiskon, 0, ",", "."); ?></p>

  <p>Status: <?php echo $statusTiket; ?></p>
  <p>Badge: <?php echo $badge; ?></p>

  <h2>Daftar Konser War Tiket Minggu Ini</h2>

  <?php foreach ($daftarKonser as $konser) { ?>
    <div style="border: 1px solid #ccc; padding: 12px; margin-bottom: 8px;">
      <h3><?php echo htmlspecialchars($konser["nama"]); ?></h3>
      <p>Tanggal: <?php echo $konser["tanggal"]; ?></p>
      <p>Kategori: <?php echo $konser["kategori"]; ?></p>
      <p>Harga: Rp<?php echo number_format($konser["harga"], 0, ",", "."); ?></p>
    </div>
  <?php } ?>
</body>
</html>
