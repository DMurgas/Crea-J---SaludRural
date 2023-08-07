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
        <link rel="stylesheet" href="../CSS/AcercaDe.css">
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

    <body>
      <!-- Código del slider carrusel -->
      <!--<div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active c-item">
            <img src="../Imagenes/Fondo1.jpeg" class="d-block w-100 c-img" alt="...">
          </div>
          <div class="carousel-item c-item">
            <img src="../Imagenes/Imagen2.png" class="d-block w-100 c-img" alt="...">
          </div>
          <div class="carousel-item c-item">
            <img src="../Imagenes/Fondo3.jpeg" class="d-block w-100 c-img" alt="...">
          </div>
        </div>
      </div>-->

      <!-- Código de la info Sobre Nosotros -->
      <div class="container1">
        <div class="text">
          <h2 class="subtitle">
            <strong>Sobre Nosotros</strong>
          </h2>
          <p>Somos una organización que busca ayudar a la sociedad más necesitada de nuestro país <span class="bolded1">"El Salvador"</span>, a través de donaciones para hospitales y centros médicos que se encuentran en las zonas rurales del país, es decir, las comunidades marginadas y abandonadas que existen en todo el territorio nacional.</p>
        </div>
        <div class="image">
          <img class="donativoimg" src="../Imagenes/CajaDonativos.png" width="330" height="250" alt="imagen">
        </div>
      </div>
      
      <div class="container">
        <div class="paragraph">
          <p>Nuestro equipo está conformado por profesionales apasionados y comprometidos con la salud pública y la equidad en la atención médica. Trabajamos en estrecha colaboración con hospitales y centros médicos en áreas rurales para comprender sus necesidades y brindarles el apoyo necesario. Valoramos la transparencia y la responsabilidad en nuestro trabajo. Nos esforzamos por mantener una comunicación clara con nuestros donantes y socios, proporcionándoles actualizaciones sobre cómo se utilizan sus contribuciones y el impacto que están generando.</p>
        </div>
        <div class="paragraph">
          <p>En <span class="bolded">SaludRural</span>, creemos firmemente en el poder de la solidaridad y la generosidad. A través de nuestra plataforma, permitimos a personas y organizaciones donar de manera segura y directa a proyectos y necesidades específicas de los hospitales y centros médicos rurales. Facilitamos la conexión entre donantes y receptores, asegurando que cada donación tenga un impacto significativo y positivo en la vida de las personas. Estamos emocionados de ser parte del cambio y el progreso en la atención médica de las zonas rurales. <a href="../HTML/login.php"><span class="negra">Únete a nosotros en SaludRural</span></a> y juntos hagamos la diferencia en la salud y el bienestar de las comunidades rurales de nuestro país.</p>
        </div>
      </div>

      <div class="targets-container">
        <div class="target">
          <h3><strong>Misión</strong></h3>
          <p>Ser una organización que promueva y facilite las donaciones a hospitales y centros médicos ubicados en zonas rurales del país. <strong class="strongT">SaludRural</strong> se compromete a conectar de manera efectiva a los donantes con estas instituciones, brindando una plataforma segura y transparente para canalizar recursos y apoyar la atención médica en las comunidades más remotas y marginadas de todo el territorio nacional. Por último, impulsar un cambio significativo en la salud, promoviendo la equidad y la mejora de la calidad de vida de quienes más lo necesitan.</p>
        </div>
        <div class="target">
          <h3><strong>Visión</strong></h3>
          <p>Queremos lograr ser una organización líder en el ámbito de las donaciones a hospitales y centros médicos en zonas rurales del país. Nos esforzamos por ser el referente principal para aquellos que deseen contribuir al bienestar de las comunidades rurales a través de donaciones significativas y de impacto. Buscamos establecer alianzas sólidas con hospitales y centros médicos, así como con donantes comprometidos, para construir en un futuro una cultura de equidad, y que el acceso a la atención médica sea una realidad para todos, sin importar su ubicación geográfica. Aspiramos a ser reconocidos como un agente de cambio en la atención médica rural, mejorando la calidad de vida de las personas y generando un impacto duradero en la salud de la población salvadoreña.</p>
        </div>
      </div>
 
      <h2><strong>Historia de SaludRural</strong></h2>
      <p><strong>SaludRural</strong> nació como una idea en común de 5 estudiantes del <a href="https://www.cdb.edu.sv/"><strong>Colegio Don Bosco</strong></a>, estos estudiantes son: Xavier Zañas, Carlos López, David Murgas, César Serrano y Julio Jacinto. Estos jóvenes compartían una pasión común por ayudar a los demás y siempre estaban buscando formas de marcar una diferencia positiva en la sociedad.</p>
      <p>Un día, mientras se reunían en la biblioteca de la escuela para trabajar en un proyecto conjunto, surgió una idea que iluminó sus mentes. Se dieron cuenta de que muchas comunidades rurales cercanas carecían de acceso adecuado a servicios de salud, y esto les preocupaba profundamente. Decidieron unir fuerzas y crear una solución que pudiera marcar la diferencia en la vida de las personas en estas áreas.</p>
      <p>Así nació <strong>SaludRural</strong>, una organización sin fines de lucro con una visión clara: facilitar las donaciones a hospitales y centros médicos en zonas rurales a través de una plataforma web. Los cinco estudiantes se dedicaron por completo a este proyecto, invirtiendo su tiempo, esfuerzo y conocimientos en su desarrollo.</p>
      <p>Trabajaron arduamente para diseñar y construir una plataforma intuitiva y segura donde las personas pudieran realizar donaciones de manera fácil y transparente. Sabían que la confianza de los donantes era fundamental, por lo que se aseguraron de establecer medidas de seguridad robustas para proteger la privacidad y la integridad de las transacciones.</p>
      <p>La historia de SaludRural se convirtió en un ejemplo de cómo una simple idea, impulsada por la pasión y el deseo de ayudar, puede transformarse en una fuerza poderosa para el cambio. Los cinco estudiantes demostraron que no importa cuán jóvenes sean, si tienen una visión y trabajan juntos, pueden marcar una diferencia significativa en la sociedad.</p>
      <p>Hasta el día de hoy, SaludRural continúa su labor, creciendo y expandiéndose para llevar esperanza y mejorar la calidad de vida de las comunidades rurales a través de la solidaridad y la generosidad de aquellos que creen en su misión.</p>
    </body>

    <!-- Código del footer -->
    <footer>
      <div class="footer-content">
        <h3>SaludRural</h3>
        <p>Si deseas saber más información sobre nosotros, puedes buscarnos y contactarnos en nuestras redes sociales.</p>

        <!-- Íconos de las redes sociales -->
        <ul class="socials">
          <li><a href="" class="fab fa-facebook"></a></li>
          <li><a href="" class="fab fa-instagram"></a></li>
          <li><a href="" class="fab fa-twitter"></a></li>
          <li><a href="" class="fab fa-youtube"></a></li>
        </ul>
        
        <!-- Menú en el footer -->
        <div class="footer-menu">
          <ul class="f-menu">
            <li><a href="../HTML/Index.php"><strong>Inicio</strong></a></li>
            <li><a href="../HTML/donaciones-reali.php">Donaciones</a></li>
            <li><a href="../HTML/blog.php">Blog</a></li>
            <li><a href="">Acerca de</a></li>
          </ul>
        </div>
      </div>

      <!-- Footer sub-alterno -->
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