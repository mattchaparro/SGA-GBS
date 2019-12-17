<?php
$processed=false;
$idSecretaria = $_GET['idSecretaria'];
$updateSecretaria = new Secretaria($idSecretaria);
$updateSecretaria -> select();
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
$correo="";
if(isset($_POST['correo'])){
	$correo=$_POST['correo'];
}
$telefono="";
if(isset($_POST['telefono'])){
	$telefono=$_POST['telefono'];
}
$state="";
if(isset($_POST['state'])){
	$state=$_POST['state'];
}
if(isset($_POST['update'])){
	$updateSecretaria = new Secretaria($idSecretaria, $nombre, $apellido, $documento, $correo, "", $telefono, $state);
	$updateSecretaria -> update();
	$updateSecretaria -> select();
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
		$logAdministrator = new LogAdministrator("","Edit Secretaria", "Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Documento: " . $documento . ";; Correo: " . $correo . ";; Telefono: " . $telefono . ";; State: " . $state, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Profesor'){
		$logProfesor = new LogProfesor("","Edit Secretaria", "Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Documento: " . $documento . ";; Correo: " . $correo . ";; Telefono: " . $telefono . ";; State: " . $state, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logProfesor -> insert();
	}
	else if($_SESSION['entity'] == 'Secretaria'){
		$logSecretaria = new LogSecretaria("","Edit Secretaria", "Nombre: " . $nombre . ";; Apellido: " . $apellido . ";; Documento: " . $documento . ";; Correo: " . $correo . ";; Telefono: " . $telefono . ";; State: " . $state, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit Secretaria</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/secretaria/updateSecretaria.php") . "&idSecretaria=" . $idSecretaria ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $updateSecretaria -> getNombre() ?>" required />
						</div>
						<div class="form-group">
							<label>Apellido*</label>
							<input type="text" class="form-control" name="apellido" value="<?php echo $updateSecretaria -> getApellido() ?>" required />
						</div>
						<div class="form-group">
							<label>Documento</label>
							<input type="text" class="form-control" name="documento" value="<?php echo $updateSecretaria -> getDocumento() ?>"/>
						</div>
						<div class="form-group">
							<label>Correo*</label>
							<input type="email" class="form-control" name="correo" value="<?php echo $updateSecretaria -> getCorreo() ?>"  required />
						</div>
						<div class="form-group">
							<label>Telefono</label>
							<input type="text" class="form-control" name="telefono" value="<?php echo $updateSecretaria -> getTelefono() ?>"/>
						</div>
						<div class="form-group">
							<label>State*</label>
							<input type="text" class="form-control" name="state" value="<?php echo $updateSecretaria -> getState() ?>" required />
						</div>
						<button type="submit" class="btn" name="update">Edit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
