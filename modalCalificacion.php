<?php
require("business/Administrator.php");
require("business/LogAdministrator.php");
require("business/Estudiante.php");
require("business/Curso.php");
require("business/EstadoEstudiante.php");
require("business/Area.php");
require("business/Asignatura.php");
require("business/Logro.php");
require("business/TipoLogro.php");
require("business/LogProfesor.php");
require("business/Profesor.php");
require("business/CursoAsignaturaProfesor.php");
require("business/Periodo.php");
require("business/Calificacion.php");
require("business/TipoCalificacion.php");
require("business/LogSecretaria.php");
require("business/Secretaria.php");
require_once("persistence/Connection.php");
$idEstudiante = $_GET['idEstudiante'];
$estudiante = new Estudiante($idEstudiante);
$estudiante->select();

$idAsignatura = $_GET['idAsignatura'];
$asignatura = new Asignatura($idAsignatura);
$asignatura->select();
?>
<script charset="utf-8">
    $(function() {
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Calificar Estudiante</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="container-fluid" style="background-color: #EAF1F9;">
        <div class="row ">
            <div class="col-12 mt-2 mb-1">
                <div class="container bg-white p-2" style=" border-radius: 15px;">
                    <div class="row">
                        <div class="col-8 >
                            Estudiante: <span class=" font-weight-bold"><?php echo $estudiante->getNombre() . " " . $estudiante->getApellido() ?></span>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <span class="text-secondary"> Periodo: 4</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-1">
                <div class="container bg-white p-2" style=" border-radius: 15px;">
                    <div class="row">
                        <div class="col-12">
                            <span class="font-weight-bold">Asignatura:</span> <span><?php echo " " . $asignatura->getNombre() ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-1">
                <div class="container bg-white p-2" style=" border-radius: 15px;">
                    <div class="row">
                        <div class="col-12">
                            <span class="font-weight-bold">Seleccione logros:</span> <span class="font-italic"> Máximo 5 logros</span>
                            <div class="mt-2">
                                <table class="table table-sm ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $logro = new Logro("","","",$idAsignatura);
                                        $logros = $logro -> selectAllByAsignatura();
                                        $counter="";
                                        //foreach($logros as $currentlogro){
                                            echo "<tr>";
                                            echo "<td></td>";
                                            echo "<td><input type='checkbox'></td>";
                                            echo "<td>Lorem voluptatem placeat.</td>";
                                            echo "<td>@mdo</td>";
                                            echo "</tr>";
                                            $counter++;
                                    //}
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Enviar nota</button>
</div>