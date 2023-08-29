$(document).ready(function(){
    tablaregistro = $("#tablaHospitales").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formHospitales").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Hospital");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    

$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    lugar = fila.find('td:eq(3)').text();
    //lugar = parseInt(fila.find('td:eq(3)').text());
    
    $("#nombre").val(nombre);
    $("#descripcion").val(descripcion);
    $("#lugar").val(lugar);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Hospital");            
    $("#modalCRUD").modal("show");  
    
});
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro del hospital: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud_hospitales.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablahospitales.row(fila.parents('tr')).remove().draw();
                location.reload();
            }
            
        });
    }   
});
    
$("#formHospitales").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    descripcion = $.trim($("#descripcion").val());
    lugar = $.trim($("#lugar").val()); 
    contra = $.trim($("#contra").val()); // Cambio de "password" a "contra"
    $.ajax({
        url: "bd/crud_hospitales.php",
        type: "POST",
        dataType: "json",
        data: {nombre: nombre, descripcion: descripcion, lugar: lugar, contra: contra, id: id, opcion: opcion}, // Cambio de "password" a "contra"
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            descripcion = data[0].descripcion;
            lugar = data[0].lugar;
            contra = data[0].contra;
                
                if(opcion == 1){
                    tablaregistro.row.add([id, nombre, descripcion, lugar, contra]).draw();
                } else {
                    tablaregistro.row(fila).data([id, nombre, descripcion, lugar]).draw();
                }  
            location.reload();          
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
    
});
