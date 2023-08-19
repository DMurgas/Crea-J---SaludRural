<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'db_connection.php'; // Incluye la conexión a la base de datos
    
    $imagen = $_FILES['nueva_imagen']['name']; // Nombre de la nueva imagen
    $imagen_temp = $_FILES['nueva_imagen']['tmp_name']; // Ruta temporal de la imagen
    
    // Ruta de la carpeta de destino
    $carpeta_destino = '../imagen-usu/';
    
    // Mueve la imagen a la carpeta de destino
    move_uploaded_file($imagen_temp, $carpeta_destino . $imagen);
    
    $usuario_id = 1; // Cambia el ID según tu caso
    
    // Actualizar la ruta de la imagen en la base de datos
    $consulta = "UPDATE registro SET foto_perfil = '$carpeta_destino $imagen' WHERE id = $usuario_id";
    
    if ($conn->query($consulta) === TRUE) {
        header("Location: ../HTML/perl-usu.php"); // Redirige de vuelta al perfil
        exit(); // Asegura que el script se detenga después de redirigir
    } else {
        echo "Error al actualizar la imagen: " . $conn->error;
    }
    
    $conn->close();
}
?>
