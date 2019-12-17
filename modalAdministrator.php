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
$idAdministrator = $_GET ['idAdministrator'];
$administrator = new Administrator($idAdministrator);
$administrator -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Administrator</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Name</th>
			<td><?php echo $administrator -> getName() ?></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><?php echo $administrator -> getLastName() ?></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><?php echo $administrator -> getEmail() ?></td>
		</tr>
		<tr>
			<th>Picture</th>
				<td><img class="rounded" src="<?php echo $administrator -> getPicture() ?>" height="300px" /></td>
		</tr>
		<tr>
			<th>Phone</th>
			<td><?php echo $administrator -> getPhone() ?></td>
		</tr>
		<tr>
			<th>Mobile</th>
			<td><?php echo $administrator -> getMobile() ?></td>
		</tr>
		<tr>
			<th>State</th>
			<td><?php echo $administrator -> getState() ?></td>
		</tr>
	</table>
</div>
