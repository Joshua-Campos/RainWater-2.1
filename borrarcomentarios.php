<!-- borrarcomentarios.php -->
<!DOCTYPE html>
<html>
<head><title>Comentarios borrados</title></head>
<body style="background-color:#ffe0e0; text-align: center;">
  <?php
    file_put_contents("observaciones.txt", "");
    echo "<p>🗑️ Todos los comentarios fueron eliminados correctamente.</p>";
  ?>
  <button onclick="window.location.href='vercomentarios.php'" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 8px; font-size: 1em;">🔙 Volver</button>
</body>
</html>
