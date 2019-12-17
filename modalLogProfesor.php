<?php
require("business/Administrator.php");
require("business/LogAdministrator.php");
require("business/Estudiante.php");
require("business/Curso.php");
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
require_once("persistence/Connection.php");
$idLogProfesor = $_GET ['idLogProfesor'];
$logProfesor = new LogProfesor($idLogProfesor);
$logProfesor -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Log Profesor</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Action</th>
			<td><?php echo str_replace(";; ", "<br>", $logProfesor -> getAction()) ?></td>
		</tr>
		<tr>
			<th>Information</th>
			<td><?php echo str_replace(";; ", "<br>", $logProfesor -> getInformation()) ?></td>
		</tr>
		<tr>
			<th>Date</th>
			<td><?php echo str_replace(";; ", "<br>", $logProfesor -> getDate()) ?></td>
		</tr>
		<tr>
			<th>Time</th>
			<td><?php echo str_replace(";; ", "<br>", $logProfesor -> getTime()) ?></td>
		</tr>
		<tr>
			<th>Ip</th>
			<td><?php echo str_replace(";; ", "<br>", $logProfesor -> getIp()) ?></td>
		</tr>
		<tr>
			<th>Os</th>
			<td><?php echo str_replace(";; ", "<br>", $logProfesor -> getOs()) ?></td>
		</tr>
		<tr>
			<th>Browser</th>
			<td><?php echo str_replace(";; ", "<br>", $logProfesor -> getBrowser()) ?></td>
		</tr>
	</table>
</div>
