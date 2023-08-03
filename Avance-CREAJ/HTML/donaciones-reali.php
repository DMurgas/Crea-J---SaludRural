<!DOCTYPE html>
<html>
<head>
    <title>Donaciones realizadas</title>
    <link rel="shortcut icon" href="../Imagenes/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <h1>Donaciones realizadas</h1>

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

    // Consulta SQL para obtener las citas del usuario actual
    $sql = "SELECT * FROM donacion WHERE usuario_id = '$usuarioId'";
    $resultado = $conn->query($sql);

    // Mostrar citas del usuario actual
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo '<div class="cita">';
            echo '<div class="fecha">' . $fila['nombre'] . '</div>';
            echo '<div class="hora">' . $fila['correo'] . '</div>';
            echo '<div class="hora">' . $fila['telefono'] . '</div>';
            echo '<div class="estado">' . $fila['genero'] . '</div>';
            echo '<div class="descripcion">' . $fila['fecha'] . '</div>';

            // Formulario para editar el día de la cita
            echo '<form action="editar_donacion.php" method="post">';
            echo '<input type="hidden" name="cita_id" value="' . $fila['ID'] . '">';
            echo '<label>Nuevo día de la cita:</label>';
            echo '<input type="date" name="nuevo_dia" value="' . $fila['fecha'] . '">';
            echo '<button type="submit">Editar</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<div class="no-citas">No se encontraron citas para este usuario.</div>';
    }
    
    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>    