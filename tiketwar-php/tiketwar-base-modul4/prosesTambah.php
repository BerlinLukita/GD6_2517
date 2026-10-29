<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: tambahTiket.php");
  exit;
}

$namaKonser = trim($_POST["namaKonser"] ?? "");
$kategori = $_POST["kategori"] ?? "";
$harga = (int) ($_POST["harga"] ?? 0);

// Proses upload bukti (sama seperti bab 14)
$folderTujuan = "bukti_bayar/";
if (!is_dir($folderTujuan)) {
  mkdir($folderTujuan, 0755, true);
}

$alamatFile = "";
if (isset($_FILES["buktiBayar"]) && $_FILES["buktiBayar"]["error"] === UPLOAD_ERR_OK) {
  $ekstensi = strtolower(pathinfo($_FILES["buktiBayar"]["name"], PATHINFO_EXTENSION));
  $ekstensiBoleh = ["jpg", "jpeg", "png"];
  $isGambar = getimagesize($_FILES["buktiBayar"]["tmp_name"]) !== false;

  if (in_array($ekstensi, $ekstensiBoleh, true) && $isGambar) {
    $namaFile = uniqid("bukti_", true) . "." . $ekstensi;
    $tujuan = $folderTujuan . $namaFile;
    if (move_uploaded_file($_FILES["buktiBayar"]["tmp_name"], $tujuan)) {
      $alamatFile = $tujuan;
    }
  }
}

if ($namaKonser !== "") {
  if (!isset($_SESSION["daftarWar"])) {
    $_SESSION["daftarWar"] = [];
  }
  // Simpan satu tiket (associative array) ke dalam daftar di session
  $_SESSION["daftarWar"][] = [
    "nama" => $namaKonser,
    "kategori" => $kategori,
    "harga" => $harga,
    "bukti" => $alamatFile
  ];
}

header("Location: dashboard.php");
exit;
