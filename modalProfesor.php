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
$idProfesor = $_GET ['idProfesor'];
$profesor = new Profesor($idProfesor);
$profesor -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Profesor</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Nombre</th>
			<td><?php echo $profesor -> getNombre() ?></td>
		</tr>
		<tr>
			<th>Apellido</th>
			<td><?php echo $profesor -> getApellido() ?></td>
		</tr>
		<tr>
			<th>Documento</th>
			<td><?php echo $profesor -> getDocumento() ?></td>
		</tr>
		<tr>
			<th>Correo</th>
			<td><?php echo $profesor -> getCorreo() ?></td>
		</tr>
		<tr>
			<th>Telefono</th>
			<td><?php echo $profesor -> getTelefono() ?></td>
		</tr>
		<tr>
			<th>State</th>
			<td><?php echo $profesor -> getState() ?></td>
		</tr>
	</table>

</div>

