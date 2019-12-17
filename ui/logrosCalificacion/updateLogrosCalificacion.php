<?php
$processed=false;
$idLogrosCalificacion = $_GET['idLogrosCalificacion'];
$updateLogrosCalificacion = new LogrosCalificacion($idLogrosCalificacion);
$updateLogrosCalificacion -> select();
$calificacion="";
if(isset($_POST['calificacion'])){
	$calificacion=$_POST['calificacion'];
}
$logro="";
if(isset($_POST['logro'])){
	$logro=$_POST['logro'];
}
if(isset($_POST['update'])){
	$updateLogrosCalificacion = new LogrosCalificacion($idLogrosCalificacion, $calificacion, $logro);
	$updateLogrosCalificacion -> update();
	$updateLogrosCalificacion -> select();
	$objCalificacion = new Calificacion($calificacion);
	$objCalificacion -> select();
	$nameCalificacion = $objCalificacion -> getNota() ;
	$objLogro = new Logro($logro);
	$objLogro -> select();
	$nameLogro = $objLogro -> getNombre() ;
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
		$logAdministrator = new LogAdministrator("","Edit Logros Calificacion", "Calificacion: " . $nameCalificacion . ";; Logro: " . $nameLogro, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Profesor'){
		$logProfesor = new LogProfesor("","Edit Logros Calificacion", "Calificacion: " . $nameCalificacion . ";; Logro: " . $nameLogro, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logProfesor -> insert();
	}
	else if($_SESSION['entity'] == 'Secretaria'){
		$logSecretaria = new LogSecretaria("","Edit Logros Calificacion", "Calificacion: " . $nameCalificacion . ";; Logro: " . $nameLogro, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Edit LogrosCalificacion</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Edited
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/logrosCalificacion/updateLogrosCalificacion.php") . "&idLogrosCalificacion=" . $idLogrosCalificacion ?>" class="bootstrap-form needs-validation"   >
					<div class="form-group">
						<label>Calificacion*</label>
						<select class="form-control" name="calificacion">
							<?php
							$objCalificacion = new Calificacion();
							$calificacions = $objCalificacion -> selectAll();
							foreach($calificacions as $currentCalificacion){
								echo "<option value='" . $currentCalificacion -> getIdCalificacion() . "'";
								if($currentCalificacion -> getIdCalificacion() == $updateLogrosCalificacion -> getCalificacion() -> getIdCalificacion()){
									echo " selected";
								}
								echo ">" . $currentCalificacion -> getNota() . "</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Logro*</label>
						<select class="form-control" name="logro">
							<?php
							$objLogro = new Logro();
							$logros = $objLogro -> selectAll();
							foreach($logros as $currentLogro){
								echo "<option value='" . $currentLogro -> getIdLogro() . "'";
								if($currentLogro -> getIdLogro() == $updateLogrosCalificacion -> getLogro() -> getIdLogro()){
									echo " selected";
								}
								echo ">" . $currentLogro -> getNombre() . "</option>";
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
