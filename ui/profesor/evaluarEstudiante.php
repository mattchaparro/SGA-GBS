<?php
include_once 'ui/menuProfesor.php';
$idMateria = $_GET['idMateria'];
$asignatura = new Asignatura($idMateria);
$asignatura->select();
$order = "";

$objPeriodo = new Periodo(1);
$objPeriodo ->select();
$periodoencurso = $objPeriodo -> getEncurso();

$objPeriodo2 = new Periodo ("", $periodoencurso);
$objPeriodo2 -> selectByOrden();
$periodo = $objPeriodo2 -> getOrden();

if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}

if(!isset($_SESSION['inicio'])){
    $_SESSION['inicio'] = "1";
}

if(isset($_GET['idEstudiante'])){
    $idEstudiante = $_GET['idEstudiante'];
}

if(isset($_POST['subirNota'])){
    
    if($_SESSION['inicio'] != $_POST['idf']){
        $_SESSION['inicio'] = $_POST['idf'];
        $arrayLogros = $_POST['idLogros'];
        $notaConceptual = $_POST['notaConceptual'];
        $notaProcedimental = $_POST['notaProcedimental'];
        $notaActitudinal = $_POST['notaActitudinal'];
        $fallas = $_POST['fallas'];
        $nota = ($notaConceptual + $notaActitudinal + $notaProcedimental);
        $calificacion = new Calificacion("", $nota, $fallas, 4, $periodo, $idEstudiante, $idMateria);
        $calificacion -> insert();
        $ultimaCalificacion =  $calificacion -> selectLastCalificacion();
        
       
        foreach($arrayLogros as $l){
            $objLogro = new LogrosCalificacion("", $ultimaCalificacion, $l );
            $objLogro -> insert();
        }

        //Notas por tipo: 
        /*
        1. Procedimental
        2. Actitudinal
        3. Conceptual
        4. Definitiva
        */
        $calProc = new Calificacion ("", $notaProcedimental,"", 1, $periodo, $idEstudiante, $idMateria);
        $calProc -> insert();
        $calAct = new Calificacion ("", $notaActitudinal, "", 2, $periodo, $idEstudiante, $idMateria);
        $calAct -> insert();
        $calCon = new Calificacion ("", $notaConceptual, "", 3, $periodo, $idEstudiante, $idMateria);
        $calCon -> insert();

        echo "<script>
                alertify.success('Nota enviada!');
            </script>";  
    }
}

if(isset($_POST['editarNota'])){
    
    if($_SESSION['inicio'] != $_POST['idf']){
        $_SESSION['inicio'] = $_POST['idf'];
        $idAlumno = $_POST['idEstudiante'];
        $idCalificacion = $_POST['idCalificacion'];
        $arrayLogros = $_POST['idLogros'];
        $notaConceptual = $_POST['notaConceptual'];
        $notaProcedimental = $_POST['notaProcedimental'];
        $notaActitudinal = $_POST['notaActitudinal'];
        $fallas = $_POST['fallas'];
        $nota = ($notaConceptual + $notaActitudinal + $notaProcedimental);
        $calificacion = new Calificacion($idCalificacion, $nota, $fallas, 4, $periodo, $idAlumno, $idMateria);
        $calificacion -> update();
      
        foreach($arrayLogros as $l){
            $objLogro = new LogrosCalificacion("", $idCalificacion, $l );
            $objLogro -> insert();
        }

        //Notas por tipo: 
        /*
        1. Procedimental
        2. Actitudinal
        3. Conceptual
        4. Definitiva
        */

        $idCalProc = new Calificacion ("", "", "" , 1, "", $idEstudiante, $idMateria);
        $idNotaProc = $idCalProc -> selectIdByNotaPeriodo($periodo);
        echo "<br> idNota proc ". $idNotaProc;
        $notaProcUpdate = new Calificacion  ($idNotaProc, $notaProcedimental,0 , 1, $periodo, $idEstudiante, $idMateria);
        $notaProcUpdate -> update();

            
        $idCalAct = new Calificacion ("", "", "", 2, "", $idEstudiante, $idMateria);
        $idNotaAct = $idCalAct -> selectIdByNotaPeriodo($periodo);
        echo "<br> idNota act ". $idNotaAct;
        $notaActUpdate = new Calificacion  ($idNotaAct, $notaActitudinal, 0, 2, $periodo, $idEstudiante, $idMateria);
        $notaActUpdate -> update();
        /*
        $idCalConc = new Calificacion ("", "","", 3, "", $idEstudiante, $idMateria);
        $idNotaConc = $idCalAct -> selectIdByNotaPeriodo($periodo);
        $notaConcUpdate = new Calificacion  ($idNotaConc, $notaConceptual, 0, 3, $periodo, $idEstudiante, $idMateria);
        $notaConcUpdate -> update();*/

        echo "<script>
                alertify.warning('Nota editada!');
            </script>";  
    }
    
}
      
?>
<div class="container-fluid p-2" style="background-color: #EAF1F9; height: 100vh;">
    <div class="row">
        <div class="col-12 order-0 order-sm-1">
            <div class="container-fluid" style="background-color: #EAF1F9;">
                <div class="row p-3">
                    <div class="col-12 bg-white p-2 m-0" style=" border-radius: 15px;">
                        <div class="container-fluid">
                            <div class="row p-0">
                                <div class="col-12  d-flex justify-content-center col-md-5 justify-content-md-start ">
                                    <a class="navbar-brand" href="#"><span class="text-dark"><i class="fas fa-check mr-2"></i>Evaluando materia: <?php echo $asignatura->getNombre(); ?></span></a>
                                </div>
                                <div class="col-12 col-md-3 d-flex justify-content-start">

                                </div>
                                <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end">
                                    <span class="mt-2 font-weight-bold">Seleccione estudiante a evaluar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row p-1">
                    <div class="col-12">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col bg-white text-center p-4 msjSel" style=" border-radius: 15px;">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2"></th>
                                                    <th rowspan="2" class="text-center">Estudiante</th>
                                                    <th colspan="2">1° Periodo</th>
                                                    <th colspan="2">2° Periodo</th>
                                                    <th colspan="2">3° Periodo</th>
                                                    <th colspan="2">4° Periodo</th>
                                                    <th rowspan="2">Acciones</th>
                                                                                                       
                                                </tr>
                                                <tr>
                                                <th nowrap>Nota
                                                        <?php if ($order == "nota" && $dir == "asc") { ?>
                                                            <span class='fas fa-sort-up'></span>
                                                        <?php } else { ?>
                                                            <a href='index.php?pid=<?php echo base64_encode("ui/profesor/evaluarEstudiante.php") ?>&order=nota&dir=asc'>
                                                                <span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending'></span></a>
                                                        <?php } ?>
                                                        <?php if ($order == "nota" && $dir == "desc") { ?>
                                                            <span class='fas fa-sort-down'></span>
                                                        <?php } else { ?>
                                                            <a href='index.php?pid=<?php echo base64_encode("ui/profesor/evaluarEstudiante.php") ?>&order=nota&dir=desc'>
                                                                <span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending'></span></a>
                                                        <?php } ?>
                                                    </th>
                                                <th>F</th>
                                                <th nowrap>Nota
                                                        <?php if ($order == "nota" && $dir == "asc") { ?>
                                                            <span class='fas fa-sort-up'></span>
                                                        <?php } else { ?>
                                                            <a href='index.php?pid=<?php echo base64_encode("ui/profesor/evaluarEstudiante.php") ?>&order=nota&dir=asc'>
                                                                <span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending'></span></a>
                                                        <?php } ?>
                                                        <?php if ($order == "nota" && $dir == "desc") { ?>
                                                            <span class='fas fa-sort-down'></span>
                                                        <?php } else { ?>
                                                            <a href='index.php?pid=<?php echo base64_encode("ui/profesor/evaluarEstudiante.php") ?>&order=nota&dir=desc'>
                                                                <span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending'></span></a>
                                                        <?php } ?>
                                                    </th>
                                                <th>F</th>
                                                <th nowrap>Nota
                                                        <?php if ($order == "nota" && $dir == "asc") { ?>
                                                            <span class='fas fa-sort-up'></span>
                                                        <?php } else { ?>
                                                            <a href='index.php?pid=<?php echo base64_encode("ui/profesor/evaluarEstudiante.php") ?>&order=nota&dir=asc'>
                                                                <span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending'></span></a>
                                                        <?php } ?>
                                                        <?php if ($order == "nota" && $dir == "desc") { ?>
                                                            <span class='fas fa-sort-down'></span>
                                                        <?php } else { ?>
                                                            <a href='index.php?pid=<?php echo base64_encode("ui/profesor/evaluarEstudiante.php") ?>&order=nota&dir=desc'>
                                                                <span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending'></span></a>
                                                        <?php } ?>
                                                    </th>
                                                <th>F</th>
                                                <th nowrap>Nota
                                                        <?php if ($order == "nota" && $dir == "asc") { ?>
                                                            <span class='fas fa-sort-up'></span>
                                                        <?php } else { ?>
                                                            <a href='index.php?pid=<?php echo base64_encode("ui/profesor/evaluarEstudiante.php") ?>&order=nota&dir=asc'>
                                                                <span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending'></span></a>
                                                        <?php } ?>
                                                        <?php if ($order == "nota" && $dir == "desc") { ?>
                                                            <span class='fas fa-sort-down'></span>
                                                        <?php } else { ?>
                                                            <a href='index.php?pid=<?php echo base64_encode("ui/profesor/evaluarEstudiante.php") ?>&order=nota&dir=desc'>
                                                                <span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending'></span></a>
                                                        <?php } ?>
                                                    </th>
                                                <th>F</th>
                                                </tr>
                                            </thead>
                                            </tbody>
                                            <?php
                                            $estudiante = new Estudiante();
                                            
                                            
                                            if ($order != "" && $dir != "") {
                                                $calificacions = $calificacion->selectAllByAsignaturaOrder($order, $dir);
                                            } else {
                                                $estudiantes = $estudiante -> selectAllByCursoAsignatura($idMateria);                                       
                                            }
                                            $counter = 1;
                                            $fallas = "";
                                            foreach($estudiantes as $currentEstudiante) {
                                               
                                                
                                                $idEstudiante =  $currentEstudiante -> getIdEstudiante();
                                                $cal = new Calificacion("","","",4,"",$idEstudiante, $idMateria);
                                                $idNota = $cal -> selectIdByNotaPeriodo($periodo);
                                                $notaPeriodo1 = $cal -> selectNotaByPeriodo(1);
                                                $notaPeriodo2 = $cal -> selectNotaByPeriodo(2);
                                                $notaPeriodo3 = $cal -> selectNotaByPeriodo(3);
                                                $notaPeriodo4 = $cal -> selectNotaByPeriodo(4);
                                                $fallasPeriodo1 = $cal -> selectFallasByPeriodo(1);
                                                $fallasPeriodo2 = $cal -> selectFallasByPeriodo(2);
                                                $fallasPeriodo3 = $cal -> selectFallasByPeriodo(3);
                                                $fallasPeriodo4 = $cal -> selectFallasByPeriodo(4);

                                                echo "<tr><td>" . $counter . "</td>";
                                                echo "<td>" .  $currentEstudiante -> getApellido() . " " .$currentEstudiante-> getNombre() . "</td>";
                                                echo "<td>" . $notaPeriodo1. "</td>";
                                                echo "<td>".  $fallasPeriodo1 .  "</td>";
                                                echo "<td>" . $notaPeriodo2. "</td>";
                                                echo "<td>".  $fallasPeriodo2 .   "</td>";
                                                echo "<td>" . $notaPeriodo3. "</td>";
                                                echo "<td>".  $fallasPeriodo3 .  " </td>";
                                                echo "<td>" . $notaPeriodo4. "</td>";
                                                echo "<td> ".  $fallasPeriodo4 .  "</td>";
                                                echo "<td class='text-center' nowrap>";
                                                echo "<a href='modalCalificacion.php?idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "&idAsignatura=". $idMateria ."'  data-toggle='modal' data-target='#modalCalificacion' ><span class='fas fa-plus-circle' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Calificar Estudiante' ></span></a> ";
                                                echo "<a href='modalEditarNota.php?idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "&idAsignatura=". $idMateria ."&idCalificacion=". $idNota."'  data-toggle='modal' data-target='#modalEditarNota' ><span class='fas fa-edit ml-2' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Calificacion' ></span></a> ";      
                                                echo "</td>";
                                                echo "</tr>";
                                                $counter++;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="salonesFiltrados"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCalificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>

<div class="modal fade" id="modalEditarNota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	}); 
</script>
