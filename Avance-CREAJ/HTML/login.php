<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../CSS/login.css" >
    <title>SaludRural</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../php/login.php" class="sign-in-form" method="post">
            <h2 class="title">Inicio de sesión</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Correo electrónico" name="correo" required>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Contraseña" name="contraseña" minlength="6" maxlength="10" required>
            </div>
            <input type="submit" value="INGRESAR" class="btn solid">
          </form>
          <form action="../php/registro.php" class="sign-up-form" method="post">
            <h2 class="title">Regístrate</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Nombre" name="nombre" required>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Apellido" name="apellidos" required>
              </div>
              <div class="input-field">
                <i class="fas fas fa-phone"></i>
                <input type="tel" placeholder="Teléfono" name="telefono" minlength="8" maxlength="11" required>
                </div>
                <div class="input-field">
                  <i class="fas far fa-id-card"></i>
                  <input type="tel" placeholder="DUI" name="dui" minlength="10" maxlength="12" required>
                  </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Correo electrónico" name="email" required>
            </div>
            <div class="input-field">
             <i class="fas fa-lock"></i>
              <input type="password" placeholder="Contraseña" name="contra" minlength="6" maxlength="10" required>
                  </div>
                  <input type="submit" class="btn" value="CREAR CUENTA">
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>¿Nuevo aquí?</h3>
            <p>
            ¡Regístrate ahora!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              REGISTRARME
            </button>
          </div>
          <img src="../IMAGENES/mano.png" class="image" alt="" >
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>¿Ya tienes cuenta?</h3>
            <p>
              ¡Inicia sesión y haz tu donación ahora!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Iniciar sesión
            </button>
          </div>
          <img src="../IMAGENES/mano-login.png" class="image" alt="" >
        </div>
      </div>
    </div>

    <script src="../JS/app.js"></script>
  </body>
</html>

