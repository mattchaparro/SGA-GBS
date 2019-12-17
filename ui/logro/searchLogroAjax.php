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
			<th nowrap>Descripcion</th>
			<th>Asignatura</th>
			<th>Tipo Logro</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$logro = new Logro();
		$logros = $logro -> search($_GET['search']);
		$counter = 1;
		foreach ($logros as $currentLogro) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogro -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentLogro -> getDescripcion()) . "</td>";
			echo "<td>" . $currentLogro -> getAsignatura() -> getNombre() . "</td>";
			echo "<td>" . $currentLogro -> getTipoLogro() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/logro/updateLogro.php") . "&idLogro=" . $currentLogro -> getIdLogro() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Logro' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
