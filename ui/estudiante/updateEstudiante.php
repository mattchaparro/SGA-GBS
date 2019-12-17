<?php
$processed=false;
$idEstudiante = $_GET['idEstudiante'];
$updateEstudiante = new Estudiante($idEstudiante);
$updateEstudiante -> select();
$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
$apellido="";
if(isset($_POST['apellido'])){
	$apellido=$_POST['apellido'];
}
$documento="";
if(isset($_POST['documento'])){
	$documento=$_POST['documento'];
}
$fecha_nacimiento=date("d/m/Y");
if(isset($_POST['fecha_nacimiento'])){
	$fecha_nacimiento=$_POST['fecha_nacimiento'];
}
$fecha_matricula=date("d/m/Y");
if(isset($_POST['fecha_matricula'])){
	$fecha_matricula=$_POST['fecha_matricula'];
}
$sexo="";
if(isset($_POST['sexo'])){
	$sexo=$_POST['sexo'];
}
$curso="";
if(isset($_POST['curso'])){
	$curso=$_POST['curso'];
}
$estadoEstudiante="";
if(isset($_POST['estadoEstudiante'])){
	$estadoEstudiante=$_POST['estadoEstudiante'];
}
if(isset($_POST['update'])){
	$updateEstudiante = new Estudiante($idEstudiante, $nombre, $apellido, $documento, $fecha_nacimiento, $fecha_matricula, $sexo, $curso, $estadoEstudiante);
	$updateEstudiante -> update();
	$updateEstudiante -> select();
	$objCurso = new Curso($curso);
	$objCurso -> select();
	$nameCurso = $objCurso -> getNombre() ;
	$objEstadoEstudiante = new EstadoEstudiante($estadoEstudiante);
	$objEstadoEstudiante -> select();
	$nameEstadoEstudiante = $objEstadoEstudiante -> getNombre() ;
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
		$logAdministrator = new LogAdministrator("","Edit Estudiante", "Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Documento: " . $documento . ";; Fecha_nacimiento: " . $fecha_nacimiento . ";; Fecha_matricula: " . $fecha_matricula . ";; Sexo: " . $sexo . ";; Curso: " . $nameCurso . ";; Estado Estudiante: " . $nameEstadoEstudiante, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Profesor'){
		$logProfesor = new LogProfesor("","Edit Estudiante", "Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Documento: " . $documento . ";; Fecha_nacimiento: " . $fecha_nacimiento . ";; Fecha_matricula: " . $fecha_matricula . ";; Sexo: " . $sexo . ";; Curso: " . $nameCurso . ";; Estado Estudiante: " . $nameEstadoEstudiante, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logProfesor -> insert();
	}
	else if($_SESSION['entity'] == 'Secretaria'){
		$logSecretaria = new LogSecretaria("","Edit Estudiante", "Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Documento: " . $documento . ";; Fecha_nacimiento: " . $fecha_nacimiento . ";; Fecha_matricula: " . $fecha_matricula . ";; Sexo: " . $sexo . ";; Curso: " . $nameCurso . ";; Estado Estudiante: " . $nameEstadoEstudiante, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit Estudiante</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/estudiante/updateEstudiante.php") . "&idEstudiante=" . $idEstudiante ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $updateEstudiante -> getNombre() ?>" required />
						</div>
						<div class="form-group">
							<label>Apellido*</label>
							<input type="text" class="form-control" name="apellido" value="<?php echo $updateEstudiante -> getApellido() ?>" required />
						</div>
						<div class="form-group">
							<label>Documento*</label>
							<input type="text" class="form-control" name="documento" value="<?php echo $updateEstudiante -> getDocumento() ?>" required />
						</div>
						<div class="form-group">
							<label>Fecha_nacimiento*</label>
							<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $updateEstudiante -> getFecha_nacimiento() ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Fecha_matricula*</label>
							<input type="date" class="form-control" name="fecha_matricula" id="fecha_matricula" value="<?php echo $updateEstudiante -> getFecha_matricula() ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Sexo*</label>
							<input type="text" class="form-control" name="sexo" value="<?php echo $updateEstudiante -> getSexo() ?>" required />
						</div>
					<div class="form-group">
						<label>Curso*</label>
						<select class="form-control" name="curso">
							<?php
							$objCurso = new Curso();
							$cursos = $objCurso -> selectAll();
							foreach($cursos as $currentCurso){
								echo "<option value='" . $currentCurso -> getIdCurso() . "'";
								if($currentCurso -> getIdCurso() == $updateEstudiante -> getCurso() -> getIdCurso()){
									echo " selected";
								}
								echo ">" . $currentCurso -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Estado Estudiante*</label>
						<select class="form-control" name="estadoEstudiante">
							<?php
							$objEstadoEstudiante = new EstadoEstudiante();
							$estadoEstudiantes = $objEstadoEstudiante -> selectAll();
							foreach($estadoEstudiantes as $currentEstadoEstudiante){
								echo "<option value='" . $currentEstadoEstudiante -> getIdEstadoEstudiante() . "'";
								if($currentEstadoEstudiante -> getIdEstadoEstudiante() == $updateEstudiante -> getEstadoEstudiante() -> getIdEstadoEstudiante()){
									echo " selected";
								}
								echo ">" . $currentEstadoEstudiante -> getNombre() . "</option>";
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
