<?php
// Halaman ini hanya boleh dibuka lewat form (POST), bukan diketik langsung di browser
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: pesan.php");
  exit;
}

// Bab 13: membaca data teks dari form
// (tanda ?? artinya: pakai nilai setelahnya kalau key-nya tidak ada)
$nama = $_POST["namaPembeli"] ?? "";
$konser = $_POST["pilihKonser"] ?? "";
$jumlah = (int) ($_POST["jumlahTiket"] ?? 0);

// Bab 14: proses upload bukti pembayaran
$folderTujuan = "bukti_bayar/";
if (!is_dir($folderTujuan)) {
  mkdir($folderTujuan, 0755, true);
}

$pesanUpload = "Gagal upload bukti pembayaran.";
if (isset($_FILES["buktiBayar"]) && $_FILES["buktiBayar"]["error"] === UPLOAD_ERR_OK) {
  // Pemeriksaan di sisi server: atribut accept di form bisa dilewati pengguna
  $ekstensi = strtolower(pathinfo($_FILES["buktiBayar"]["name"], PATHINFO_EXTENSION));
  $ekstensiBoleh = ["jpg", "jpeg", "png"];
  $isGambar = getimagesize($_FILES["buktiBayar"]["tmp_name"]) !== false;

  if (in_array($ekstensi, $ekstensiBoleh, true) && $isGambar) {
    $namaFile = uniqid("bukti_", true) . "." . $ekstensi;
    $alamatFile = $folderTujuan . $namaFile;

    if (move_uploaded_file($_FILES["buktiBayar"]["tmp_name"], $alamatFile)) {
      $pesanUpload = "Bukti pembayaran berhasil diupload.";
    }
  } else {
    $pesanUpload = "File harus berupa gambar JPG atau PNG.";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Pesanan Berhasil - TiketWar</title></head>
<body>
  <h1>Pesanan Berhasil!</h1>
  <p>Nama: <?php echo htmlspecialchars($nama); ?></p>
  <p>Konser: <?php echo htmlspecialchars($konser); ?></p>
  <p>Jumlah tiket: <?php echo $jumlah; ?></p>
  <p><?php echo $pesanUpload; ?></p>
  <p><a href="index.php">Kembali ke beranda</a></p>
</body>
</html>
