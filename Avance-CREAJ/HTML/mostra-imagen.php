<?php
include_once 'db_connection.php'; // Incluye la conexión a la base de datos

if (isset($_SESSION['id'])) {
    $idUsuario = $_SESSION['id'];
    
    $consulta = "SELECT * FROM registro WHERE id = $idUsuario"; // Cambia el ID según el usuario actual
    $resultado = $conn->query($consulta);
    $ruta_imagen = "../imagen-usu/"; // Cambia esto a la ruta real de la imagen
    
    // Si la ruta de la imagen está vacía, utiliza una imagen predeterminada
    if (empty($ruta_imagen)) {
        $ruta_imagen = "../imagen-usu/"; // Cambia esto a la ruta de la imagen predeterminada
    }
    
    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $imagen_predeterminada = "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80";
    }
} else {
    // Redirige si no se ha iniciado sesión
    header("Location: iniciar_sesion.php");
    exit();
}
?>
