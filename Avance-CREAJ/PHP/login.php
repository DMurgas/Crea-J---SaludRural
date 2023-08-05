<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'saludrural';
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Error de la conexion a la base de datos". mysqli_connect_error());
}

session_start();

if (!isset($_POST['correo'])) {
    header('location:../HTML/login.php');
}

$correo = $_POST['correo'];
$contra = $_POST['contraseña'];

$sql_admin = "SELECT * FROM administradores WHERE correo = '$correo' and contraseña = '$contra'";
$result_admin = mysqli_query($conn, $sql_admin);
$existe1 = mysqli_num_rows($result_admin);

$sql_user = "SELECT * FROM registro WHERE correo = '$correo' and contra = '$contra'";
$result_user = mysqli_query($conn, $sql_user);
$existe2 = mysqli_num_rows($result_user);

$sql_hospital = "SELECT * FROM hospitales WHERE nombre = '$correo' and password = '$contra'";
$result_hospital = mysqli_query($conn, $sql_hospital);
$existe3 = mysqli_num_rows($result_hospital);

if ($existe1 > 0) {
    while ($row = mysqli_fetch_array($result_admin)) {
        if ($correo == $row['correo'] && $contra == $row['contraseña']) {
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['id'] = $row['id'];
            echo '<script language="javascript">window.location.href="../crud/index.php";alert("Bienvenido!!!!");</script>';
        }
    }
} else if ($existe2 > 0) {
    while ($row = mysqli_fetch_array($result_user)) {
        if ($correo == $row['correo'] && $contra == $row['contra']) {
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['id'] = $row['id'];
            echo '<script language="javascript">window.location.href="../HTML/index.php";alert("Bienvenido!!!!");</script>';
        }
    }
} else if($existe3 > 0){
    while ($row = mysqli_fetch_array($result_hospital)) {
        if ($correo == $row['nombre'] && $contra == $row['password']) {
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['id'] = $row['id'];
            echo '<script language="javascript">window.location.href="../crud_hospitales/index.php";alert("Bienvenido!!!!");</script>';
        }
    }
} else {
   echo '<script language="javascript">alert("Usuario o contraseñas incorrectos");window.location.href="../HTML/login.php";</script>';
}

?>
