<?php 
session_start();
require("business/Administrator.php");
require("business/LogAdministrator.php");
require("business/Estudiante.php");
require("business/Curso.php");
require("business/Grado.php");
require("business/EstadoEstudiante.php");
require("business/Area.php");
require("business/Asignatura.php");
require("business/Logro.php");
require("business/TipoLogro.php");
require("business/LogProfesor.php");
require("business/Profesor.php");
require("business/CursoAsignaturaProfesor.php");
require("business/Periodo.php");
require("business/Calificacion.php");
require("business/TipoCalificacion.php");
require("business/LogSecretaria.php");
require("business/Secretaria.php");
ini_set("display_errors","1");
date_default_timezone_set("America/Bogota");
$webPages = array(
	'ui/grado/insertGrado.php',
	'searchGrado.php',
	'selectAllGrado.php',
	'updateGrado.php',
	'ui/recoverPassword.php',
	'ui/sessionAdministrator.php',
	'ui/administrator/insertAdministrator.php',
	'ui/administrator/updateAdministrator.php',
	'ui/administrator/selectAllAdministrator.php',
	'ui/administrator/searchAdministrator.php',
	'ui/administrator/updateProfileAdministrator.php',
	'ui/administrator/updatePasswordAdministrator.php',
	'ui/administrator/updatePictureAdministrator.php',
	'ui/logAdministrator/searchLogAdministrator.php',
	'ui/estudiante/insertEstudiante.php',
	'ui/estudiante/updateEstudiante.php',
	'ui/estudiante/selectAllEstudiante.php',
	'ui/estudiante/searchEstudiante.php',
	'ui/calificacion/selectAllCalificacionByEstudiante.php',
	'ui/curso/insertCurso.php',
	'ui/curso/updateCurso.php',
	'ui/curso/selectAllCurso.php',
	'ui/curso/searchCurso.php',
	'ui/estudiante/selectAllEstudianteByCurso.php',
	'ui/cursoAsignaturaProfesor/selectAllCursoAsignaturaProfesorByCurso.php',
	'ui/estadoEstudiante/insertEstadoEstudiante.php',
	'ui/estadoEstudiante/updateEstadoEstudiante.php',
	'ui/estadoEstudiante/selectAllEstadoEstudiante.php',
	'ui/estadoEstudiante/searchEstadoEstudiante.php',
	'ui/estudiante/selectAllEstudianteByEstadoEstudiante.php',
	'ui/area/insertArea.php',
	'ui/area/updateArea.php',
	'ui/area/selectAllArea.php',
	'ui/area/searchArea.php',
	'ui/asignatura/selectAllAsignaturaByArea.php',
	'ui/asignatura/insertAsignatura.php',
	'ui/asignatura/updateAsignatura.php',
	'ui/asignatura/selectAllAsignatura.php',
	'ui/asignatura/searchAsignatura.php',
	'ui/logro/selectAllLogroByAsignatura.php',
	'ui/cursoAsignaturaProfesor/selectAllCursoAsignaturaProfesorByAsignatura.php',
	'ui/calificacion/selectAllCalificacionByAsignatura.php',
	'ui/logro/insertLogro.php',
	'ui/logro/updateLogro.php',
	'ui/logro/selectAllLogro.php',
	'ui/logro/searchLogro.php',
	'ui/tipoLogro/insertTipoLogro.php',
	'ui/tipoLogro/updateTipoLogro.php',
	'ui/tipoLogro/selectAllTipoLogro.php',
	'ui/tipoLogro/searchTipoLogro.php',
	'ui/logro/selectAllLogroByTipoLogro.php',
	'ui/logProfesor/searchLogProfesor.php',
	'ui/sessionProfesor.php',
	'ui/profesor/insertProfesor.php',
	'ui/profesor/updateProfesor.php',
	'ui/profesor/selectAllProfesor.php',
	'ui/profesor/searchProfesor.php',
	'ui/profesor/updateProfileProfesor.php',
	'ui/profesor/updatePasswordProfesor.php',
	'ui/cursoAsignaturaProfesor/selectAllCursoAsignaturaProfesorByProfesor.php',
	'ui/cursoAsignaturaProfesor/insertCursoAsignaturaProfesor.php',
	'ui/cursoAsignaturaProfesor/updateCursoAsignaturaProfesor.php',
	'ui/cursoAsignaturaProfesor/selectAllCursoAsignaturaProfesor.php',
	'ui/cursoAsignaturaProfesor/searchCursoAsignaturaProfesor.php',
	'ui/periodo/insertPeriodo.php',
	'ui/periodo/updatePeriodo.php',
	'ui/periodo/selectAllPeriodo.php',
	'ui/periodo/searchPeriodo.php',
	'ui/calificacion/selectAllCalificacionByPeriodo.php',
	'ui/calificacion/insertCalificacion.php',
	'ui/calificacion/updateCalificacion.php',
	'ui/calificacion/selectAllCalificacion.php',
	'ui/calificacion/searchCalificacion.php',
	'ui/tipoCalificacion/insertTipoCalificacion.php',
	'ui/tipoCalificacion/updateTipoCalificacion.php',
	'ui/tipoCalificacion/selectAllTipoCalificacion.php',
	'ui/tipoCalificacion/searchTipoCalificacion.php',
	'ui/calificacion/selectAllCalificacionByTipoCalificacion.php',
	'ui/logSecretaria/searchLogSecretaria.php',
	'ui/sessionSecretaria.php',
	'ui/secretaria/insertSecretaria.php',
	'ui/secretaria/updateSecretaria.php',
	'ui/secretaria/selectAllSecretaria.php',
	'ui/secretaria/searchSecretaria.php',
	'ui/secretaria/updateProfileSecretaria.php',
	'ui/secretaria/updatePasswordSecretaria.php',
);
if(isset($_GET['logOut'])){
	$_SESSION['id']="";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GBS</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/png" href="img/logo.png" />
		<!--Bootstrap CSS -->
		<link rel="stylesheet" href="css/lumen/bootstrap.min.css">
		
        <!---Estilos propios css-->
        <link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" href="css/logIn.css">
		
		<link href="https://fonts.googleapis.com/css?family=Solway&display=swap" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
		<script charset="utf-8">
				$(function () { 
				$("[data-toggle='tooltip']").tooltip(); 
			});
		</script>
	</head>
	<body>
		<?php

		if(empty($_GET['pid'])){
			include('ui/home.php' );
		}else{
			include base64_decode($_GET['pid']);		
		}
		?>
		<div class="text-center text-muted">Gimnasio Bilingüe de Sibaté &copy; <?php echo date("Y")?></div>
	</body>
</html>
