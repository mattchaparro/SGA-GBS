<?php
$processed=false;
$orden="";
if(isset($_POST['orden'])){
	$orden=$_POST['orden'];
}
$fecha_inicio=date("d/m/Y");
if(isset($_POST['fecha_inicio'])){
	$fecha_inicio=$_POST['fecha_inicio'];
}
$fecha_fin=date("d/m/Y");
if(isset($_POST['fecha_fin'])){
	$fecha_fin=$_POST['fecha_fin'];
}
$anio=date("d/m/Y");
if(isset($_POST['anio'])){
	$anio=$_POST['anio'];
}
if(isset($_POST['insert'])){
	$newPeriodo = new Periodo("", $orden, $fecha_inicio, $fecha_fin, $anio);
	$newPeriodo -> insert();
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
		$logAdministrator = new LogAdministrator("","Create Periodo", "Orden: " . $orden . ";; Fecha_inicio: " . $fecha_inicio . ";; Fecha_fin: " . $fecha_fin . ";; Anio: " . $anio, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Profesor'){
		$logProfesor = new LogProfesor("","Create Periodo", "Orden: " . $orden . ";; Fecha_inicio: " . $fecha_inicio . ";; Fecha_fin: " . $fecha_fin . ";; Anio: " . $anio, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logProfesor -> insert();
	}
	else if($_SESSION['entity'] == 'Secretaria'){
		$logSecretaria = new LogSecretaria("","Create Periodo", "Orden: " . $orden . ";; Fecha_inicio: " . $fecha_inicio . ";; Fecha_fin: " . $fecha_fin . ";; Anio: " . $anio, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Create Periodo</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Entered
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/periodo/insertPeriodo.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Orden*</label>
							<input type="text" class="form-control" name="orden" value="<?php echo $orden ?>" required />
						</div>
						<div class="form-group">
							<label>Fecha_inicio*</label>
							<input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo $fecha_inicio ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Fecha_fin*</label>
							<input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo $fecha_fin ?>" autocomplete="off" />
						</div>
						<div class="form-group">
							<label>Anio*</label>
							<input type="date" class="form-control" name="anio" id="anio" value="<?php echo $anio ?>" autocomplete="off" />
						</div>
						<button type="submit" class="btn" name="insert">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
