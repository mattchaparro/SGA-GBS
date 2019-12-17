<?php
$profesor = new Profesor($_SESSION['id']);
$profesor->select();
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("ui/sessionProfesor.php") ?>"><img src="img/logogb.png" alt="Logo GBS" width="80"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		
		<ul class="navbar-nav">
			<li class="nav-item active mr-2 p-1">
				<a class="nav-link btn btn-sm btn-secondary rounded rounded-pill text-white" href="index.php?pid=<?php echo base64_encode("ui/sessionProfesor.php") ?>">Inicio <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active mr-2 p-1">
				<a class="nav-link btn btn-sm btn-secondary rounded rounded-pill text-white" href="index.php?pid=<?php echo base64_encode("ui/profesor/consultarMateriasEvaluar.php") ?>">Calificar <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active mr-2 p-1">
				<a class="nav-link btn btn-sm btn-secondary rounded rounded-pill text-white" href="#">Pensum</a>
			</li>
			<li class="nav-item active mr-2 p-1">
				<a class="nav-link btn btn-sm btn-secondary rounded rounded-pill text-white" href="#">Salones</a>
			</li>
		</ul>
		<ul class="navbar-nav mr-auto">
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item active dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><?php echo $profesor->getNombre() . " " . $profesor->getApellido() ?><span class="caret"></span></a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/updateProfileProfesor.php") ?>">Editar Perfil</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/updatePasswordProfesor.php") ?>">Cambiar Contraseña</a>
					<a class="dropdown-item" href="index.php?logOut=1">Salir</a>
				</div>
			</li>
		</ul>
	</div>
</nav>