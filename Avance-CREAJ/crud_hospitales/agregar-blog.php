<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "nombre_de_tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hospital_id = $_POST["hospital_id"];
    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];
    $imagenURL = $_POST["imagenURL"];

    $sql = "INSERT INTO blogs (hospital_id, titulo, contenido, imagenURL) VALUES ('$hospital_id', '$titulo', '$contenido', '$imagenURL')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo blog agregado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Encabezado y estilos -->
</head>
<body class="bg-gray-100 font-sans flex flex-col min-h-screen">
  <!-- Encabezado -->

  <form method="post" action="agregar_blog.php">
    <input type="hidden" name="hospital_id" value="1"> <!-- Aquí se establece el ID del hospital -->
    <input type="text" name="titulo" placeholder="Título del blog">
    <textarea name="contenido" placeholder="Contenido del blog"></textarea>
    <input type="text" name="imagenURL" placeholder="URL de la imagen">
    <button type="submit">Agregar Blog</button>
  </form>

  <!-- Pie de página -->

</body>
</html>

<?php
// Cierra la conexión a la base de datos
$conn->close();
?>
