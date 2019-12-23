<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Calificacion</h4>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Nota 
						<?php if($order=="nota" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/calificacion/selectAllCalificacion.php") ?>&order=nota&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="nota" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/calificacion/selectAllCalificacion.php") ?>&order=nota&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Fallas 
						<?php if($order=="fallas" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/calificacion/selectAllCalificacion.php") ?>&order=fallas&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="fallas" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/calificacion/selectAllCalificacion.php") ?>&order=fallas&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th nowrap>Id Definitiva 
						<?php if($order=="idDefinitiva" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/calificacion/selectAllCalificacion.php") ?>&order=idDefinitiva&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="idDefinitiva" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/calificacion/selectAllCalificacion.php") ?>&order=idDefinitiva&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
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
					if($order != "" && $dir != "") {
						$calificacions = $calificacion -> selectAllOrder($order, $dir);
					} else {
						$calificacions = $calificacion -> selectAll();
					}
					$counter = 1;
					foreach ($calificacions as $currentCalificacion) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentCalificacion -> getNota() . "</td>";
						echo "<td>" . $currentCalificacion -> getFallas() . "</td>";
						echo "<td>" . $currentCalificacion -> getIdDefinitiva() . "</td>";
						echo "<td>" . $currentCalificacion -> getTipoCalificacion() -> getNombre() . "</td>";
						echo "<td>" . $currentCalificacion -> getPeriodo() -> getOrden() . "</td>";
						echo "<td>" . $currentCalificacion -> getEstudiante() -> getNombre() . " " . $currentCalificacion -> getEstudiante() -> getApellido() . "</td>";
						echo "<td>" . $currentCalificacion -> getAsignatura() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
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
		</div>
	</div>
</div>
