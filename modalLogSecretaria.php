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
$idLogSecretaria = $_GET ['idLogSecretaria'];
$logSecretaria = new LogSecretaria($idLogSecretaria);
$logSecretaria -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Log Secretaria</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Action</th>
			<td><?php echo str_replace(";; ", "<br>", $logSecretaria -> getAction()) ?></td>
		</tr>
		<tr>
			<th>Information</th>
			<td><?php echo str_replace(";; ", "<br>", $logSecretaria -> getInformation()) ?></td>
		</tr>
		<tr>
			<th>Date</th>
			<td><?php echo str_replace(";; ", "<br>", $logSecretaria -> getDate()) ?></td>
		</tr>
		<tr>
			<th>Time</th>
			<td><?php echo str_replace(";; ", "<br>", $logSecretaria -> getTime()) ?></td>
		</tr>
		<tr>
			<th>Ip</th>
			<td><?php echo str_replace(";; ", "<br>", $logSecretaria -> getIp()) ?></td>
		</tr>
		<tr>
			<th>Os</th>
			<td><?php echo str_replace(";; ", "<br>", $logSecretaria -> getOs()) ?></td>
		</tr>
		<tr>
			<th>Browser</th>
			<td><?php echo str_replace(";; ", "<br>", $logSecretaria -> getBrowser()) ?></td>
		</tr>
	</table>
</div>
