<?php
session_start();

// Kalau sudah login, langsung arahkan ke dashboard
if (isset($_SESSION["admin"])) {
  header("Location: dashboard.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head><title>Login Admin - TiketWar</title></head>
<body>
  <h1>Login Admin TiketWar</h1>

  <?php if (isset($_SESSION["error"])) { ?>
    <p style="color:red;"><?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?></p>
  <?php } ?>

  <form action="prosesLogin.php" method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>
  <p><a href="index.php">&larr; Kembali ke beranda</a></p>
</body>
</html>
