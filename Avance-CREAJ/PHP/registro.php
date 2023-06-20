<?php
include("conex.php");
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$dui = $_POST['dui'];
$contra = $_POST['contra'];

$sql= "INSERT INTO `registro`(`id`, `nombre`, `apellidos`, `telefono`, `email`, `dui`, `contra`) VALUES (NULL, '$nombre', '$apellidos','$telefono','$email','$dui','$contra')";

$resultado = mysqli_query($conn,$sql);
mysqli_close($conn);
    echo'<script language="javascript">alert("Se ha resgistrado con exito!!!!");window.location.href="../HTML/login.php"</script>'
?>