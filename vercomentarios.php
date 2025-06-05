<!-- ver_comentarios.php -->
<!DOCTYPE html>
<html>
<head><title>Comentarios guardados</title></head>
<body style="background-color:#c0eaff; text-align: center;">
  <h2>📄 Observaciones registradas</h2>
  <pre style="text-align: left; margin: 0 auto; display: inline-block;">
<?php
  $ar = fopen("observaciones.txt", "r") or die("No se pudo abrir el archivo");
  while (!feof($ar)) {
    echo nl2br(fgets($ar));
  }
  fclose($ar);
?>
  </pre>
  <br><br>
  <button onclick="window.location.href='presupuesto.html'" class="boton">🔙 Volver al presupuesto</button>
  <form action="borrarcomentarios.php" method="post" onsubmit="return confirm('¿Estás seguro de borrar todos los comentarios?')">
    <button type="submit" class="boton borrar">🗑️ Borrar observaciones</button>
  </form>

  <style>
    .boton {
      background-color: #007bff;
      color: white;
      padding: 10px 18px;
      margin: 10px;
      border: none;
      border-radius: 8px;
      font-size: 1em;
      cursor: pointer;
      transition: 0.3s;
    }

    .boton:hover {
      background-color: #0056b3;
    }

    .borrar {
      background-color: #dc3545;
    }

    .borrar:hover {
      background-color: #c82333;
    }
  </style>
</body>

</html>
