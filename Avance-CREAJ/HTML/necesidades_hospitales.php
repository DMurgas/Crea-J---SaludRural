<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Necesidades actuales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20 items-center">
  <?php
  include_once 'db_connection.php'; // Asegúrate de incluir el archivo de conexión a la base de datos

  $consulta = "SELECT id,titulo, contenido, lugar FROM necesidades";
  $result = $conn->query($consulta);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<div>';
      echo '<h2 class="text-gray-800 text-3xl font-semibold">' . $row['titulo'] . '</h2>';
      echo '<p class="mt-2 text-gray-600">' . $row['contenido'] . '</p>';
      echo '<p class="mt-2 text-gray-600">' . $row['lugar'] . '</p>';
      echo '</div>';
      echo '<div class="flex justify-end mt-4">';
      echo '<a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">' . $row['nombre_hospital'] . '</a>';
      echo '</div>';
    }
  } else {
    echo '<p>No se encontraron necesidades de hospitales.</p>';
  }

  $conn->close();
  ?>
</div>

</body>
</html>