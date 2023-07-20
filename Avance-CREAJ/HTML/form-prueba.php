<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cita</title>
  <link rel="stylesheet" href="../CSS/Citas.css">
  <link rel="shortcut icon" href="../Imagenes/favicon.png" />
</head>
<body>
    <?php
    include("../PHP/conex.php");

    if (!empty($_POST["registro"])) {
        session_start();
        $usuarioId = $_SESSION['id']; // Asignar el usuario_id almacenado en la sesión a $usuarioId
    
        if (empty($_POST["nombre"]) || empty($_POST["edad"]) || empty($_POST["problem"]) || empty($_POST["date"])) {
            echo '<script language="javascript">window.location.href="../HTML/Citas.php";alert("Uno de los campos está vacío");</script>';
        } else {
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];
            $problema = $_POST["problem"];
            $date = $_POST["date"];
    
            // Insertar la cita asociada al usuario ID
            $sql = "INSERT INTO donacion (nombre, edad, problema, date, usuario_id) VALUES ('$nombre', '$edad', '$problema', '$date', '$usuarioId')";
    
            // Ejecutar la consulta
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                echo '<script language="javascript">window.location.href="../HTML/Index.php";alert("Cita registrada correctamente");</script>';
            } else {
                echo '<script language="javascript">window.location.href="../HTML/Citas.php";alert("Error en el registro de la cita: ' . mysqli_error($conn) . '");</script>';
            }
        }
    }
    ?>
<form class="form" method="POST">
  <h2>Dinos qué está pasando, así nuestros especialistas podrán darte un mejor servicio</h2>
  <p>Nombre: <input name="nombre" placeholder="Escribe tu nombre aquí"></p>
  <p>Edad: <input type="number" name="edad" placeholder="¿Cuál es tu edad?"></p>
  <p>Mensaje: <input name="problem" placeholder="¿Cuál es el problema que presenta el paciente?"></p>
  <p>Fecha: <input type="date" name="date" placeholder="Fecha estimada para la consulta"></p>
  <p><input name="registro" class="boton" type="submit" value="Registrar"></p>
  <div>
    <span class="fa fa-phone"></span>001 1023 567
    <span class="fa fa-envelope-o"></span>dehechoundentista@gmail.com
  </div>
</form>
<button onclick="window.history.back();" class="boton-regresar">Regresar</button>
</body>
</html>

