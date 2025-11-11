<?php
include "cabecera.php";

if (empty($_POST['nombre']) || empty($_POST['clave'])) {
    header("Location: login.html");
    exit;
}

$nombre = $_POST['nombre'];
$clave  = $_POST['clave'];

$conn = abrirConexion();
$nombre_esc = mysqli_real_escape_string($conn, $nombre);
$clave_md5  = md5($clave);

$sql = sprintf("SELECT id, nombre, clave, tipo FROM usuarios WHERE nombre='%s' AND clave='%s' LIMIT 1",
    $nombre_esc, $clave_md5);

$res = mysqli_query($conn, $sql);
if ($res && mysqli_num_rows($res) === 1) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['usuario'] = [
        'id' => (int)$row['id'],
        'nombre' => $row['nombre'],
        'tipo' => (int)$row['tipo'],
    ];
    mysqli_free_result($res);
    mysqli_close($conn);
    header("Location: panel.php");
    exit;
} else {
    include "cabecera.php";
    echo '<div class="flash error">Usuario o contraseña incorrectos.</div>';
    echo '<p><a href="login.html">Volver</a></p>';
    include "pie.php";
    if ($res) mysqli_free_result($res);
    mysqli_close($conn);
}
