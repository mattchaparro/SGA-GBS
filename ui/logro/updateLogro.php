<?php
$processed=false;
$idLogro = $_GET['idLogro'];
$updateLogro = new Logro($idLogro);
$updateLogro -> select();
$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
$descripcion="";
if(isset($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];
}
$asignatura="";
if(isset($_POST['asignatura'])){
	$asignatura=$_POST['asignatura'];
}
$tipoLogro="";
if(isset($_POST['tipoLogro'])){
	$tipoLogro=$_POST['tipoLogro'];
}
if(isset($_POST['update'])){
	$updateLogro = new Logro($idLogro, $nombre, $descripcion, $asignatura, $tipoLogro);
	$updateLogro -> update();
	$updateLogro -> select();
	$objAsignatura = new Asignatura($asignatura);
	$objAsignatura -> select();
	$nameAsignatura = $objAsignatura -> getNombre() ;
	$objTipoLogro = new TipoLogro($tipoLogro);
	$objTipoLogro -> select();
	$nameTipoLogro = $objTipoLogro -> getNombre() ;
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
		$logAdministrator = new LogAdministrator("","Edit Logro", "Nombre: " . $nombre . ";; Descripcion: " . $descripcion . ";; Asignatura: " . $nameAsignatura . ";; Tipo Logro: " . $nameTipoLogro, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Profesor'){
		$logProfesor = new LogProfesor("","Edit Logro", "Nombre: " . $nombre . ";; Descripcion: " . $descripcion . ";; Asignatura: " . $nameAsignatura . ";; Tipo Logro: " . $nameTipoLogro, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logProfesor -> insert();
	}
	else if($_SESSION['entity'] == 'Secretaria'){
		$logSecretaria = new LogSecretaria("","Edit Logro", "Nombre: " . $nombre . ";; Descripcion: " . $descripcion . ";; Asignatura: " . $nameAsignatura . ";; Tipo Logro: " . $nameTipoLogro, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit Logro</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/logro/updateLogro.php") . "&idLogro=" . $idLogro ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $updateLogro -> getNombre() ?>" required />
						</div>
						<div class="form-group">
							<label>Descripcion*</label>
							<input type="text" class="form-control" name="descripcion" value="<?php echo $updateLogro -> getDescripcion() ?>" required />
						</div>
					<div class="form-group">
						<label>Asignatura*</label>
						<select class="form-control" name="asignatura">
							<?php
							$objAsignatura = new Asignatura();
							$asignaturas = $objAsignatura -> selectAll();
							foreach($asignaturas as $currentAsignatura){
								echo "<option value='" . $currentAsignatura -> getIdAsignatura() . "'";
								if($currentAsignatura -> getIdAsignatura() == $updateLogro -> getAsignatura() -> getIdAsignatura()){
									echo " selected";
								}
								echo ">" . $currentAsignatura -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Tipo Logro*</label>
						<select class="form-control" name="tipoLogro">
							<?php
							$objTipoLogro = new TipoLogro();
							$tipoLogros = $objTipoLogro -> selectAll();
							foreach($tipoLogros as $currentTipoLogro){
								echo "<option value='" . $currentTipoLogro -> getIdTipoLogro() . "'";
								if($currentTipoLogro -> getIdTipoLogro() == $updateLogro -> getTipoLogro() -> getIdTipoLogro()){
									echo " selected";
								}
								echo ">" . $currentTipoLogro -> getNombre() . "</option>";
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
