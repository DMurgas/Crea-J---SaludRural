<?php
$servername= "localhost";
$username="root";
$password="";
$dbname="saludrural";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>