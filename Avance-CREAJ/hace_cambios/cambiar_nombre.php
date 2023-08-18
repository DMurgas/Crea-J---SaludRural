<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'db_connection.php'; // Incluye la conexión a la base de datos
    
    $nuevo_nombre = $_POST['nuevo_nombre']; // Obtiene el nuevo nombre
    
    $consulta = "UPDATE registro SET nombre = '$nuevo_nombre' WHERE id = 1"; // Cambia el ID y la consulta según tu caso
    
    if ($conn->query($consulta) === TRUE) {
        header("Location: ../HTML/perl-usu.php"); // Redirige de vuelta al perfil
    } else {
        echo "Error al actualizar el nombre: " . $conn->error;
    }
    
    $conn->close();
}
?>
