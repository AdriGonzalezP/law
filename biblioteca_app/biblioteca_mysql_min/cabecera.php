<?php

$servidor = "localhost";
$userBD   = "root";
$passwdBD = "root";
$nomBD    = "biblioteca";


function abrirConexion() {
    global $servidor, $userBD, $passwdBD, $nomBD;
    $conn = mysqli_connect($servidor, $userBD, $passwdBD, $nomBD);
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    mysqli_set_charset($conn, "utf8mb4");
    return $conn;
}

if (session_status() === PHP_SESSION_NONE) { session_start(); }
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Biblioteca</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;max-width:900px;margin:24px auto;padding:0 12px}
    nav a{margin-right:10px}
    table{width:100%;border-collapse:collapse;margin-top:10px}
    th,td{border:1px solid #e5e7eb;padding:8px;text-align:left}
    .flash{background:#ecfeff;border:1px solid #a5f3fc;padding:8px;border-radius:6px;margin:10px 0}
    .error{background:#fee2e2;border-color:#fecaca}
  </style>
</head>
<body>
<nav>
  <a href="index.php">Inicio</a>
  <a href="login.html">Login</a>
  <a href="FormLibros.html">Alta de libros</a>
  <a href="listaLibros.php">Listado</a>
  <?php if (!empty($_SESSION['usuario'])): ?>
    <a href="panel.php">Panel</a>
    <a href="logout.php">Salir</a>
  <?php endif; ?>
</nav>
<hr>
