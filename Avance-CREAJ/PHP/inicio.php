<?php
// Conexión a la base de datos
$db_host = 'localhost';
$db_username = 'nombre_de_usuario';
$db_password = 'contraseña';
$db_name = 'nombre_de_la_base_de_datos';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Comprobar la conexión
if (!$conn) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consultar la tabla de administradores
$query_admin = "SELECT id, password FROM administradores WHERE username = '$username'";
$result_admin = mysqli_query($conn, $query_admin);
$row_admin = mysqli_fetch_assoc($result_admin);

// Consultar la tabla de usuarios
$query_user = "SELECT id, password FROM usuarios WHERE username = '$username'";
$result_user = mysqli_query($conn, $query_user);
$row_user = mysqli_fetch_assoc($result_user);

// Verificar las credenciales
if ($row_admin) {
    // Si el usuario es un administrador
    if (password_verify($password, $row_admin['password'])) {
        $user_id = $row_admin['id'];
        // Iniciar sesión o realizar cualquier otra acción necesaria para el administrador
        // Redirigir al panel de administración
        header("Location: panel_admin.php?id=$user_id");
        exit();
    } else {
        // Las credenciales no coinciden
        echo "Nombre de usuario o contraseña incorrectos.";
    }
} elseif ($row_user) {
    // Si el usuario es un usuario normal
    if (password_verify($password, $row_user['password'])) {
        $user_id = $row_user['id'];
        // Iniciar sesión o realizar cualquier otra acción necesaria para el usuario
        // Redirigir a la página de inicio del usuario
        header("Location: inicio_usuario.php?id=$user_id");
        exit();
    } else {
        // Las credenciales no coinciden
        echo '<script language="javascript">alert("Correo de usuario o contraseña incorrectos.");window.location.href="../HTML/form-registro.php";</script>';
    }
} else {
    // El usuario no existe
    echo '<script language="javascript">alert("Correo de usuario o contraseña incorrectos.");window.location.href="../HTML/form-registro.php";</script>';
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
