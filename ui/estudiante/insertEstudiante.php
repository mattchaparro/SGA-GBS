<?php
$processed=false;
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
if(isset($_GET['idCurso'])){
	$curso=$_GET['idCurso'];
}
$estadoEstudiante="";
if(isset($_POST['estadoEstudiante'])){
	$estadoEstudiante=$_POST['estadoEstudiante'];
}
if(isset($_GET['idEstadoEstudiante'])){
	$estadoEstudiante=$_GET['idEstadoEstudiante'];
}
if(isset($_POST['insert'])){
	$newEstudiante = new Estudiante("", $nombre, $apellido, $documento, $fecha_nacimiento, $fecha_matricula, $sexo, $curso, $estadoEstudiante);
	$newEstudiante -> insert();
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
		$logAdministrator = new LogAdministrator("","Create Estudiante", "Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Documento: " . $documento . ";; Fecha_nacimiento: " . $fecha_nacimiento . ";; Fecha_matricula: " . $fecha_matricula . ";; Sexo: " . $sexo . ";; Curso: " . $nameCurso . ";; Estado Estudiante: " . $nameEstadoEstudiante, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Profesor'){
		$logProfesor = new LogProfesor("","Create Estudiante", "Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Documento: " . $documento . ";; Fecha_nacimiento: " . $fecha_nacimiento . ";; Fecha_matricula: " . $fecha_matricula . ";; Sexo: " . $sexo . ";; Curso: " . $nameCurso . ";; Estado Estudiante: " . $nameEstadoEstudiante, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logProfesor -> insert();
	}
	else if($_SESSION['entity'] == 'Secretaria'){
		$logSecretaria = new LogSecretaria("","Create Estudiante", "Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Documento: " . $documento . ";; Fecha_nacimiento: " . $fecha_nacimiento . ";; Fecha_matricula: " . $fecha_matricula . ";; Sexo: " . $sexo . ";; Curso: " . $nameCurso . ";; Estado Estudiante: " . $nameEstadoEstudiante, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Create Estudiante</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Entered
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/estudiante/insertEstudiante.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" required />
						</div>
						<div class="form-group">
							<label>Apellido*</label>
							<input type="text" class="form-control" name="apellido" value="<?php echo $apellido ?>" required />
						</div>
						<div class="form-group">
							<label>Documento*</label>
							<input type="text" class="form-control" name="documento" value="<?php echo $documento ?>" required />
						</div>
						<div class="form-group">
							<label>Fecha_nacimiento*</label>
							<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fecha_nacimiento ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Fecha_matricula*</label>
							<input type="date" class="form-control" name="fecha_matricula" id="fecha_matricula" value="<?php echo $fecha_matricula ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Sexo*</label>
							<input type="text" class="form-control" name="sexo" value="<?php echo $sexo ?>" required />
						</div>
					<div class="form-group">
						<label>Curso*</label>
						<select class="form-control" name="curso">
							<?php
							$objCurso = new Curso();
							$cursos = $objCurso -> selectAll();
							foreach($cursos as $currentCurso){
								echo "<option value='" . $currentCurso -> getIdCurso() . "'";
								if($currentCurso -> getIdCurso() == $curso){
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
								if($currentEstadoEstudiante -> getIdEstadoEstudiante() == $estadoEstudiante){
									echo " selected";
								}
								echo ">" . $currentEstadoEstudiante -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
						<button type="submit" class="btn" name="insert">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
