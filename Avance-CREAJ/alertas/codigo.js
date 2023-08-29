$(document).ready(function() {
  $("#btn1").click(function() {
      // Mostrar la alerta
      showAlert('Enviando...', 'Su donación ha sido realizada correctamente!');

      // Manejar el clic en el botón "Cerrar"
      $("#closeBtn").click(function() {
          // Redirigir al usuario a otra página
          window.location.href = "https://www.otra-pagina.com";
      });
  });

  });    
        