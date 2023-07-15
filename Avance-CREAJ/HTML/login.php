<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../CSS/login.css" >
    <title>Salud Rural</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../php/login.php" class="sign-in-form" method="post">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Correo" name="correo">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Contraseña" name="contraseña">
            </div>
            <input type="submit" value="Login" class="btn solid" >
          </form>
          <form action="../php/registro.php" class="sign-up-form" method="post">
            <h2 class="title">Registro</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Nombre" name="nombre" >
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Apellido" name="apellidos">
              </div>
              <div class="input-field">
                <i class="fas fas fa-phone"></i>
                <input type="text" placeholder="Telefono" name="telefono">
                </div>
                <div class="input-field">
                  <i class="fas far fa-id-card"></i>
                  <input type="text" placeholder="dui" name="dui">
                  </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Correo" name="email">
            </div>
            <div class="input-field">
             <i class="fas fa-lock"></i>
              <input type="password" placeholder="Contraseña" name="contra">
                  </div>
                  <input type="submit" class="btn" value="Sign up" >
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>¿Nuevo aqui?</h3>
            <p>
              Registrate ahora!!!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="../IMAGENES/mano.png" class="image" alt="" >
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>¿Ya tienes cuenta?</h3>
            <p>
              Inicia sesion y dona ahora!!!  
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Iniciar sesion
            </button>
          </div>
          <img src="../IMAGENES/mano-login.png" class="image" alt="" >
        </div>
      </div>
    </div>

    <script src="../JS/app.js"></script>
  </body>
</html>

