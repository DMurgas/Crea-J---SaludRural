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
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SaludRural</title>
    <link rel="shortcut icon" href="../Imagenes/favicon.png" />
    <link rel="stylesheet" href="../CSS/nav-menu.css">
  </head>
  <body>
    <header>
      <div class="navbar">
        <div clas="logo"><a href="#">SaludRural</a></div>
        <ul class="links">
          <li><a href="#"><strong>Inicio</strong></a></li>
          <li><a href="../HTML/donaciones-reali.php">Donaciones</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="../HTML/AcercaDe.html">Acerca de</a></li>
        </ul>
        <a href="../PHP/cerrar.php" class="action_btn"><strong>Cerrar sesion</strong></a>
        <div class="toggle_btn">
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>

      <div class="dropdown_menu">
        <li><a href="#"><strong>Inicio</strong></a></li>
        <li><a href="#">Donaciones</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="../HTML/AcercaDe.html">Acerca de</a></li>
        <li><a href="../PHP/cerrar.php" class="action_btn"><strong>Cerrar sesion</strong></a></li>
      </div>
    </header>

    <main>
      <section id="hero">
        <h1>¡Bienvenido a SaludRural!</h1>
        <p>
          Ayudanos a apoyar a los mas necesitados
        </p></br>
        </p>
      </section>
    </main>

    <script>
      const toggleBtn = document.querySelector('.toggle_btn')
      const toggleBtnIcon = document.querySelector('.toggle_btn i')
      const dropDownMenu = document.querySelector('.dropdown_menu')

      toggleBtn.onclick = function () {
        dropDownMenu.classList.toggle('open')
        const isOpen = dropDownMenu.classList.contains('open')

        toggleBtnIcon.classList = isOpen
        ?'fa-solid fa-xmark'
        :'fa-solid fa-bars'
      }

    </script>
    

  </body>
</html>