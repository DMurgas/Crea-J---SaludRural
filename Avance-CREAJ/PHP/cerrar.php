<?php
 session_start();
 $db_host = 'localhost';
 $db_username = 'root';
 $db_password = '';
 $db_name = 'saludrural';
 $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

 if (!$conn) {
     die("Error de la conexion a la base de datos". mysqli_connect_error());
 }
 include("login.php");

$varsesion = $_SESSION['correo'];


if($varsesion == null || $varsesion = '') {
 echo 'Usted no tiene autorizacion';
 die();
}
session_destroy();
header("Location:../HTML/login.php");
?>