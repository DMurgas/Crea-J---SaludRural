$(document).ready(function(){
    tablaregistro = $("#tablanecesidades").DataTable({
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
    $("#formnecesidades").trigger("reset");
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
    titulo = fila.find('td:eq(1)').text();
    contenido = fila.find('td:eq(2)').text();
    lugar = fila.find('td:eq(3)').text();
    //lugar = parseInt(fila.find('td:eq(3)').text());
    
    $("#titulo").val(titulo);
    $("#contenido").val(contenido);
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
            url: "bd/crud_necesidades.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablanecesidades.row(fila.parents('tr')).remove().draw();
                location.reload();
            }
            
        });
    }   
});
    
$("#formnecesidades").submit(function(e){
    e.preventDefault();    
    titulo = $.trim($("#titulo").val());
    contenido = $.trim($("#contenido").val());
    lugar = $.trim($("#lugar").val()); 
    $.ajax({
        url: "bd/crud_necesidades.php",
        type: "POST",
        dataType: "json",
        data: {titulo:titulo, contenido:contenido, lugar:lugar, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            titulo = data[0].titulo;
            contenido = data[0].contenido; 
            lugar = data[0].lugar;
            if(opcion == 1){tablanecesidades.row.add([id,titulo,contenido,lugar]).draw();}
            else{tablanecesidades.row(fila).data([id,titulo,contenido,lugar]).draw();}  
            location.reload();          
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
    
});