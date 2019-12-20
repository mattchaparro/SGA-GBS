<?php

$idAsignatura = $_GET['idAsignatura'];
$periodo = $_GET['periodo'];
$logro = new Logro("", "", "", $idAsignatura, "", $periodo);
$logros = $logro->selectAllByAsignaturaPeriodo();
if(count($logros)){ 
?>
<table class="table table-sm ">
    <tbody>
        <?php       
            foreach ($logros as $currentlogro) {
                echo "<tr>";
                echo "<td></td>";
                echo "<td><input type='checkbox' name='idLogros[]' value='" . $currentlogro->getIdLogro() . "'</td>";
                echo "<td>" . $currentlogro->getDescripcion() . "</td>";
                echo "<td>" . $currentlogro->getTipoLogro()->getNombre() . "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<?php }else{ ?>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        No existen logros para este periodo! <a href="#" class="alert-link">Haz clic aquí para crear un logro nuevo </a> 
    </div>
<?php  } ?>