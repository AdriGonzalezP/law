<?php
function recupera($key, $default=null) {
  return isset($_REQUEST[$key]) ? intval($_REQUEST[$key]) : $default;
}
$nIni=recupera('n_ini',50); $nFin=recupera('n_fin',60);
$dIni=recupera('d_ini',5);  $dFin=recupera('d_fin',16);
if($nIni>$nFin){[$nIni,$nFin]=[$nFin,$nIni];}
if($dIni>$dFin){[$dIni,$dFin]=[$dFin,$dIni];}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Actividad 2 — Tabla de divisibilidad</title>
<style>
  body { font-family: Arial, sans-serif; background: #ffffff; padding: 24px; }
  table { border-collapse: collapse; }
  th, td { border: 1px solid #008000; width: 32px; height: 32px; text-align: center; }
  th { background: #b5ffb5; color: #000; }
  td { background: #fff5c2; }
  td.star { background: #fff0a8; font-weight: bold; }
  td.dash { background: #fff0a8; color: #444; }
  caption { font-weight: bold; margin-bottom: 8px; }
</style>
</head>
<body>
<h1>Actividad 2 — Tabla de divisibilidad</h1>
<table>
  <caption>n=<?php echo "$nIni..$nFin"; ?>, divisores <?php echo "$dIni..$dFin"; ?></caption>
  <tr><th> </th>
  <?php for($n=$nIni;$n<=$nFin;$n++): ?>
    <th><?php echo $n; ?></th>
  <?php endfor; ?>
  </tr>
  <?php for($d=$dIni;$d<=$dFin;$d++): ?>
    <tr>
      <th><?php echo $d; ?></th>
      <?php for($n=$nIni;$n<=$nFin;$n++):
        $isDiv=($n%$d===0);
      ?>
        <td class="<?php echo $isDiv?'star':'dash'; ?>"><?php echo $isDiv?'*':'-'; ?></td>
      <?php endfor; ?>
    </tr>
  <?php endfor; ?>
</table>
</body>
</html>
