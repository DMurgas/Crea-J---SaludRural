<!DOCTYPE html>
<html lang="es">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    $id_donacion = $_POST["id_donacion"];

    // Eliminar la donación de la base de datos
    $sql = "DELETE FROM insumos WHERE id_donacion = $id_donacion";

    if ($conn->query($sql) === TRUE) {
        echo "
        <script language='JavaScript'>
            swal.fire({
                icon: 'error',
                title: '¡Donacion eliminada.!',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                window.location = '../donacion_insu.php';
            });
        </script>";
    } else {
        echo "Error al eliminar la donación: " . $conn->error;
    }
}

$conn->close();
?>
    </body></html>