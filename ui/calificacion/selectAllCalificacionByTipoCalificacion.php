<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$tipoCalificacion = new TipoCalificacion($_GET['idTipoCalificacion']); 
$tipoCalificacion -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Calificacion of Tipo Calificacion: <em><?php echo $tipoCalificacion -> getNombre() ?></em></h4>
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
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/calificacion/selectAllCalificacionByTipoCalificacion.php") ?>&idTipoCalificacion=<?php echo $_GET['idTipoCalificacion'] ?>&order=nota&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="nota" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/calificacion/selectAllCalificacionByTipoCalificacion.php") ?>&idTipoCalificacion=<?php echo $_GET['idTipoCalificacion'] ?>&order=nota&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
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
					$calificacion = new Calificacion("", "", $_GET['idTipoCalificacion'], "", "", "");
					if($order!="" && $dir!="") {
						$calificacions = $calificacion -> selectAllByTipoCalificacionOrder($order, $dir);
					} else {
						$calificacions = $calificacion -> selectAllByTipoCalificacion();
					}
					$counter = 1;
					foreach ($calificacions as $currentCalificacion) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentCalificacion -> getNota() . "</td>";
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
					};
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
