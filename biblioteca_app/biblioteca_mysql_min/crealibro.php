<?php
include "cabecera.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: FormLibros.html"); exit;
}

$nombre = $_POST['nombre'] ?? '';
$autor  = $_POST['autor'] ?? '';
$isbn   = $_POST['isbn'] ?? '';
$puntu  = $_POST['puntuacion'] ?? '';
$genero = $_POST['genero'] ?? '';

$conn = abrirConexion();


$nombre = mysqli_real_escape_string($conn, $nombre);
$autor  = mysqli_real_escape_string($conn, $autor);
$isbn   = mysqli_real_escape_string($conn, preg_replace('/\s+/', '', $isbn));
$puntu  = (int)$puntu;
$genero = mysqli_real_escape_string($conn, $genero);


$sqlCheck = sprintf("SELECT id FROM libros WHERE isbn='%s' LIMIT 1", $isbn);
$res = mysqli_query($conn, $sqlCheck);
if ($res && mysqli_num_rows($res) > 0) {
    include "cabecera.php";
    echo '<div class="flash error">Ya existe un libro con el mismo ISBN.</div>';
    echo '<p><a href="FormLibros.html">Volver</a></p>';
    include "pie.php";
    if ($res) mysqli_free_result($res);
    mysqli_close($conn);
    exit;
}
if ($res) mysqli_free_result($res);


$sqlIns = sprintf(
    "INSERT INTO libros (nombre, autor, isbn, puntuacion, genero) VALUES ('%s','%s','%s',%d,'%s')",
    $nombre, $autor, $isbn, $puntu, $genero
);

if (mysqli_query($conn, $sqlIns)) {
    mysqli_close($conn);
    header("Location: listaLibros.php?ok=1");
    exit;
} else {
    include "cabecera.php";
    echo '<div class="flash error">Error insertando: '.htmlspecialchars(mysqli_error($conn)).'</div>';
    echo '<p><a href="FormLibros.html">Volver</a></p>';
    include "pie.php";
    mysqli_close($conn);
}
