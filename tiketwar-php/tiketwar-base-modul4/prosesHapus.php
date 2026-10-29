<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}

if (isset($_POST["hapus"])) {
  unset($_SESSION["daftarWar"][(int) $_POST["hapus"]]);
}

header("Location: dashboard.php");
exit;
