<!DOCTYPE html>
<html lang="id">
<head><title>Pesan Tiket - TiketWar</title></head>
<body>
  <h1>Form Pemesanan Tiket</h1>
  <p><a href="index.php">&larr; Kembali ke beranda</a></p>

  <!-- enctype="multipart/form-data" WAJIB ada karena ada input type="file" -->
  <form action="prosesPesan.php" method="post" enctype="multipart/form-data">
    <p>
      <label>Nama Pembeli:</label><br>
      <input type="text" name="namaPembeli" required>
    </p>
    <p>
      <label>Pilih Konser:</label><br>
      <select name="pilihKonser" required>
        <option value="Coldplay">Coldplay - Music of the Spheres</option>
        <option value="Dewa 19">Dewa 19 Reunion Show</option>
        <option value="NCT Dream">NCT Dream World Tour</option>
      </select>
    </p>
    <p>
      <label>Jumlah Tiket:</label><br>
      <input type="number" name="jumlahTiket" min="1" max="4" required>
    </p>
    <p>
      <label>Bukti Pembayaran:</label><br>
      <input type="file" name="buktiBayar" accept=".jpg,.jpeg,.png" required>
    </p>
    <button type="submit">War Sekarang!</button>
  </form>
</body>
</html>
