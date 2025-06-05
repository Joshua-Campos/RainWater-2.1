<!-- guardar_comentario.php -->
<!DOCTYPE html>
<html>
<head><title>Observaciones guardadas</title></head>
<body style="background-color:#d0f0c0;">
  <?php
  $archivo = "observaciones.txt";
  $abrir = fopen($archivo, "a") or die("No se pudo abrir el archivo");

  fputs($abrir, "Nombre: " . $_POST['nombre'] . "\n");
  fputs($abrir, "Comentario: " . $_POST['descripcion'] . "\n");
  fputs($abrir, "---------------------------\n");
  fclose($abrir);

  echo "<p>✅ Información guardada correctamente.</p>";
  ?>
  <button onclick="history.back()">🔙 Regresar</button>
</body>
</html>
