<!DOCTYPE html>
<html lang="es">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();

// Verificar si el usuario ha iniciado sesión y tiene un usuario_id válido
if (isset($_SESSION['usuario_id']) && !empty($_SESSION['usuario_id'])) {
    // Obtener el id_hospital seleccionado del formulario
    if (isset($_POST['hospital'])) {
        $id_hospital = $_POST['hospital'];
        $usuarioId = $_SESSION['usuario_id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $fecha = $_POST['fecha'];
        $equipo = $_POST['equipo'];
        $cantidad = $_POST ['cantidad'];
        $descripcion = $_POST['descripcion'];
if (strpos($correo, "@gmail.com") === false) {
            echo "
            <script language='JavaScript'>
                swal.fire({
                    icon: 'error',
                    title: 'El correo electrónico debe ser de dominio @gmail.com',
                    showConfirmButton: false,
                    timer: 3000
                }).then(function() {
                    window.location = '../HTML/form-mone.php';
                });
            </script>";
            exit; // Detiene la ejecución del script si el correo no es válido
        }
        // Realizar la conexión a la base de datos
        $db_host = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'saludrural';
        $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Preparar la consulta para insertar la donación en la tabla 'donaciones'
        $sql = "INSERT INTO equipo (id_hospital, id_usuario,`nombre`, `correo`, `telefono`, `fecha`, `equipo`, `cantidad`, `descripcion`) VALUES ('$id_hospital', '$usuarioId', '$nombre','$correo','$telefono','$fecha','$equipo','$cantidad', '$descripcion')";

        if ($conn->query($sql) === TRUE) {
            echo "
            <script language='JavaScript'>
                swal.fire({
                    icon: 'success',
                    title: '¡Tu formulario se ha registrado exitosamente!',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location = '../HTML/boton-donaciones.php';
                });
            </script>";
        } else {
            echo "Error al realizar la donación: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    }
} else {
    echo "
            <script language='JavaScript'>
                swal.fire({
                    icon: 'error',
                    title: 'Debes iniciar sesion para realizar una donación',
                }).then(function() {
                    window.location = '../HTML/login.php';
                });
            </script>";
}
?>
</body>
</html>
