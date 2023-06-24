<?php

    // Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crea-J";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Recuperar los datos enviados por el formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$medicamento = $_POST['medicamento'];
$cantidad = $_POST['cantidad'];


    $sql = "INSERT INTO (nombre, correo, telefono, medicamento, cantidad) VALUES ('$nombre', '$correo', '$telefono','$medicamento','$cantidad')";
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('La donacion ha sido realizada correctamente'); window.location.href='#';</script>";
    } else {
      echo "<script>alert('Se ha producido un error durante la donacion vuelve a intentarlo'); window.location.href='#';</script> " . mysqli_error($conn);
    }

// Cerrar la conexión con la base de datos
mysqli_close($conn);
    ?>