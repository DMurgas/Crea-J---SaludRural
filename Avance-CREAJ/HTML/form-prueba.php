<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario Multipasos :: Urian Viera</title>
    <link rel="stylesheet" href="../CSS/form-donaciones.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
    <div class="container">
      <header>Realizar una donacion</header>
      <div class="progress-bar">
        <div class="step">
          <p>Paso 1</p>
          <div class="bullet">
            <span>1</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Paso 2</p>
          <div class="bullet">
            <span>2</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Paso 3</p>
          <div class="bullet">
            <span>3</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Fin</p>
          <div class="bullet">
            <span>4</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
      </div>
      <div class="form-outer">
        <form action="#">
          <div class="page slide-page">
            <div class="field">
              <div class="label">Nombre Completo</div>
              <input type="text" required>
            </div>
            <div class="field">
              <div class="label">Correo Electronico</div>
              <input type="text" required>
            </div>
            <div class="field">
              <button class="firstNext next">Siguiente</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Información de Contacto</div>
            <div class="field">
              <div class="label">Número de Telefono</div>
              <input type="Number" required>
            </div>
            <div class="field">
              <div class="label">Genero</div>
              <select>
                <option>Masculino</option>
                <option>Femenino</option>
              </select>
            </div>
            <div class="field btns">
              <button class="prev-1 prev">Atrás</button>
              <button class="next-1 next">Siguiente</button>
            </div>
          </div>

          <div class="page">
            <div class="field">
              <div class="label">Fecha de la donacion</div>
              <input type="datetime-local"required>
            </div>
            <div class="field">
              <div class="label">Monto a donar</div>
              <input type="number" required>
            </div>
            <div class="field btns">
              <button class="prev-2 prev">Atrás</button>
              <button class="next-2 next">Siguiente</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Datos de tarjeta</div>
            <div class="field">
              <div class="label">Numero de tarjeta</div>
              <input type="text" required>
            </div>
            <div class="field">
              <div class="label">CVV</div>
              <input type="password" required>
            </div>
            <div class="field btns">
              <button class="prev-3 prev">Atrás</button>
              <button class="submit">Enviar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="../JS/donaciones.JS"></script>
    <button onclick="window.history.back();" class="boton-regresar">Regresar</button>
  </body>
</html>
