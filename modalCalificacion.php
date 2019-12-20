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
<form id="form_subir_nota" action="index.php?pid=<?php echo base64_encode("ui/profesor/evaluarEstudiante.php")?>&idMateria=<?php echo $idAsignatura ?>&idEstudiante=<?php echo $idEstudiante?>" method="post">
    <div class="modal-body">
        <div class="container-fluid" style="background-color: #EAF1F9;">
            <div class="row ">
                <div class="col-12 mt-2 mb-1">
                    <div class="container bg-white p-2" style=" border-radius: 15px;">
                        <div class="row">
                            <div class="col-12 col-md-8 mt-2">
                                Estudiante: <span class=" font-weight-bold "><?php echo $estudiante->getNombre() . " " . $estudiante->getApellido() ?></span>
                            </div>
                            <div class="col-8 col-md-4 d-flex justify-content-center justify-content-md-end">
                                    <span class="mt-2 font-weight-bold mr-2">Periodo </span>
                                    <select class="custom-select periodo" id="periodo" name="periodo">
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <div id="msjPeriodo"></div>
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
                                    
                                </div>
                                <div class="alert alert-info mt-2" id="alertLogros">
                                    <strong>Selecciona el periodo para ver los logros!</strong> 
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold">Ingrese las calificaciones</span>                   
                        </div>
                       
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="notaConceptual" placeholder="Conceptual" autocomplete="off" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="notaProcedimental" placeholder="Procedimental" autocomplete="off" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="notaActitudinal" placeholder="Actitudinal" autocomplete="off" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="fallas" placeholder="Fallas" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="subirNota">Enviar nota</button>
        <input type="hidden" name="idf" value="<?php echo md5(time())?>">
    </div>
</form>

<script>
$(document).ready(function(){
    $('#periodo').change(function(){
        let periodo = parseInt($('#periodo').val());
        let ruta = "indexAjax.php?pid=<?php echo base64_encode("ui/logro/buscarLogrosAjax.php");?>&periodo=" + escape(periodo) + "&idAsignatura=<?php echo $idAsignatura ?> ";
        $.ajax({
            type: 'get',
            url : ruta,
            success: function(respuesta){
                $('#alertLogros').hide()
                $('#logrosAsignatura').load(ruta)
            }
        })
    })
});
</script>