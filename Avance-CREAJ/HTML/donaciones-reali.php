<?php
session_start();
error_reporting(0);
$correo = $_SESSION['correo'];

if ($correo == null || $correo == '') {
  echo '<script language="javascript">alert("Por favor inicie sesión o regístrese");window.location.href="../HTML/login.php"</script>';
  die();
} else {
  include("../PHP/conex.php");

  // Consulta SQL para obtener el ID del usuario según el correo electrónico
  $query = "SELECT id FROM registro WHERE correo = '$correo'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['usuario_id'] = $row['id'];
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Donaciones realizadas</title>
    <link rel="shortcut icon" href="../Imagenes/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<nav class="bg-white p-4">
        <div class="flex justify-between items-center">
            <!-- Logo o nombre del sitio -->
            <a href="#" class="text-green text-2xl font-bold">SaludRural</a>

            <!-- Menú de navegación -->
            <ul class="flex space-x-4">
                <li><a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Inicio</a></li>
                <li class="relative">
                    <!-- Enlace con menú desplegable -->
                    <a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="donaciones-menu">
                        <span>Donaciones</span>
                        <i class="fas fa-chevron-down ml-1"></i> <!-- Flecha hacia abajo -->
                    </a>

                    <!-- Menú desplegable -->
                    <ul class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md rounded-md hidden" id="donaciones-menu-items">
                        <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Medicamentos</a></li>
                        <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Equipos medicos</a></li>
                        <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Isumos medicos</a></li>
                        <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Monetaria</a></li>
                    </ul>
                </li>
                <li><a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Blog</a></li>
                <li><a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Acerca de</a></li>
            </ul>

            <div class="relative">
                <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </button>
                <!-- Menú desplegable del usuario -->
            <ul class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-md hidden" id="user-menu">
                <?php
                // Mostrar nombre del usuario si está disponible en la sesión
                if (isset($_SESSION['correo']) && !empty($_SESSION['correo'])) {
                    echo '<li><a href="#" class="block px-1 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">' . $_SESSION['correo'] . '</a></li>';
                }
                ?>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Configuración</a></li>
                <li><a href="../PHP/cerrar.php" class="block px-4 py-2 text-red-600 hover:bg-red-600 hover:text-white">Cerrar Sesión</a></li>
            </ul>
            </div>
    </nav>

    <div class="w-full max-w-mn p-8 bg-white rounded-lg shadow-lg  mx-auto">
        <h1 class="text-4xl font-bold mb-4 text-center">Donaciones realizadas</h1>

        <?php

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
            $donaciones = $resultado->fetch_all(MYSQLI_ASSOC);
            $donaciones_pares = array_chunk($donaciones, 2);

            foreach ($donaciones_pares as $donaciones_columna) {
                echo '<div class="grid grid-cols-2 gap-8">';
                foreach ($donaciones_columna as $donacion) {
                    echo '<div class="bg-gray-100 p-4 rounded-lg shadow-md">';
                    echo '<div class="font-bold text-xl">' . $donacion['nombre'] . '</div>';
                    echo '<div><span class="font-semibold">Correo:</span> ' . $donacion['correo'] . '</div>';
                    echo '<div><span class="font-semibold">Teléfono:</span> ' . $donacion['telefono'] . '</div>';
                    echo '<div><span class="font-semibold">Género:</span> ' . $donacion['genero'] . '</div>';
                    echo '<div><span class="font-semibold">Fecha:</span> ' . $donacion['fecha'] . '</div>';

                    // Formulario para editar el día de la cita
                    echo '<form action="editar_donacion.php" method="post" class="mt-4">';
                    echo '<input type="hidden" name="cita_id" value="' . $donacion['ID'] . '">';
                    echo '<label class="font-semibold">Nuevo día de la cita:</label>';
                    echo '<input type="date" name="nuevo_dia" value="' . $donacion['fecha'] . '" class="border rounded-lg p-2">';
                    echo '<button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">Editar</button>';
                    echo '</form>';
                    echo '</div>';
                }
                echo '</div>';
            }
        } else {
            echo '<div class="text-center mt-4">No se encontraron donaciones para este usuario.</div>';
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </div>

    <script>
        // Script para mostrar/ocultar el menú desplegable al hacer clic en "Donaciones"
        const donacionesMenu = document.getElementById('donaciones-menu');
        const donacionesMenuItems = document.getElementById('donaciones-menu-items');
        donacionesMenu.addEventListener('click', () => {
            donacionesMenuItems.classList.toggle('hidden');
        });

        // Script para mostrar/ocultar el menú desplegable del usuario al hacer clic en el botón del usuario
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');
        userMenuButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
 


