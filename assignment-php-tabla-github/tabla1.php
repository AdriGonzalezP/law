<?php
$minN = 50; $maxN = 60; $divStart = 1; $divEnd = 10;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Actividad 1 — Tabla de divisibilidad 1–10</title>
<style>
  body { font-family: Arial, sans-serif; background: #ffffff; padding: 24px; }
  table { border-collapse: collapse; }
  th, td { border: 1px solid #663399; width: 32px; height: 32px; text-align: center; }
  th { background: #c7b6ff; color: #000; }
  td { background: #fff8b3; }
  td.star { background: #ffeaa0; font-weight: bold; }
  td.dash { background: #ffeaa0; color: #444; }
  caption { font-weight: bold; margin-bottom: 8px; }
</style>
</head>
<body>
<h1>Actividad 1 — Tabla de divisibilidad (1–10)</h1>
<table>
  <caption>n=50..60, divisores 1..10</caption>
  <tr><th> </th>
  <?php for ($n=$minN; $n<=$maxN; $n++): ?>
    <th><?php echo $n; ?></th>
  <?php endfor; ?>
  </tr>
  <?php for ($d=$divStart; $d<=$divEnd; $d++): ?>
    <tr>
      <th><?php echo $d; ?></th>
      <?php for ($n=$minN; $n<=$maxN; $n++): 
        $isDiv = ($n % $d === 0);
      ?>
        <td class="<?php echo $isDiv ? 'star' : 'dash'; ?>">
          <?php echo $isDiv ? '*' : '-'; ?>
        </td>
      <?php endfor; ?>
    </tr>
  <?php endfor; ?>
</table>
</body>
</html>
