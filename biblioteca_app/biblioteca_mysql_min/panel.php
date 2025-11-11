<?php
include "cabecera.php";
if (empty($_SESSION['usuario'])) {
  header("Location: login.html"); exit;
}
$u = $_SESSION['usuario'];
?>
<h2>Panel</h2>
<p>Hola, <strong><?=htmlspecialchars($u['nombre'])?></strong> (tipo <?=$u['tipo']?>)</p>
<ul>
  <li><a href="FormLibros.html">Añadir libro</a></li>
  <li><a href="listaLibros.php">Ver libros</a></li>
  <li><a href="logout.php">Cerrar sesión</a></li>
</ul>
<?php include "pie.php"; ?>
