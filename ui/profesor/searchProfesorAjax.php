<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Nombre</th>
			<th nowrap>Apellido</th>
			<th nowrap>Documento</th>
			<th nowrap>Correo</th>
			<th nowrap>Telefono</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$profesor = new Profesor();
		$profesors = $profesor -> search($_GET['search']);
		$counter = 1;
		foreach ($profesors as $currentProfesor) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getApellido()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getDocumento()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getCorreo()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentProfesor -> getTelefono()) . "</td>";
						echo "<td class='text-right' nowrap>";
						echo "<a href='modalProfesor.php?idProfesor=" . $currentProfesor -> getIdProfesor() . "'  data-toggle='modal' data-target='#modalProfesor' ><span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='View more information' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/profesor/updateProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Profesor' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/cursoAsignaturaProfesor/selectAllCursoAsignaturaProfesorByProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Curso Asignatura Profesor' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/cursoAsignaturaProfesor/insertCursoAsignaturaProfesor.php") . "&idProfesor=" . $currentProfesor -> getIdProfesor() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Curso Asignatura Profesor' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
<div class="modal fade" id="modalProfesor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>
