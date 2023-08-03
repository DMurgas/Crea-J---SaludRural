<!DOCTYPE html>
<html>
<head>
    <title>Donaciones realizadas</title>
    <link rel="shortcut icon" href="../Imagenes/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../Imagenes/favicon.png" />
</head>
<body class="bg-gray-100">
    <nav class="bg-white p-4">
    <div class="flex flex-1 items-center justify-center">
       
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class=" text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Inicio</a>
            <a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Donaciones</a>
                <ul class="absolute top-10 left-0 bg-white shadow-md rounded-md hidden" id="donaciones-menu-items">
                        <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Tipo 1</a></li>
                        <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Tipo 2</a></li>
                        <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Tipo 3</a></li>
                </ul>
            <a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Blog</a>
            <a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Acerca de</a>
            <div class="absolute relative ml-3 justify-end">
          <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
          </div>
          </div>
        </div>
    </div>
    </nav>
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg mt-8 mx-auto">
    <h1 class="text-4xl font-bold mb-4 text-center">Donaciones realizadas</h1>

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
            echo '<div class="bg-gray-100 p-4 mb-4 rounded-lg shadow-md">';
                echo '<div class="font-bold text-xl">' . $fila['nombre'] . '</div>';
                echo '<div><span class="font-semibold">Correo:</span> ' . $fila['correo'] . '</div>';
                echo '<div><span class="font-semibold">Teléfono:</span> ' . $fila['telefono'] . '</div>';
                echo '<div><span class="font-semibold">Género:</span> ' . $fila['genero'] . '</div>';
                echo '<div><span class="font-semibold">Fecha:</span> ' . $fila['fecha'] . '</div>';

                // Formulario para editar el día de la cita
                echo '<form action="editar_donacion.php" method="post" class="mt-4">';
                echo '<input type="hidden" name="cita_id" value="' . $fila['ID'] . '">';
                echo '<label class="font-semibold">Nuevo día de la cita:</label>';
                echo '<input type="date" name="nuevo_dia" value="' . $fila['fecha'] . '" class="border rounded-lg p-2">';
                echo '<button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">Editar</button>';
                echo '</form>';
                echo '</div>';
        }
    } else {
        echo '<div class="no-citas">No se encontraron citas para este usuario.</div>';
    }
    
    // Cerrar la conexión
    $conn->close();
    ?>
    </div>
</body>
</html>    