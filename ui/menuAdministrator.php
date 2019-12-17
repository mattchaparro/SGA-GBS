<?php
$administrator = new Administrator($_SESSION['id']);
$administrator -> select();
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" >
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("ui/sessionAdministrator.php") ?>"><span class="fas fa-home" aria-hidden="true"></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Create</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/insertAdministrator.php") ?>">Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/insertEstudiante.php") ?>">Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/curso/insertCurso.php") ?>">Curso</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estadoEstudiante/insertEstadoEstudiante.php") ?>">Estado Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/area/insertArea.php") ?>">Area</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asignatura/insertAsignatura.php") ?>">Asignatura</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logro/insertLogro.php") ?>">Logro</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/tipoLogro/insertTipoLogro.php") ?>">Tipo Logro</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/insertProfesor.php") ?>">Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/cursoAsignaturaProfesor/insertCursoAsignaturaProfesor.php") ?>">Curso Asignatura Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/periodo/insertPeriodo.php") ?>">Periodo</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/calificacion/insertCalificacion.php") ?>">Calificacion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/tipoCalificacion/insertTipoCalificacion.php") ?>">Tipo Calificacion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/secretaria/insertSecretaria.php") ?>">Secretaria</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Get All</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/selectAllAdministrator.php") ?>">Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudiante.php") ?>">Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/curso/selectAllCurso.php") ?>">Curso</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estadoEstudiante/selectAllEstadoEstudiante.php") ?>">Estado Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/area/selectAllArea.php") ?>">Area</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asignatura/selectAllAsignatura.php") ?>">Asignatura</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logro/selectAllLogro.php") ?>">Logro</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/tipoLogro/selectAllTipoLogro.php") ?>">Tipo Logro</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/selectAllProfesor.php") ?>">Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/cursoAsignaturaProfesor/selectAllCursoAsignaturaProfesor.php") ?>">Curso Asignatura Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/periodo/selectAllPeriodo.php") ?>">Periodo</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/calificacion/selectAllCalificacion.php") ?>">Calificacion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/tipoCalificacion/selectAllTipoCalificacion.php") ?>">Tipo Calificacion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/secretaria/selectAllSecretaria.php") ?>">Secretaria</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Search</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/searchAdministrator.php") ?>">Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estudiante/searchEstudiante.php") ?>">Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/curso/searchCurso.php") ?>">Curso</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/estadoEstudiante/searchEstadoEstudiante.php") ?>">Estado Estudiante</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/area/searchArea.php") ?>">Area</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/asignatura/searchAsignatura.php") ?>">Asignatura</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logro/searchLogro.php") ?>">Logro</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/tipoLogro/searchTipoLogro.php") ?>">Tipo Logro</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/profesor/searchProfesor.php") ?>">Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/cursoAsignaturaProfesor/searchCursoAsignaturaProfesor.php") ?>">Curso Asignatura Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/periodo/searchPeriodo.php") ?>">Periodo</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/calificacion/searchCalificacion.php") ?>">Calificacion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/tipoCalificacion/searchTipoCalificacion.php") ?>">Tipo Calificacion</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/secretaria/searchSecretaria.php") ?>">Secretaria</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Log</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logAdministrator/searchLogAdministrator.php") ?>">Log Administrator</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logProfesor/searchLogProfesor.php") ?>">Log Profesor</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/logSecretaria/searchLogSecretaria.php") ?>">Log Secretaria</a>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown">Administrator: <?php echo $administrator -> getName() . " " . $administrator -> getLastName() ?><span class="caret"></span></a>
				<div class="dropdown-menu" >
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/updateProfileAdministrator.php") ?>">Edit Profile</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/administrator/updatePasswordAdministrator.php") ?>">Change Password</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?logOut=1">Log out</a>
			</li>
		</ul>
	</div>
</nav>
