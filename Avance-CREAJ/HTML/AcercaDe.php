<?php
session_start();
error_reporting(0);

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo']) || empty($_SESSION['correo'])) {
    echo '<script language="javascript">alert("Por favor inicie sesión o regístrese");window.location.href="../HTML/login.php"</script>';
    die();
} else {
    include("../PHP/conex.php");

    // Consulta SQL para obtener el ID del usuario según el correo electrónico
    $correo = $_SESSION['correo'];
    $query = "SELECT id FROM registro WHERE correo = '$correo'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="shortcut icon" href="../Imagenes/favicon.png" />
        <title>Acerca De</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    </head>
    <nav class="bg-white p-4">
      <div class="flex justify-between items-center">
          <!-- Logo o nombre del sitio -->
          <div class="logo"><img src="../Imagenes/logo.png" width="150" height="90"></div>

          <!-- Menú de navegación -->
          <ul class="flex space-x-4">
              <li><a href="Index.php" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Inicio</a></li>
              <li class="relative">
                  <!-- Enlace con menú desplegable -->
                  <a href="#" class="text-black hover:bg-green-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="donaciones-menu">
                      <span>Donaciones</span>
                      <i class="fas fa-chevron-down ml-1"></i> <!-- Flecha hacia abajo -->
                  </a>

                  <!-- Menú desplegable -->
                  <ul class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md rounded-md hidden" id="donaciones-menu-items">
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Medicamentos</a></li>
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Equipos medicos</a></li>
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Isumos medicos</a></li>
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Monetaria</a></li>
                      <li><a href="donaciones-reali.php" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Realizadas</a></li>
                  </ul>
              </li>
              <li><a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Blog</a></li>
              <li><a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Nosotros</a></li>
              <li class="relative">
                  <!-- Enlace con menú desplegable -->
                  <a href="#" class="text-black hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="hospitales-menu">
                      <span>Hospitales</span>
                      <i class="fas fa-chevron-down ml-1"></i> <!-- Flecha hacia abajo -->
                  </a>

                  <!-- Menú desplegable -->
                  <ul class="absolute top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md rounded-md hidden" id="hospitales-menu-items">
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Necesidades actuales</a></li>
                      <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-600 hover:text-white">Historias de exito</a></li>
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

  <body class="bg-gray-100">
  <div class="container mx-auto p-8">
    <div class="text-center">
      <h1 class="text-4xl font-bold text-black mb-4">¡Bienvenido a SaludRural!</h1>
      <p class="text-xl text-black">Ayudando a mejorar la salud en las comunidades rurales de El Salvador</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
      <div class="text-center p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Sobre Nosotros</h2>
        <p class="text-gray-600">Somos una organización que busca marcar la diferencia en las comunidades más necesitadas de El Salvador, especialmente aquellas ubicadas en zonas rurales. Nuestra misión es proporcionar apoyo a hospitales y centros médicos para mejorar la atención médica y el bienestar de la población en estas áreas marginadas.</p>
        <img src="../Imagenes/CajaDonativos.png" class="mx-auto mt-6 rounded-lg" width="250" height="200" alt="imagen">
      </div>
      <div class="text-center p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Nuestra Visión</h2>
        <p class="text-gray-600">En SaludRural, creemos en un futuro donde todas las comunidades rurales tengan acceso a una atención médica de calidad. Nos esforzamos por establecer alianzas sólidas y transparentes con donantes comprometidos para marcar un cambio significativo en la salud y el bienestar de las personas que más lo necesitan.</p>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
      <div class="text-center p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Nuestra Misión</h2>
        <p class="text-gray-600">Facilitar donaciones seguras y directas a hospitales y centros médicos en zonas rurales de El Salvador, canalizando recursos para mejorar la atención médica y el bienestar de las comunidades más vulnerables.</p>
      </div>
      <div class="text-center p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Nuestros Valores</h2>
        <p class="text-gray-600">Transparencia, compromiso, solidaridad y equidad son los valores fundamentales que guían nuestro trabajo en SaludRural.</p>
      </div>
      <div class="text-center p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Únete a Nosotros</h2>
        <p class="text-gray-600">Si compartes nuestra visión y deseas ser parte del cambio en la atención médica de las comunidades rurales, únete a SaludRural y hagamos la diferencia juntos.</p>
      </div>
    </div>
  </div>
</body>


    <!-- Código del footer -->
    <footer class="bg-gray-800 text-center text-white py-8">
  <div class="container mx-auto">
    <p class="text-lg font-bold">SaludRural</p>
    <p class="text-sm mt-2 mb-4">Si deseas saber más información sobre nosotros, puedes buscarnos y contactarnos en nuestras redes sociales.</p>
    <div class="flex justify-center space-x-4 mb-4">
      <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
      <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
      <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
      <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <ul class="flex items-center justify-center space-x-4">
      <li><a href="#" class="text-gray-400 hover:text-white">Inicio</a></li>
      <li><a href="#" class="text-gray-400 hover:text-white">Donaciones</a></li>
      <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
      <li><a href="#" class="text-gray-400 hover:text-white">Acerca de</a></li>
    </ul>
  </div>
  <div class="footer-bottom">
        <p><small id="26">&copy; 2023 <b>SaludRural</b> - Todos los Derechos Reservados.</small></p>
      </div>
    </footer>
    
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
    const hospitalesMenuButton = document.getElementById('hospitales-menu');
    const hospitalesMenuItems = document.getElementById('hospitales-menu-items');
    hospitalesMenuButton.addEventListener('click', () => {
        hospitalesMenuItems.classList.toggle('hidden');
    });
</script>
</html>