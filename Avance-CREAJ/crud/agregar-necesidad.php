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
    die("Error de la conexión a la base de datos: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    // Verificar si se envió el formulario del blog
    session_start();
    $hospital_id = $_SESSION['hospital_id'];

    if (!empty($_POST["titulo"]) && !empty($_POST["contenido"]) && !empty($_FILES["imagen"]["name"])) {
        // Recuperar los datos del formulario del blog
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $lugar = $_POST['lugar'];

        // Procesar la imagen
        $target_dir = "../imagen/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($check === false) {
            echo "El archivo no es una imagen";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo "El archivo ya existe";
            $uploadOk = 0;
        }

        if ($_FILES["imagen"]["size"] > 5000000) {
            echo "El archivo es demasiado grande";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Error al subir la imagen";
        } else {
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                // Preparar y ejecutar la consulta SQL para insertar el blog
                $sql = "INSERT INTO necesidades (hospital_id, titulo, contenido, lugar, imagen) VALUES ('$hospital_id', '$titulo', '$contenido','$lugar', '$target_file')";
                if (mysqli_query($conn, $sql)) {
                    header("index.php");
                } else {
                    echo "Error al agregar el blog: " . mysqli_error($conn);
                }
            } else {
                echo "Error al subir la imagen.";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SaludRural</title>
    <link rel="shortcut icon" href="../Imagenes/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans flex flex-col min-h-screen">
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
                        <span>Necesidades actuales</span>
                        <i class="fas fa-chevron-down ml-1"></i> <!-- Flecha hacia abajo -->
                    </a>

                    <!-- Menú desplegable -->
                    <ul class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md rounded-md hidden" id="donaciones-menu-items">
                        <li><a href="agregar-blog.php" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Agregar </a></li>
                        <li><a href="form-equipo" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Realizados</a></li>
                    </ul>
                </li>
                <li class="relative items-center">
                    <!-- Enlace con menú desplegable -->
                    <a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="exito-menu">
                        <span>Historias de exito</span>
                        <i class="fas fa-chevron-down ml-1"></i> <!-- Flecha hacia abajo -->
                    </a>

                    <!-- Menú desplegable -->
                    <ul class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md rounded-md hidden" id="exito-menu-items">
                        <li><a href="form-medica.php" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Agregar </a></li>
                        <li><a href="form-equipo" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Realizados</a></li>
                    </ul>
                </li>
            </ul>

            <div class="relative">
                <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </button>
                <!-- Menú desplegable del usuario -->
            <ul class="absolute right-0 mt-2 py-2 w-50 bg-white rounded-lg shadow-md hidden" id="user-menu">
                <?php
                // Mostrar nombre del usuario si está disponible en la sesión
                if (isset($_SESSION['nombre']) && !empty($_SESSION['nombre'])) {
                    echo '<li><a href="#" class="block px-1 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">' . $_SESSION['nombre'] . '</a></li>';
                }
                ?>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Configuración</a></li>
                <li><a href="../PHP/close.php" class="block px-4 py-2 text-red-600 hover:bg-red-600 hover:text-white">Cerrar Sesión</a></li>
            </ul>
    </div>
    <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
    </div>
  </div>
    </nav>

    <main class="container mx-auto mt-8 flex-grow mb-8">
    <section class="flex justify-center">
        <div class="w-full md:w-2/3 lg:w-1/2">
            <form method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-md shadow-lg">
                <h2 class="text-2xl font-semibold mb-4 text-indigo-600 text-center">Agregar necesidad</h2>

                <label class="block mb-2">Título:</label>
                <input type="text" name="titulo" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-indigo-600 mb-4">

                <label class="block mb-2">Contenido:</label>
                <textarea name="contenido" rows="4" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-indigo-600 mb-4"></textarea>

                <label class="block mb-2">Direccion del hospital:</label>
                <textarea name="lugar" rows="4" class="w-full px-3 py-2 border rounded focus:outline-none focus:border-indigo-600 mb-4"></textarea>

                <label class="block mb-2">Imagen:</label>
                <input type="file" name="imagen" class="mb-4">

                

                <button type="submit" name="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-full w-full">Publicar</button>
            </form>
        </div>
    </section>
</main>


  <!-- Pie de página -->
<script>
    // Script para mostrar/ocultar el menú desplegable del usuario al hacer clic en el botón del usuario
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');
    userMenuButton.addEventListener('click', () => {
        userMenu.classList.toggle('hidden');
    });

    // Script para mostrar/ocultar el menú desplegable de donaciones al hacer clic en el botón de donaciones
    const donacionesMenuButton = document.getElementById('donaciones-menu');
    const donacionesMenuItems = document.getElementById('donaciones-menu-items');
    donacionesMenuButton.addEventListener('click', () => {
        donacionesMenuItems.classList.toggle('hidden');
    });

    // Script para mostrar/ocultar el menú desplegable de donaciones al hacer clic en el botón de donaciones
    const exitoMenuButton = document.getElementById('exito-menu');
    const exitoMenuItems = document.getElementById('exito-menu-items');
    exitoMenuButton.addEventListener('click', () => {
        exitoMenuItems.classList.toggle('hidden');
    });

    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const header = document.querySelector('.flex'); // Cambia esto al selector correcto de tu encabezado

    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
      header.classList.toggle('h-16'); // Ajusta la altura del encabezado según tus necesidades
    });
</script>
</body>
</html>

<?php
// Cierra la conexión a la base de datos
$conn->close();
?>