 // Obtener el elemento de entrada de fecha
 var fechaInput = document.getElementById('fecha');

 // Obtener la fecha y hora actual
 var fechaActual = new Date();
 var fechaActualFormatted = fechaActual.toISOString().slice(0, 16); // Formato YYYY-MM-DDTHH:MM

 // Establecer el valor mínimo en la fecha y hora actual
 fechaInput.min = fechaActualFormatted;

 // Agregar un controlador de eventos para asegurarse de que no se pueda seleccionar una fecha pasada
 fechaInput.addEventListener('input', function () {
     if (fechaInput.value < fechaActualFormatted) {
         fechaInput.value = fechaActualFormatted;
     }
 });