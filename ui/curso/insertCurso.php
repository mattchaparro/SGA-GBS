<?php
$processed=false;
$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
$anio=date("d/m/Y");
if(isset($_POST['anio'])){
	$anio=$_POST['anio'];
}
$grado="";
if(isset($_POST['grado'])){
	$grado=$_POST['grado'];
}
if(isset($_GET['idGrado'])){
	$grado=$_GET['idGrado'];
}
if(isset($_POST['insert'])){
	$newCurso = new Curso("", $nombre, $anio, $grado);
	$newCurso -> insert();
	$objGrado = new Grado($grado);
	$objGrado -> select();
	$nameGrado = $objGrado -> getNombre() ;
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
		$logAdministrator = new LogAdministrator("","Create Curso", "Nombre: " . $nombre . ";; Anio: " . $anio . ";; Grado: " . $nameGrado, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logAdministrator -> insert();
	}
	else if($_SESSION['entity'] == 'Profesor'){
		$logProfesor = new LogProfesor("","Create Curso", "Nombre: " . $nombre . ";; Anio: " . $anio . ";; Grado: " . $nameGrado, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
		$logProfesor -> insert();
	}
	else if($_SESSION['entity'] == 'Secretaria'){
		$logSecretaria = new LogSecretaria("","Create Curso", "Nombre: " . $nombre . ";; Anio: " . $anio . ";; Grado: " . $nameGrado, date("Y-m-d"), date("H:i:s"), $user_ip, PHP_OS, $browser, $_SESSION['id']);
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
					<h4 class="card-title">Create Curso</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Data Entered
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/curso/insertCurso.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" required />
						</div>
						<div class="form-group">
							<label>Anio*</label>
							<input type="date" class="form-control" name="anio" id="anio" value="<?php echo $anio ?>" autocomplete="off" />
						</div>
					<div class="form-group">
						<label>Grado*</label>
						<select class="form-control" name="grado">
							<?php
							$objGrado = new Grado();
							$grados = $objGrado -> selectAll();
							foreach($grados as $currentGrado){
								echo "<option value='" . $currentGrado -> getIdGrado() . "'";
								if($currentGrado -> getIdGrado() == $grado){
									echo " selected";
								}
								echo ">" . $currentGrado -> getNombre() . "</option>";
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
