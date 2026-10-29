<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: login.php");
  exit;
}

if (empty($_POST["username"]) || empty($_POST["password"])) {
  $_SESSION["error"] = "Username dan password harus diisi!";
  header("Location: login.php");
  exit;
}

// Sengaja TIDAK memverifikasi ke database: fokus latihan adalah mekanisme session
$_SESSION["admin"] = [
  "username" => $_POST["username"],
  "login_at" => date("Y-m-d H:i:s")
];

header("Location: dashboard.php");
exit;
