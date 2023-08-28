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

// Obtener el valor del nuevo estado y el ID de donación del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $estado = $_POST["estado"];
    $id_donacion = $_POST["id_donacion"];

    // Actualizar el estado en la base de datos
    $sql = "UPDATE equipo SET estado = '$estado' WHERE id_donacion = $id_donacion";

    if ($conn->query($sql) === TRUE) {
        echo "Estado actualizado exitosamente.";
    } else {
        echo "Error al actualizar el estado: " . $conn->error;
    }
}

$conn->close();
?>
