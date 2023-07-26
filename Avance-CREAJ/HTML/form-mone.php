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
        <form action="../PHP/registrar_donacion_2.php" method="post">
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
            <div class="label">Género</div>
              <select name="genero">
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
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
              <input type="date" name="fecha" required>
            </div>
            <div class="field">
              <div class="label">Monto a donar</div>
              <input type="number"name="monto" required>
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
