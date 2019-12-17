<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Nota</th>
			<th>Tipo Calificacion</th>
			<th>Periodo</th>
			<th>Estudiante</th>
			<th>Asignatura</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$calificacion = new Calificacion();
		$calificacions = $calificacion -> search($_GET['search']);
		$counter = 1;
		foreach ($calificacions as $currentCalificacion) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentCalificacion -> getNota()) . "</td>";
			echo "<td>" . $currentCalificacion -> getTipoCalificacion() -> getNombre() . "</td>";
			echo "<td>" . $currentCalificacion -> getPeriodo() -> getOrden() . "</td>";
			echo "<td>" . $currentCalificacion -> getEstudiante() -> getNombre() . " " . $currentCalificacion -> getEstudiante() -> getApellido() . "</td>";
			echo "<td>" . $currentCalificacion -> getAsignatura() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/calificacion/updateCalificacion.php") . "&idCalificacion=" . $currentCalificacion -> getIdCalificacion() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Calificacion' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
