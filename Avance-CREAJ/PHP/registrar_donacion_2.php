<!DOCTYPE html>
<html lang="es">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'saludrural';
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Error de la conexion a la base de datos: " . mysqli_connect_error());
}

if(!empty($_POST["correo"])){
    session_start();
    $usuarioId = $_SESSION['usuario_id'];
    if (!empty($_POST["nombre"]) && !empty($_POST["correo"])  && !empty($_POST["telefono"])  && !empty($_POST["fecha"]) && !empty($_POST["monto"]) && !empty($_POST["tarjeta"]) && !empty($_POST["cvv"])) {
        
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        #$contacto = $_POST["info"];
        $telefono = $_POST["telefono"];
        $genero = $_POST["genero"];
        $fecha = $_POST["fecha"];
        $monto = $_POST["monto"];
        $tarjeta = $_POST["tarjeta"];
        $cvv = $_POST["cvv"];
    
        // Insertar la donación asociada al usuario ID
        $sql = $conn->query ("INSERT INTO `donacion`(`ID`, `usuario_id`, `nombre`, `correo`, `telefono`, `genero`, `fecha`, `monto`, `tarjeta`, `cvv`) VALUES (NULL, '$usuarioId', '$nombre', '$correo', '$telefono', '$genero', '$fecha', '$monto', '$tarjeta', '$cvv')");
    
        // Ejecutar la consulta
        if ($sql) {
            echo "
            <scrip language='JavaScript'>
                swal.fire({
                    icon: 'success',
                    title: '¡El formulario se ha registrado correctamente!',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location = '../HTML/Index.php';
                });
            </script>";
            exit; // Salir del script después de mostrar el mensaje de éxito y redirigir
        } else {
            echo "
    <script language='JavaScript'>
        swal.fire({
            icon: 'error',
            title: 'Error en el registro de la donación',
            text: '¡Vuelva a ingresar los datos!' ,
        }).then(function() {
            window.location = '../HTML/Index.php';
        });
    </script>
    ";
        }
    }
}else{
    #echo '<script language="javascript">alert("Donacion no registrada"); window.location.href="../HTML/Index.php";</script>';
    exit; // Salir del script después de mostrar el mensaje de éxito y redirigir
}
?>
</body>
</html>