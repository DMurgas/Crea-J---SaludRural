<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Hacer donacion</title>
</head>
<body class="bg-gray-100">
<nav class="bg-white p-4">
        <div class="flex justify-between items-center">
            <!-- Logo o nombre del sitio -->
            <div id="google_translate_element"></div>
            <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            <script src="../JS/traductor.js"></script>
            <a href="#" class="text-green text-2xl font-bold">SaludRural</a>

            <!-- Menú de navegación -->
            <ul class="flex space-x-4">
                <li><a href="Index.php" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Inicio</a></li>
                <li class="relative">
                    <!-- Enlace con menú desplegable -->
                    <a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="donaciones-menu">
                        <span>Donaciones</span>
                        <i class="fas fa-chevron-down ml-1"></i> <!-- Flecha hacia abajo -->
                    </a>

                    <!-- Menú desplegable -->
                    <ul class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md rounded-md hidden" id="donaciones-menu-items">
                        <li><a href="boton-donaciones.php" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Hacer donacion </a></li>
                        <li><a href="donaciones-reali.php" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Realizadas</a></li>
                    </ul>
                </li>
                <li><a href="blog.php" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Blog</a></li>
                <li><a href="AcercaDe.php" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Nosotros</a></li>
                <li class="relative">
                    <!-- Enlace con menú desplegable -->
                    <a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="hospitales-menu">
                        <span>Hospitales</span>
                        <i class="fas fa-chevron-down ml-1"></i> <!-- Flecha hacia abajo -->
                    </a>

                    <!-- Menú desplegable -->
                    <ul class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md rounded-md hidden" id="hospitales-menu-items">
                        <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Necesidades actuales</a></li>
                        <!-- <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Historias de exito</a></li> -->
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
                if (isset($_SESSION['correo']) && !empty($_SESSION['correo'])) {
                    echo '<li><a href="#" class="block px-1 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">' . $_SESSION['correo'] . '</a></li>';
                }
                ?>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Configuración</a></li>
                <li><a href="../PHP/cerrar.php" class="block px-4 py-2 text-red-600 hover:bg-red-600 hover:text-white">Cerrar Sesión</a></li>
            </ul>
            </div>
    </nav>
    <section class="bg-blue-600 text-white py-24">
      <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">¡Ayúdanos a llevar la salud a zonas rurales!</h1>
        <p class="text-lg mb-8">¿Que tipo de donacion quieres hacer?</p>
        
      </div>
    </section>
    <section class="bg-white py-24">
    <div class="flex justify-center items-center ">
  <div class="flex gap-4">
  <a href="../HTML/form-mone.php">
    <button class="relative h-12 w-40 overflow-hidden border border-blue-600 text-blue-600 shadow-2xl transition-all duration-200 before:absolute before:bottom-0 before:left-0 before:right-0 before:top-0 before:m-auto before:h-0 before:w-0 before:rounded-sm before:bg-blue-600 before:duration-300 before:ease-out hover:text-white hover:shadow-blue-600 hover:before:h-40 hover:before:w-40 hover:before:opacity-80">
        <span class="relative z-9">Monetaria</span>
    </button>
    </a>

    <a href="../HTML/form-insumo.php">
    <button class="relative h-12 w-40 overflow-hidden border border-blue-600 text-blue-600 shadow-2xl transition-all duration-200 before:absolute before:bottom-0 before:left-0 before:right-0 before:top-0 before:m-auto before:h-0 before:w-0 before:rounded-sm before:bg-blue-600 before:duration-300 before:ease-out hover:text-white hover:shadow-blue-600 hover:before:h-40 hover:before:w-40 hover:before:opacity-80">
        <span class="relative z-10">Insumos</span>
    </button>
</a>

    
<a href="../HTML/form-medica.php">
    <button class="relative h-12 w-40 overflow-hidden border border-blue-600 text-blue-600 shadow-2xl transition-all duration-200 before:absolute before:bottom-0 before:left-0 before:right-0 before:top-0 before:m-auto before:h-0 before:w-0 before:rounded-sm before:bg-blue-600 before:duration-300 before:ease-out hover:text-white hover:shadow-blue-600 hover:before:h-40 hover:before:w-40 hover:before:opacity-80">
        <span class="relative z-10">Medicamentos</span>
    </button>
</a>
    

<a href="../HTML/form-equipo.php">
    <button class="relative h-12 w-40 overflow-hidden border border-blue-600 text-blue-600 shadow-2xl transition-all duration-200 before:absolute before:bottom-0 before:left-0 before:right-0 before:top-0 before:m-auto before:h-0 before:w-0 before:rounded-sm before:bg-blue-600 before:duration-300 before:ease-out hover:text-white hover:shadow-blue-600 hover:before:h-40 hover:before:w-40 hover:before:opacity-80">
        <span class="relative z-10">Equipo medicos</span>
    </button>
</a>
  </div>
  </body>
    <script>
        // Script para mostrar/ocultar el menú desplegable al hacer clic en "Donaciones"
        const donacionesMenu = document.getElementById('donaciones-menu');
        const donacionesMenuItems = document.getElementById('donaciones-menu-items');
        donacionesMenu.addEventListener('click', () => {
            donacionesMenuItems.classList.toggle('hidden');
        });

        // Script para mostrar/ocultar el menú desplegable al hacer clic en "Donaciones"
        const donacionesMenuCate = document.getElementById('donaciones-menu-cate');
        const donacionesMenuItemsCate = document.getElementById('donaciones-cate-items');
        donacionesMenuCate.addEventListener('click', () => {
            donacionesMenuItemsCate.classList.toggle('hidden');
        });

        // Script para mostrar/ocultar el menú desplegable del usuario al hacer clic en el botón del usuario
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');
        userMenuButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });
        // Script para mostrar/ocultar el menú desplegable de donaciones al hacer clic en el botón de donaciones
        const hospitalesMenuButton = document.getElementById('hospitales-menu');
        const hospitalesMenuItems = document.getElementById('hospitales-menu-items');
        hospitalesMenuButton.addEventListener('click', () => {
            hospitalesMenuItems.classList.toggle('hidden');
        });
    </script>
</html>