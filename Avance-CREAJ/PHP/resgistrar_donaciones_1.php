<?php
// Obtener el ID del usuario autenticado
$userId = $_SESSION['correo']; // Asumiendo que has iniciado sesión y almacenado el ID del usuario en la variable de sesión 'userId'

// Verificar si el usuario está autenticado
if (!$userId) {
    // El usuario no está autenticado, redirigir a la página de inicio de sesión o mostrar un mensaje de error
    header("Location: login.php");
    exit();
}

// Obtener los datos del formulario
$categoria = $_POST['categoria'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$equipo = $_POST['equipo'];
$cantidad = $_POST['cantidad'];
$dinero = $_POST['dinero'];
$tarjeta = $_POST['tarjeta'];
$cvv = $_POST['cvv'];

// Realizar la conexión a la base de datos y guardar los datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saludrural";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

// Preparar la consulta SQL basada en la categoría
if ($categoria == "monetaria") {
    $sql = "INSERT INTO donaciones_monetarias (usuario_id, nombre, correo, telefono, cantidad, dinero, tarjeta, cvv) VALUES ('$userId', '$nombre', '$correo', '$telefono', '$cantidad', '$dinero', '$tarjeta', '$cvv')";
} elseif ($categoria == "equipamiento") {
    $sql = "INSERT INTO donaciones_equipamiento (usuario_id, nombre, correo, telefono, equipo, cantidad) VALUES ('$userId', '$nombre', '$correo', '$telefono', '$equipo', '$cantidad')";
}

// Ejecutar la consulta
if ($conn->query($sql) === true) {
    echo "Donación registrada exitosamente";
} else {
    echo "Error al registrar la donación: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
