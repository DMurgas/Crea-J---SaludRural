<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Donacion monetaria</title>
    <link rel="stylesheet" href="../CSS/form-donaciones.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
<body>

    <div class="container">
      <header>Donacion de insumos</header>
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
        <form action="../PHP/form-donacion-insumos.php" method="post">
          <div class="page slide-page">
            <div class="field">
              <div class="label">Nombre Completo</div>
              <input type="text" name="nombre" required>
            </div>
            <div class="field">
              <div class="label">Correo Electronico</div>
              <input type="text" name="correo" required>
            </div>
            <div class="field">
              <button class="firstNext next">Siguiente</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Información de Contacto</div>
            <div class="field">
              <div class="label">Número de Telefono</div>
              <input type="Number" name="telefono" required>
            </div>
            <div class="field">
              <div class="label">Fecha de la donacion</div>
              <input type="datetime-local" name="fecha" required>
            </div>
            <div class="field btns">
              <button class="prev-1 prev">Atrás</button>
              <button class="next-1 next">Siguiente</button>
            </div>
          </div>

          <div class="page">
            <div class="field">
              <div class="label">Nombre del insumo medico</div>
              <input type="text" name="insumo" required>
            </div>
            <div class="field">
              <div class="label">Cantidad de insumo medico</div>
              <input type="number"name="cantidad" required>
            </div>
            <div class="field btns">
              <button class="prev-2 prev">Atrás</button>
              <button class="next-2 next">Siguiente</button>
            </div>
          </div>

          <div class="page">
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
            <div class="field">
              <div class="label">Descripcion del insumo</div>
              <input type="text" placeholder="Informacion del insumo" name="descripcion" required>
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
