<?php
session_start();

// Halaman ini dilindungi: hanya bisa dibuka kalau sudah login
if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}

if (!isset($_SESSION["daftarWar"])) {
  $_SESSION["daftarWar"] = [];
}
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Dashboard Admin - TiketWar</title></head>
<body>
  <h1>Dashboard Admin - Halo, <?php echo htmlspecialchars($_SESSION["admin"]["username"]); ?></h1>
  <p>
    <a href="tambahTiket.php">+ Tambah Tiket War</a> |
    <a href="index.php">Beranda</a> |
    <a href="prosesLogout.php">Logout</a>
  </p>

  <?php if (count($_SESSION["daftarWar"]) === 0) { ?>
    <p>Belum ada tiket war. Klik "Tambah Tiket War" untuk menambah.</p>
  <?php } ?>

  <?php foreach ($_SESSION["daftarWar"] as $i => $tiket) { ?>
    <div style="border: 1px solid #ccc; padding: 12px; margin-bottom: 8px;">
      <h3><?php echo htmlspecialchars($tiket["nama"]); ?></h3>
      <p>
        <?php echo htmlspecialchars($tiket["kategori"]); ?> -
        Rp<?php echo number_format($tiket["harga"], 0, ",", "."); ?>
      </p>
      <?php if ($tiket["bukti"] !== "") { ?>
        <img src="<?php echo htmlspecialchars($tiket["bukti"]); ?>" width="100" alt="Bukti bayar">
      <?php } ?>
      <form action="prosesHapus.php" method="post">
        <input type="hidden" name="hapus" value="<?php echo $i; ?>">
        <button type="submit">Hapus</button>
      </form>
    </div>
  <?php } ?>
</body>
</html>
