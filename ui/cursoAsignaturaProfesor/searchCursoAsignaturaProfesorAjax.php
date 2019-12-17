<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Noused</th>
			<th>Curso</th>
			<th>Asignatura</th>
			<th>Profesor</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$cursoAsignaturaProfesor = new CursoAsignaturaProfesor();
		$cursoAsignaturaProfesors = $cursoAsignaturaProfesor -> search($_GET['search']);
		$counter = 1;
		foreach ($cursoAsignaturaProfesors as $currentCursoAsignaturaProfesor) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCursoAsignaturaProfesor -> getNoused()) . "</td>";
			echo "<td>" . $currentCursoAsignaturaProfesor -> getCurso() -> getNombre() . "</td>";
			echo "<td>" . $currentCursoAsignaturaProfesor -> getAsignatura() -> getNombre() . "</td>";
			echo "<td>" . $currentCursoAsignaturaProfesor -> getProfesor() -> getNombre() . " " . $currentCursoAsignaturaProfesor -> getProfesor() -> getApellido() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/cursoAsignaturaProfesor/updateCursoAsignaturaProfesor.php") . "&idCursoAsignaturaProfesor=" . $currentCursoAsignaturaProfesor -> getIdCursoAsignaturaProfesor() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Curso Asignatura Profesor' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
