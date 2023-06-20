<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/login.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
    <img src="../IMAGENES/wave.png"  class="wave">
    <div class="container">
        <div class="img">
            <img src="../IMAGENES/bg.svg" >
        </div>
        <div class="login-container">
            <form action="../PHP/inicio.php" method="post">
                <img src="../IMAGENES/avatar.svg" class="avatar">
                <h2>BIENVENIDO</h2>
                <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Usuario</h5>
                        <input type="text" class="input" name="username">
                    </div>
                </div>
                <div class="input-div two focus">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Contraseña</h5>
                        <input type="password" class="input" name="password">
                    </div>
                </div>
                <a href="#">¿Has olvidado la contraseña?</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../JS/main.JS"></script>
</body>
</html>
