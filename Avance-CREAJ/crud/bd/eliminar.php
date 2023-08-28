<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saludrural";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el valor del ID de donación a eliminar desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_donacion = $_POST["id"];

    // Eliminar la donación de la base de datos
    $sql = "DELETE FROM registro WHERE id = $id_donacion";

    if ($conn->query($sql) === TRUE) {
        echo "Donación eliminada exitosamente.";
    } else {
        echo "Error al eliminar la donación: " . $conn->error;
    }
}

$conn->close();
?>
