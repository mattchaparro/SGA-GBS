<?php

$idAsignatura = $_GET['idAsignatura'];
$periodo = $_GET['periodo'];
$logro = new Logro("", "", "", $idAsignatura, "", $periodo);
$logros = $logro->selectAllByAsignaturaPeriodo();

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
