<?php
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["nueva_imagen"])) {
    $usuario_id = 1; // Cambia esto por la forma en que identificas al usuario
    $ruta_destino = "../imagen-usu/" . basename($_FILES["nueva_imagen"]["name"]);

    if (move_uploaded_file($_FILES["nueva_imagen"]["tmp_name"], $ruta_destino)) {
        // Actualizar la base de datos con la nueva ruta de imagen
        $actualizar_imagen = "UPDATE hospitales SET foto_hospital= '$ruta_destino' WHERE id = $usuario_id";
        $conn->query($actualizar_imagen);
        echo "Imagen de perfil actualizada correctamente.";
    } else {
        echo "Error al subir la imagen.";
    }
}
?>
