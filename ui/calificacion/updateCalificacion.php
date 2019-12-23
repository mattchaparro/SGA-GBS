<?php
$processed=false;
$idCalificacion = $_GET['idCalificacion'];
$updateCalificacion = new Calificacion($idCalificacion);
$updateCalificacion -> select();
$nota="";
if(isset($_POST['nota'])){
	$nota=$_POST['nota'];
}
$fallas="";
if(isset($_POST['fallas'])){
	$fallas=$_POST['fallas'];
}
$idDefinitiva="";
if(isset($_POST['idDefinitiva'])){
	$idDefinitiva=$_POST['idDefinitiva'];
}
$tipoCalificacion="";
if(isset($_POST['tipoCalificacion'])){
	$tipoCalificacion=$_POST['tipoCalificacion'];
}
$periodo="";
if(isset($_POST['periodo'])){
	$periodo=$_POST['periodo'];
}
$estudiante="";
if(isset($_POST['estudiante'])){
	$estudiante=$_POST['estudiante'];
}
$asignatura="";
if(isset($_POST['asignatura'])){
	$asignatura=$_POST['asignatura'];
}
if(isset($_POST['update'])){
	$updateCalificacion = new Calificacion($idCalificacion, $nota, $fallas, $idDefinitiva, $tipoCalificacion, $periodo, $estudiante, $asignatura);
	$updateCalificacion -> update();
	$updateCalificacion -> select();
	$objTipoCalificacion = new TipoCalificacion($tipoCalificacion);
	$objTipoCalificacion -> select();
	$nameTipoCalificacion = $objTipoCalificacion -> getNombre() ;
	$objPeriodo = new Periodo($periodo);
	$objPeriodo -> select();
	$namePeriodo = $objPeriodo -> getOrden() ;
	$objEstudiante = new Estudiante($estudiante);
	$objEstudiante -> select();
	$nameEstudiante = $objEstudiante -> getNombre() . " " . $objEstudiante -> getApellido() ;
	$objAsignatura = new Asignatura($asignatura);
	$objAsignatura -> select();
	$nameAsignatura = $objAsignatura -> getNombre() ;
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
		$logAdministrator = new LogAdministrator("","Edit Calificacion", "Nota: " . $nota . ";; Fallas: " . $fallas . ";; Id Definitiva: " . $idDefinitiva . ";; Tipo Calificacion: " . $nameTipoCalificacion . ";; Periodo: " . $namePeriodo . ";; Estudiante: " . $nameEstudiante . ";; Asignatura: " . $nameAsignatura, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Profesor'){
		$logProfesor = new LogProfesor("","Edit Calificacion", "Nota: " . $nota . ";; Fallas: " . $fallas . ";; Id Definitiva: " . $idDefinitiva . ";; Tipo Calificacion: " . $nameTipoCalificacion . ";; Periodo: " . $namePeriodo . ";; Estudiante: " . $nameEstudiante . ";; Asignatura: " . $nameAsignatura, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logProfesor -> insert();
	}
	else if($_SESSION['entity'] == 'Secretaria'){
		$logSecretaria = new LogSecretaria("","Edit Calificacion", "Nota: " . $nota . ";; Fallas: " . $fallas . ";; Id Definitiva: " . $idDefinitiva . ";; Tipo Calificacion: " . $nameTipoCalificacion . ";; Periodo: " . $namePeriodo . ";; Estudiante: " . $nameEstudiante . ";; Asignatura: " . $nameAsignatura, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit Calificacion</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/calificacion/updateCalificacion.php") . "&idCalificacion=" . $idCalificacion ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nota*</label>
							<input type="text" class="form-control" name="nota" value="<?php echo $updateCalificacion -> getNota() ?>" required />
						</div>
						<div class="form-group">
							<label>Fallas*</label>
							<input type="text" class="form-control" name="fallas" value="<?php echo $updateCalificacion -> getFallas() ?>" required />
						</div>
						<div class="form-group">
							<label>Id Definitiva</label>
							<input type="text" class="form-control" name="idDefinitiva" value="<?php echo $updateCalificacion -> getIdDefinitiva() ?>"/>
						</div>
					<div class="form-group">
						<label>Tipo Calificacion*</label>
						<select class="form-control" name="tipoCalificacion">
							<?php
							$objTipoCalificacion = new TipoCalificacion();
							$tipoCalificacions = $objTipoCalificacion -> selectAll();
							foreach($tipoCalificacions as $currentTipoCalificacion){
								echo "<option value='" . $currentTipoCalificacion -> getIdTipoCalificacion() . "'";
								if($currentTipoCalificacion -> getIdTipoCalificacion() == $updateCalificacion -> getTipoCalificacion() -> getIdTipoCalificacion()){
									echo " selected";
								}
								echo ">" . $currentTipoCalificacion -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Periodo*</label>
						<select class="form-control" name="periodo">
							<?php
							$objPeriodo = new Periodo();
							$periodos = $objPeriodo -> selectAll();
							foreach($periodos as $currentPeriodo){
								echo "<option value='" . $currentPeriodo -> getIdPeriodo() . "'";
								if($currentPeriodo -> getIdPeriodo() == $updateCalificacion -> getPeriodo() -> getIdPeriodo()){
									echo " selected";
								}
								echo ">" . $currentPeriodo -> getOrden() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Estudiante*</label>
						<select class="form-control" name="estudiante">
							<?php
							$objEstudiante = new Estudiante();
							$estudiantes = $objEstudiante -> selectAll();
							foreach($estudiantes as $currentEstudiante){
								echo "<option value='" . $currentEstudiante -> getIdEstudiante() . "'";
								if($currentEstudiante -> getIdEstudiante() == $updateCalificacion -> getEstudiante() -> getIdEstudiante()){
									echo " selected";
								}
								echo ">" . $currentEstudiante -> getNombre() . " " . $currentEstudiante -> getApellido() . "</option>";
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
								if($currentAsignatura -> getIdAsignatura() == $updateCalificacion -> getAsignatura() -> getIdAsignatura()){
									echo " selected";
								}
								echo ">" . $currentAsignatura -> getNombre() . "</option>";
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
