$(document).ready(function() {
    $('#formLogin').submit(function(e) {
      e.preventDefault();
      
      var correo = $.trim($("#correo").val());    
      var contra = $.trim($("#contra").val());    
      
      if (correo.length === 0 || contra.length === 0) {
        Swal.fire({
          icon: 'warning',
          title: 'Debe ingresar un correo y/o contraseña',
        });
      } else {
        $.ajax({
          url: "../PHP/login.php",
          type: "POST",
          dataType: "json",
          data: { correo: correo, contra: contra }, 
          success: function(data) {               
            if (data === "null") {
              Swal.fire({
                icon: 'error',
                title: 'Correo y/o contraseña incorrecta',
              });
            } else {
              Swal.fire({
                icon: 'success',
                title: '¡Conexión exitosa!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ingresar'
              }).then(function(result) {
                if (result.value) {
                  window.location.href = "../HTML/index.php";
                }
              });
            }
          }    
        });
      }     
    });
  });
