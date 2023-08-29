<?php
$servername = "localhost"; // Nombre del servidor
$username = "root";        // Nombre de usuario de la base de datos
$password = "";            // Contraseña de la base de datos
$dbname = "saludrural"; // Nombre de la base de datos

// Crear la conexión
$conex = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conex->connect_error) {
    die("Conexión fallida: " . $conex->connect_error);
}

if (isset($_POST["actualizar"])) {
    $donacionId = $_POST["id"];
    $accion = $_POST["accion"];

    // Obtener la donación seleccionada
    $query = "SELECT * FROM monetaria WHERE id_donacion = '$donacionId'";
    $result = $conex->query($query);
    $row = $result->fetch_assoc();

    if ($row) {
        if ($accion == "Aceptar") {
            // Actualizar el estado de la donación a "aceptada"
            $updateQuery = "UPDATE monetaria SET estado = 'Aceptada' WHERE id_donacion = '$donacionId'";
            if ($conex->query($updateQuery)) {
                echo '<script language="javascript">window.location.href="../donacion_mone.php";alert("Donación aceptada exitosamente.");</script>';
            } else {
                echo "Error al actualizar el estado: " . $conex->error;
            }
        } elseif ($accion == "Rechazar") {
            // Actualizar el estado de la donación a "rechazada"
            $updateQuery = "UPDATE monetaria SET estado = 'Rechazada' WHERE id_donacion = '$donacionId'";
            if ($conex->query($updateQuery)) {
                echo '<script language="javascript">window.location.href="../donacion_mone.php";alert("Donación rechazada exitosamente.");</script>';
            } else {
                echo "Error al actualizar el estado: " . $conex->error;
            }
        } else {
            echo "Acción inválida.";
        }
    } else {
        echo "Donación no encontrada.";
    }
}
?>
