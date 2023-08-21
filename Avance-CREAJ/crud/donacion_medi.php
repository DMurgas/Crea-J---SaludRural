<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Donaciones Medicamentos</h1>

   
    <br>  

<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">         
                        <table id="tablaHospitales" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Donador</th>
                                <th>Para</th>
                               <th>fecha</th>
                                <th>Correo</th>                                
                                <th>Medicamento</th>  
                                <th>cantidad</th>  
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <?php include'info/info-medi.php' ?>     
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      

      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_hospitales_2.php"?>