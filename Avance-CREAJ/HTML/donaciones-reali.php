<!DOCTYPE html>
<html>
<head>
    <title>Donaciones realizadas</title>
    <style>
      body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .cita {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .fecha {
            font-weight: bold;
        }

        .hora {
            color: #888;
        }

        .estado {
            color: green;
            font-weight: bold;
        }

        .descripcion {
            margin-top: 5px;
        }

        .no-citas {
            text-align: center;
            font-style: italic;
            color: #888;
        }

    </style>
    <link rel="shortcut icon" href="../Imagenes/favicon.png" />
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
            echo '<div class="fecha">' . $fila['Nom'] . '</div>';
            echo '<div class="hora">' . $fila['edad'] . '</div>';
            echo '<div class="hora">' . $fila['problema'] . '</div>';
            echo '<div class="estado">' . $fila['date'] . '</div>';
            echo '<div class="descripcion">' . $fila['estado'] . '</div>';

            // Formulario para editar el día de la cita
            echo '<form action="editar_cita.php" method="post">';
            echo '<input type="hidden" name="cita_id" value="' . $fila['ID'] . '">';
            echo '<label>Nuevo día de la cita:</label>';
            echo '<input type="date" name="nuevo_dia" value="' . $fila['date'] . '">';
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