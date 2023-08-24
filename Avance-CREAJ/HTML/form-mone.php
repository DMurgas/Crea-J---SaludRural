<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Donacion monetaria</title>
    
    <link rel="stylesheet" href="../CSS/form-donaciones.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
  </head>
  <style>
      /* INICIO DE EL ESTILO DE EL TRADUCTOR */

/* Quita el texto (Con la tecnologia de) */
div .skiptranslate.goog-te-gadget, .goog-te-combo .dark{
    font-size: 0%;
  }
  
  /* Quita el texto (Traductor de google) */
  div .skiptranslate.goog-te-gadget span a{
    font-size: 0;
  }
  
  /* Cambia el estilo del boton para seleccionar el idioma */
  div .goog-te-combo{
            color: #000000;
            font-weight: bold;
            cursor: pointer;
            border: none;
            border-radius: 10px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            padding: 10px 20px;
            transition: background-color 0.1s, color 0.1s;
  }
  div .goog-te-combo:hover{
    background-color: blue;
    color: #ffffff;
  }
  /* Cambia el tamaño y mueve la parte azul del traductor*/
  .VIpgJd-ZVi9od-ORHb-OEVmcd.skiptranslate , .VIpgJd-ZVi9od-ORHb{
    width: 55%;
    top: 1.5%;
    left: -52.9%;
  }
  
  /* Cambia el estilo de la lista de idiomas del menú del traductor */
  .goog-te-combo option{
    background-color: #ffffff;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: bold;
    color: #000000;
    -webkit-o-border-radius: 10px;
    -moz-o-border-radius: 10px;
    -ms-o-border-radius: 10px;
  }
  
  /* Hace invisible la imagen de "Google" */
  a img{
    width: 0;
  }
  
  /* FIN DE EL DISEÑO DE EL TRADUCTOR */
    </style>
<body>
    <div id="google_translate_element"></div>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="../JS/traductor.js"></script>

    <a href="boton-donaciones.php">
    <button class="back-button" >
    <i class="fas fa-arrow-left"></i> Volver atrás
    </button></a>
    
    <div class="container">
    
      <header>Donación monetaria</header>
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
        <form action="../PHP/form-donacion-monetaria.php" method="post">
          <div class="page slide-page">
            <div class="field">
              <div class="label">Nombre completo</div>
              <input type="text" name="nombre" required>
            </div>
            <div class="field">
              <div class="label">Correo electrónico</div>
              <input type="text" name="correo" required>
            </div>
            <div class="field">
              <button class="firstNext next">Siguiente</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Información de contacto</div>
            <div class="field">
              <div class="label">Número de teléfono</div>
              <input type="Number" name="telefono" required>
            </div>
            <div class="field">
            <div class="label">Nombre del hospital</div>
            <select name="hospital" required>
            <?php
                // Realizar la conexión a la base de datos
                $db_host = 'localhost';
                $db_username = 'root';
                $db_password = '';
                $db_name = 'saludrural';
                $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Consulta para obtener los hospitales desde la tabla 'tabla_hospitales'
                $sql = "SELECT id, nombre FROM hospitales";
                $result = $conn->query($sql);

                // Mostrar los nombres de los hospitales en el dropdown
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["id"] . '">' . $row["nombre"] . '</option>';
                    }
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </select>
        </div>
            <div class="field btns">
              <button class="prev-1 prev">Atrás</button>
              <button class="next-1 next">Siguiente</button>
            </div>
          </div>

          <div class="page">
          <div class="field">
          <div class="label">Fecha de la donación</div>
            <input type="datetime-local" id="fecha" name="fecha" required>
            <script src="../JS/validar-fechas.js"></script>
          </div>


            <div class="field">
              <div class="label">Monto a donar</div>
              <input type="number" name="monto" required min="5" max="1700">
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
              <input type="text" name="tarjeta" required>
            </div>
            <div class="field">
              <div class="label">CVV</div>
              <input type="password" name="cvv" required>
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
  </body>
</html>
