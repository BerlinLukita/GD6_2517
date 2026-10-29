<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Tambah Tiket War - TiketWar</title></head>
<body>
  <h1>Tambah Tiket War</h1>
  <p><a href="dashboard.php">&larr; Kembali ke dashboard</a></p>

  <form action="prosesTambah.php" method="post" enctype="multipart/form-data">
    <p>
      <label>Nama Konser:</label><br>
      <input type="text" name="namaKonser" required>
    </p>
    <p>
      <label>Kategori:</label><br>
      <select name="kategori" required>
        <option value="Festival">Festival</option>
        <option value="VIP">VIP</option>
        <option value="Reguler">Reguler</option>
      </select>
    </p>
    <p>
      <label>Harga (Rp):</label><br>
      <input type="number" name="harga" min="0" required>
    </p>
    <p>
      <label>Bukti Pembayaran:</label><br>
      <input type="file" name="buktiBayar" accept=".jpg,.jpeg,.png" required>
    </p>
    <button type="submit">Simpan</button>
  </form>
</body>
</html>
