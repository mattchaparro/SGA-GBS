<?php
$processed=false;
$idCursoAsignaturaProfesor = $_GET['idCursoAsignaturaProfesor'];
$updateCursoAsignaturaProfesor = new CursoAsignaturaProfesor($idCursoAsignaturaProfesor);
$updateCursoAsignaturaProfesor -> select();
$noused="";
if(isset($_POST['noused'])){
	$noused=$_POST['noused'];
}
$curso="";
if(isset($_POST['curso'])){
	$curso=$_POST['curso'];
}
$asignatura="";
if(isset($_POST['asignatura'])){
	$asignatura=$_POST['asignatura'];
}
$profesor="";
if(isset($_POST['profesor'])){
	$profesor=$_POST['profesor'];
}
if(isset($_POST['update'])){
	$updateCursoAsignaturaProfesor = new CursoAsignaturaProfesor($idCursoAsignaturaProfesor, $noused, $curso, $asignatura, $profesor);
	$updateCursoAsignaturaProfesor -> update();
	$updateCursoAsignaturaProfesor -> select();
	$objCurso = new Curso($curso);
	$objCurso -> select();
	$nameCurso = $objCurso -> getNombre() ;
	$objAsignatura = new Asignatura($asignatura);
	$objAsignatura -> select();
	$nameAsignatura = $objAsignatura -> getNombre() ;
	$objProfesor = new Profesor($profesor);
	$objProfesor -> select();
	$nameProfesor = $objProfesor -> getNombre() . " " . $objProfesor -> getApellido() ;
	$user_ip = getenv('REMOTE_ADDR');
	$agent = $_SERVER["HTTP_USER_AGENT"];
	$browser = "-";
	if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
		$browser = "Internet Explorer";
	} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Chrome";
	} else if (preg_match('/Edge\/\d+/', $agent) ) {
		$browser = "Edge";
	} else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Firefox";
	} else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Opera";
	} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
		$browser = "Safari";
	}
	if($_SESSION['entity'] == 'Administrator'){
		$logAdministrator = new LogAdministrator("","Edit Curso Asignatura Profesor", "Noused: " . $noused . ";; Curso: " . $nameCurso . ";; Asignatura: " . $nameAsignatura . ";; Profesor: " . $nameProfesor, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Profesor'){
		$logProfesor = new LogProfesor("","Edit Curso Asignatura Profesor", "Noused: " . $noused . ";; Curso: " . $nameCurso . ";; Asignatura: " . $nameAsignatura . ";; Profesor: " . $nameProfesor, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logProfesor -> insert();
	}
	else if($_SESSION['entity'] == 'Secretaria'){
		$logSecretaria = new LogSecretaria("","Edit Curso Asignatura Profesor", "Noused: " . $noused . ";; Curso: " . $nameCurso . ";; Asignatura: " . $nameAsignatura . ";; Profesor: " . $nameProfesor, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logSecretaria -> insert();
	}
	$processed=true;
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit CursoAsignaturaProfesor</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/cursoAsignaturaProfesor/updateCursoAsignaturaProfesor.php") . "&idCursoAsignaturaProfesor=" . $idCursoAsignaturaProfesor ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Noused*</label>
							<input type="text" class="form-control" name="noused" value="<?php echo $updateCursoAsignaturaProfesor -> getNoused() ?>" required />
						</div>
					<div class="form-group">
						<label>Curso*</label>
						<select class="form-control" name="curso">
							<?php
							$objCurso = new Curso();
							$cursos = $objCurso -> selectAll();
							foreach($cursos as $currentCurso){
								echo "<option value='" . $currentCurso -> getIdCurso() . "'";
								if($currentCurso -> getIdCurso() == $updateCursoAsignaturaProfesor -> getCurso() -> getIdCurso()){
									echo " selected";
								}
								echo ">" . $currentCurso -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Asignatura*</label>
						<select class="form-control" name="asignatura">
							<?php
							$objAsignatura = new Asignatura();
							$asignaturas = $objAsignatura -> selectAll();
							foreach($asignaturas as $currentAsignatura){
								echo "<option value='" . $currentAsignatura -> getIdAsignatura() . "'";
								if($currentAsignatura -> getIdAsignatura() == $updateCursoAsignaturaProfesor -> getAsignatura() -> getIdAsignatura()){
									echo " selected";
								}
								echo ">" . $currentAsignatura -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Profesor*</label>
						<select class="form-control" name="profesor">
							<?php
							$objProfesor = new Profesor();
							$profesors = $objProfesor -> selectAll();
							foreach($profesors as $currentProfesor){
								echo "<option value='" . $currentProfesor -> getIdProfesor() . "'";
								if($currentProfesor -> getIdProfesor() == $updateCursoAsignaturaProfesor -> getProfesor() -> getIdProfesor()){
									echo " selected";
								}
								echo ">" . $currentProfesor -> getNombre() . " " . $currentProfesor -> getApellido() . "</option>";
							}
							?>
						</select>
					</div>
						<button type="submit" class="btn" name="update">Edit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
