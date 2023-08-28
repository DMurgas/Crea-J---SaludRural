<?php
include_once 'db_connection.php'; // Incluye la conexión a la base de datos

if (isset($_GET['id'])) {
    $blogId = $_GET['id'];
    
    $eliminarSql = "DELETE FROM necesidades WHERE id_necesidad = $blogId";
    
    if ($conn->query($eliminarSql) === TRUE) {
        header("Location: realizado-necesidades.php"); // Redirige de vuelta a la lista de blogs después de eliminar
        exit();
    } else {
        echo "Error al eliminar la entrada: " . $conn->error;
    }
    
    $conn->close();
} else {
    echo 'ID de entrada no proporcionado.';
}
?>
