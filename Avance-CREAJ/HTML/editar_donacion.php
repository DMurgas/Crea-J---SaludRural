<?php
session_start();

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saludrural";

// Establecer conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir al usuario a la página de inicio de sesión o mostrar un mensaje de error
    header('Location: login.php');
    exit();
}

// Obtener el ID del usuario actual
$usuarioId = $_SESSION['usuario_id'];

// Verificar si se ha enviado el formulario
if (isset($_POST['cita_id']) && isset($_POST['nuevo_dia'])) {
    $citaId = $_POST['cita_id'];
    $nuevoDia = $_POST['nuevo_dia'];

    // Actualizar el día de la cita en la base de datos
    $sql = "UPDATE donacion SET fecha = '$nuevoDia' WHERE ID = '$citaId' AND usuario_id = '$usuarioId'";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al usuario a la página de citas con un mensaje de éxito
        header('Location: donaciones-reali.php?success=1');
        exit();
    } else {
        // Redirigir al usuario a la página de citas con un mensaje de error
        header('Location: donaciones-reali.php?error=1');
        exit();
    }
}

// Cerrar la conexión
$conn->close();
?>
