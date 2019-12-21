<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Orden</th>
			<th nowrap>Fecha_inicio</th>
			<th nowrap>Fecha_fin</th>
			<th nowrap>Anio</th>
			<th nowrap>Encurso</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$periodo = new Periodo();
		$periodos = $periodo -> search($_GET['search']);
		$counter = 1;
		foreach ($periodos as $currentPeriodo) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPeriodo -> getOrden()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPeriodo -> getFecha_inicio()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPeriodo -> getFecha_fin()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPeriodo -> getAnio()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentPeriodo -> getEncurso()) . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/periodo/updatePeriodo.php") . "&idPeriodo=" . $currentPeriodo -> getIdPeriodo() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Periodo' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/calificacion/selectAllCalificacionByPeriodo.php") . "&idPeriodo=" . $currentPeriodo -> getIdPeriodo() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Calificacion' ></span></a> ";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/calificacion/insertCalificacion.php") . "&idPeriodo=" . $currentPeriodo -> getIdPeriodo() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Calificacion' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
