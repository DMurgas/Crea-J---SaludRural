<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'db_connection.php'; // Incluye la conexión a la base de datos
    
    $nuevo_correo = $_POST['nuevo_correo']; // Obtiene el nuevo correo
    
    $consulta = "UPDATE registro SET correo = '$nuevo_correo' WHERE id = 1"; // Cambia el ID y la consulta según tu caso
    
    if ($conn->query($consulta) === TRUE) {
        header("Location: ../HTML/perl-usu.php"); // Redirige de vuelta al perfil
    } else {
        echo "Error al actualizar el correo: " . $conn->error;
    }
    
    $conn->close();
}
?>
