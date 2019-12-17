<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$asignatura = new Asignatura($_GET['idAsignatura']); 
$asignatura -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Logro of Asignatura: <em><?php echo $asignatura -> getNombre() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Nombre 
						<?php if($order=="nombre" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/logro/selectAllLogroByAsignatura.php") ?>&idAsignatura=<?php echo $_GET['idAsignatura'] ?>&order=nombre&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="nombre" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/logro/selectAllLogroByAsignatura.php") ?>&idAsignatura=<?php echo $_GET['idAsignatura'] ?>&order=nombre&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Descripcion 
						<?php if($order=="descripcion" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/logro/selectAllLogroByAsignatura.php") ?>&idAsignatura=<?php echo $_GET['idAsignatura'] ?>&order=descripcion&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="descripcion" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/logro/selectAllLogroByAsignatura.php") ?>&idAsignatura=<?php echo $_GET['idAsignatura'] ?>&order=descripcion&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Asignatura</th>
						<th>Tipo Logro</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$logro = new Logro("", "", "", $_GET['idAsignatura'], "");
					if($order!="" && $dir!="") {
						$logros = $logro -> selectAllByAsignaturaOrder($order, $dir);
					} else {
						$logros = $logro -> selectAllByAsignatura();
					}
					$counter = 1;
					foreach ($logros as $currentLogro) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentLogro -> getNombre() . "</td>";
						echo "<td>" . $currentLogro -> getDescripcion() . "</td>";
						echo "<td>" . $currentLogro -> getAsignatura() -> getNombre() . "</td>";
						echo "<td>" . $currentLogro -> getTipoLogro() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/logro/updateLogro.php") . "&idLogro=" . $currentLogro -> getIdLogro() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Logro' ></span></a> ";
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
