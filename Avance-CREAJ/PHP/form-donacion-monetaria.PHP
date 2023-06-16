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
$dinero = $_POST['dinero'];
$tarjeta = $_POST['tarjeta'];
$cvv = $_POST['cvv'];

    $sql = "INSERT INTO  (nombre, correo, telefono, dinero, tarjeta, cvv) VALUES ('$nombre', '$correo', '$telefono','$dinero','$tarjeta','$cvv')";
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('La donacion ha sido realizada correctamente'); window.location.href='#';</script>";
    } else {
      echo "<script>alert('Se ha producido un error durante la donacion vuelve a intentarlo'); window.location.href='#';</script> " . mysqli_error($conn);
    }

// Cerrar la conexión con la base de datos
mysqli_close($conn);
    ?>