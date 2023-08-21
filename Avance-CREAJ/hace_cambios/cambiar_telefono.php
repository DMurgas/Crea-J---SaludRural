<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'db_connection.php'; // Incluye la conexión a la base de datos
    
    // Verifica si el usuario ha iniciado sesión
    if (isset($_SESSION['id'])) {
        $nuevo_telefono = $_POST['nuevo_telefono']; // Obtiene el nuevo teléfono
        $usuario_id = $_SESSION['id']; // Obtén el ID del usuario de la sesión
        
        // Actualiza el teléfono del usuario en la base de datos
        $consulta = "UPDATE registro SET telefono = '$nuevo_telefono' WHERE id = $usuario_id";
        
        if ($conn->query($consulta) === TRUE) {
            header("Location: ../HTML/perl-usu.php"); // Redirige de vuelta al perfil
        } else {
            echo "Error al actualizar el teléfono: " . $conn->error;
        }
    } else {
        echo "Error: No se ha iniciado sesión.";
    }
    
    $conn->close();
}
?>
