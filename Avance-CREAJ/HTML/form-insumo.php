<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Donacion de insumos medicos </title>
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
        <form action="../PHP/form-donacion-insumos.php" method="post">
          <div class="page slide-page">
            <div class="field">
              <div class="label">Nombre Completo</div>
              <input type="text" required name="nombre">
            </div>
            <div class="field">
              <div class="label">Fecha de la donacion</div>
              <input type="date"required name="fecha">
            </div>
            <div class="field">
              <button class="firstNext next">Siguiente</button>
            </div>
          </div>

          <div class="page">
            <div class="title">Información de Contacto</div>
            <div class="field">
              <div class="label">Cantidad</div>
              <input type="Number" required name="telefono">
            </div>
            <div class="field">
            <div class="label">Tipo de insumo</div>
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
              <div class="label">Descripcion</div>
              <input type="date"required name="fecha">
            </div>
            <div class="field">
              <div class="label">Proveedor</div>
              <input type="number" required name="monto">
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
