<?php
include "cabecera.php";
$conn = abrirConexion();

$puntuacion = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['puntuacion']) && $_POST['puntuacion'] !== '') {
    $puntuacion = (int)$_POST['puntuacion'];
}

if ($puntuacion === null) {
    $sql = "SELECT id, nombre, autor, isbn, puntuacion, genero FROM libros ORDER BY id DESC";
} else {
    $sql = sprintf("SELECT id, nombre, autor, isbn, puntuacion, genero FROM libros WHERE puntuacion=%d ORDER BY id DESC", $puntuacion);
}

$res = mysqli_query($conn, $sql);
?>
<h2>Libros</h2>

<form method="post" action="listaLibros.php" style="display:flex;gap:10px;align-items:center;">
  <label>Puntuación:
    <select name="puntuacion">
      <option value="">(todas)</option>
      <?php for ($i=0; $i<=10; $i++): ?>
        <option value="<?=$i?>" <?= $puntuacion!==null && $puntuacion===$i ? 'selected' : '' ?>><?=$i?></option>
      <?php endfor; ?>
    </select>
  </label>
  <button type="submit">Filtrar</button>
  <a href="listaLibros.php">Limpiar</a>
</form>

<?php if (isset($_GET['ok'])): ?>
  <div class="flash">Libro creado correctamente.</div>
<?php endif; ?>

<table>
  <thead>
    <tr>
      <th>Título</th>
      <th>Autor</th>
      <th>ISBN</th>
      <th>Puntuación</th>
      <th>Género</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($res): ?>
      <?php while ($fila = mysqli_fetch_array($res)): ?>
        <tr>
          <td><?=htmlspecialchars($fila['nombre'])?></td>
          <td><?=htmlspecialchars($fila['autor'])?></td>
          <td><?=htmlspecialchars($fila['isbn'])?></td>
          <td><?=htmlspecialchars($fila['puntuacion'])?></td>
          <td><?=htmlspecialchars($fila['genero'])?></td>
        </tr>
      <?php endwhile; mysqli_free_result($res); ?>
    <?php endif; ?>
  </tbody>
</table>

<?php
mysqli_close($conn);
include "pie.php";
?>
