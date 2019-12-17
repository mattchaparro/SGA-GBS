<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$logro = new Logro($_GET['idLogro']); 
$logro -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Logros Calificacion of Logro: <em><?php echo $logro -> getNombre() ?></em></h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th>Calificacion</th>
						<th>Logro</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$logrosCalificacion = new LogrosCalificacion("", "", $_GET['idLogro']);
					if($order!="" && $dir!="") {
						$logrosCalificacions = $logrosCalificacion -> selectAllByLogroOrder($order, $dir);
					} else {
						$logrosCalificacions = $logrosCalificacion -> selectAllByLogro();
					}
					$counter = 1;
					foreach ($logrosCalificacions as $currentLogrosCalificacion) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentLogrosCalificacion -> getCalificacion() -> getNota() . "</td>";
						echo "<td>" . $currentLogrosCalificacion -> getLogro() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/logrosCalificacion/updateLogrosCalificacion.php") . "&idLogrosCalificacion=" . $currentLogrosCalificacion -> getIdLogrosCalificacion() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Logros Calificacion' ></span></a> ";
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
