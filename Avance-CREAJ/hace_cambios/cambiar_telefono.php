<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'db_connection.php'; // Incluye la conexión a la base de datos
    
    $nueva_descripcion = $_POST['nuevo_telefono']; // Obtiene la nueva descripción
    
    $consulta = "UPDATE registro SET telefono = '$nueva_descripcion' WHERE id = 1"; // Cambia el ID y la consulta según tu caso
    
    if ($conn->query($consulta) === TRUE) {
        header("Location: ../HTML/perl-usu.php"); // Redirige de vuelta al perfil
    } else {
        echo "Error al actualizar la descripción: " . $conn->error;
    }
    
    $conn->close();
}
?>
