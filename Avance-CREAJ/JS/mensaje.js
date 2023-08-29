
document.addEventListener("DOMContentLoaded", function() {
  const inputArchivo = document.getElementById("nueva-imagen");
  const mensajeSinArchivo = document.getElementById("sin-archivo-mensaje");

  inputArchivo.addEventListener("change", function() {
    if (inputArchivo.files.length > 0) {
      mensajeSinArchivo.style.display = "none";
    } else {
      mensajeSinArchivo.style.display = "inline";
    }
  });
});
