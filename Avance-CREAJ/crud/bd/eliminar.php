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
    $id_donacion = $_POST["id"];

    // Eliminar la donación de la base de datos
    $sql = "DELETE FROM registro WHERE id = $id_donacion";

    if ($conn->query($sql) === TRUE) {
        echo "
    <script language='JavaScript'>
        swal.fire({
            icon: 'success',
            title: 'Registro eliminado correctamente',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {
            window.location = '../index.php';
        });
    </script>
    ";
    } else {
        echo "
    <script language='JavaScript'>
        swal.fire({
            icon: 'success',
            title: 'Error',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {
            window.location = '../HTML/login.php';
        });
    </script>
    ". $conn->error;
    }
}

$conn->close();
?>
</body>
</html>