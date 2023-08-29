<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id_donacion, id_usuario, id_hospital, correo, `telefono`, `fecha`, monto, estado FROM monetaria";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<tbody>
<?php
foreach ($data as $dat) {
    ?>
    <tr>

        <td><?php echo $dat['id_donacion'] ?></td>
        <td>
            <?php
            $id_usuario = $dat['id_usuario'];
            $consulta_usuario = "SELECT nombre FROM registro WHERE id = $id_usuario";
            $resultado_usuario = $conexion->prepare($consulta_usuario);
            $resultado_usuario->execute();
            $usuario = $resultado_usuario->fetch(PDO::FETCH_ASSOC);
            echo $usuario['nombre'];
            ?>
        </td>
        <td>
            <?php
            $id_usuario = $dat['id_hospital'];
            $consulta_usuario = "SELECT nombre FROM hospitales WHERE id = $id_usuario";
            $resultado_usuario = $conexion->prepare($consulta_usuario);
            $resultado_usuario->execute();
            $usuario = $resultado_usuario->fetch(PDO::FETCH_ASSOC);
            echo $usuario['nombre'];
            ?>
        </td>
        <td><?php echo $dat['fecha'] ?></td>
        <td><?php echo $dat['correo'] ?></td>
        <td><?php echo $dat['monto'] ?></td>
        <td><?php echo $dat['estado'] ?></td>
        <td>
            <?php
            if ($dat['estado'] == "Pendiente") {
                echo "<form action='bd/estado_mo.php' method='post'>";
                echo "<input type='hidden' name='id' value='{$dat["id_donacion"]}'>";
                echo "<select name='accion'>";
                echo "<option value='Aceptar'>Aceptar</option>";
                echo "<option value='Rechazar'>Rechazar</option>";
                echo "</select>";
                echo "<input type='submit' name='actualizar' value='Actualizar'>";
                echo "</form>";
            } 
            ?>
        
            <button class="btn btn-danger" data-toggle="modal" data-target="#eliminarModal">Eliminar</button>
        </td>
    </tr>
    <?php
}
?>
</tbody>
