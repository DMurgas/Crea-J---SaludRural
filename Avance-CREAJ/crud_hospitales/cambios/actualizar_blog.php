<?php
include_once 'db_connection.php'; // Incluye la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blogId = $_POST['id_necesidad'];
    $nuevoNombre = $_POST['nombre'];
    $nuevaDescripcion = $_POST['descripcion'];
    
    $actualizarSql = "UPDATE necesidades SET nombre = '$nuevoNombre', descripcion = '$nuevaDescripcion' WHERE id_necesidad = $blogId";
    
    if ($conn->query($actualizarSql) === TRUE) {
        header("Location: realizado-nece.php?id=$blogId"); // Redirige de vuelta a la página de detalles del blog
        exit();
    } else {
        echo "Error al actualizar la entrada: " . $conn->error;
    }
    
    $conn->close();
} else {
    echo 'Acceso no válido.';
}
?>