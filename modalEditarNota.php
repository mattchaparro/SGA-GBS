<?php
require("business/Administrator.php");
require("business/LogAdministrator.php");
require("business/Estudiante.php");
require("business/Curso.php");
require("business/Grado.php");
require("business/EstadoEstudiante.php");
require("business/Area.php");
require("business/Asignatura.php");
require("business/Logro.php");
require("business/LogrosCalificacion.php");
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

$idNota = $_GET['idCalificacion'];

$periodo = new Periodo(1);
$periodo -> select();
$periodoCurso = $periodo -> getEncurso();

$logro = new Logro("", "", "", $idAsignatura, "", $periodoCurso);
$logros = $logro->selectAllByAsignaturaPeriodo();

$logCal = new LogrosCalificacion("", $idNota);
$logrosCalificacion = $logCal -> selectAllByCalificacion();

$idLogros = array();
foreach ($logrosCalificacion as $lc){
    $idLogro = $lc -> getLogro() -> getIdLogro();
    array_push($idLogros, $idLogro);
}


//Edicion
//Notas por tipo: 
    /*
    1. Procedimental
    2. Actitudinal
    3. Conceptual
    4. Definitiva
    */

$calConceptual = new Calificacion("","","",3,"",$idEstudiante, $idAsignatura);
$notaConceptual = $calConceptual -> selectNotaByPeriodo($periodoCurso);

$calProcedimental = new Calificacion("","","",1,"",$idEstudiante, $idAsignatura);
$notaProcedimental = $calProcedimental -> selectNotaByPeriodo($periodoCurso);

$calActitudinal = new Calificacion("","","",2,"",$idEstudiante, $idAsignatura);
$notaActitudinal = $calActitudinal -> selectNotaByPeriodo($periodoCurso);


$objCa = new Calificacion ($idNota);
$objCa -> select();
$fallas = $objCa -> getFallas();
?>
<script charset="utf-8">
    $(function() {
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Editar Estudiante</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form id="form_subir_nota" action="index.php?pid=<?php echo base64_encode("ui/profesor/evaluarEstudiante.php")?>&idMateria=<?php echo $idAsignatura ?>&idEstudiante=<?php echo $idEstudiante?>" method="post">
    <div class="modal-body">
        <div class="container-fluid" style="background-color: #EAF1F9;">
            <div class="row ">
                <div class="col-12 mt-2 mb-1">
                    <div class="container bg-white p-2" style=" border-radius: 15px;">
                        <div class="row">
                            <div class="col-12 col-md-8 ">
                                Estudiante: <span class=" font-weight-bold "><?php echo $estudiante->getNombre() . " " . $estudiante->getApellido() ?></span>
                            </div>
                            <div class="col-8 col-md-4 d-flex justify-content-center justify-content-md-end">
                                    <span class=" font-weight-bold mr-2">Periodo: <?php echo $periodoCurso ?></span>
                                    <!--<select class="custom-select periodo" id="periodo" name="periodo">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select> -->
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
                                <div class="mt-2" id="logrosAsignatura">
                                <?php if(count($logros)){   ?>
                                <table class="table table-sm ">
                                    <tbody>
                                        <?php
                                               
                                            foreach ($logros as $currentlogro) {
                                                
                                                echo "<tr>";
                                                echo "<td></td>";
                                                if(in_array($currentlogro -> getIdLogro(), $idLogros)){
                                                    echo "<td><input type='checkbox' name='idLogros[]' value='" . $currentlogro->getIdLogro() . "' checked></td>";
                                                }else{
                                                    echo "<td><input type='checkbox' name='idLogros[]' value='" . $currentlogro->getIdLogro() . "'></td>";
                                                }
                                                echo "<td>" . $currentlogro->getDescripcion() . "</td>";
                                                echo "<td>" . $currentlogro->getTipoLogro()->getNombre() . "</td>";
                                                echo "</tr>";
                                                
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php } else {?>
                                    <div class="alert alert-danger mt-2" id="alertLogros">
                                    No existen logros para este periodo! <a href="#" class="alert-link">Haz clic aquí para crear un logro nuevo </a> 
                                     </div>
                                <?php } ?>
                                </div>
                                
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold">Ingrese las calificaciones</span> <br>
                            <span class="font-weight-bold text-muted"><small>Utilice el punto '.' para representar la coma decimal</small></span>                   
                        </div>

                       <div class="row">
                           <div class="col">
                            <span class="font-weight-bold">Conceptual</span> 
                           </div>
                           <div class="col">
                           <span class="font-weight-bold">Procedimental</span> 
                           </div>
                           <div class="col">
                           <span class="font-weight-bold">Actitudinal</span> 
                           </div>
                           <div class="col">
                           <span class="font-weight-bold">Fallas</span> 
                           </div>
                       </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="notaConceptual" value="<?php echo $notaConceptual?>" placeholder="Conceptual" autocomplete="off" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="notaProcedimental" value="<?php echo $notaProcedimental?>" placeholder="Procedimental" autocomplete="off" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="notaActitudinal" value="<?php echo $notaActitudinal?>" placeholder="Actitudinal" autocomplete="off" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="fallas" value="<?php echo $fallas?>" placeholder="Fallas" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="editarNota">Editar Nota</button>
        <input type="hidden" name="idf" value="<?php echo md5(time())?>">
        <input type="hidden" name="idCalificacion" value="<?php echo $idNota?>">
        <input type="hidden" name="idEstudiante" value="<?php echo $idEstudiante?>">
    </div>
</form>

<script>
$(document).ready(function(){
   /*  $('#periodo').change(function(){
        let periodo = parseInt($('#periodo').val());
        let ruta = "indexAjax.php?pid=<?php //echo base64_encode("ui/logro/buscarLogrosAjax.php");?>&periodo=" + escape(periodo) + "&idAsignatura=<?php //echo $idAsignatura ?> ";
        $.ajax({
            type: 'get',
            url : ruta,
            success: function(respuesta){
                $('#alertLogros').hide()
                $('#logrosAsignatura').load(ruta)
            }
        })
    }) */
});
</script>