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
			<h4 class="card-title">Get All Curso Asignatura Profesor</h4>
		</div>
		<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Noused 
						<?php if($order=="noused" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/cursoAsignaturaProfesor/selectAllCursoAsignaturaProfesor.php") ?>&order=noused&dir=asc'>
							<span class='fas fa-sort-amount-up' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' ></span></a>
						<?php } ?>
						<?php if($order=="noused" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a href='index.php?pid=<?php echo base64_encode("ui/cursoAsignaturaProfesor/selectAllCursoAsignaturaProfesor.php") ?>&order=noused&dir=desc'>
							<span class='fas fa-sort-amount-down' data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' ></span></a>
						<?php } ?>
						</th>
						<th>Curso</th>
						<th>Asignatura</th>
						<th>Profesor</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$cursoAsignaturaProfesor = new CursoAsignaturaProfesor();
					if($order != "" && $dir != "") {
						$cursoAsignaturaProfesors = $cursoAsignaturaProfesor -> selectAllOrder($order, $dir);
					} else {
						$cursoAsignaturaProfesors = $cursoAsignaturaProfesor -> selectAll();
					}
					$counter = 1;
					foreach ($cursoAsignaturaProfesors as $currentCursoAsignaturaProfesor) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentCursoAsignaturaProfesor -> getNoused() . "</td>";
						echo "<td>" . $currentCursoAsignaturaProfesor -> getCurso() -> getNombre() . "</td>";
						echo "<td>" . $currentCursoAsignaturaProfesor -> getAsignatura() -> getNombre() . "</td>";
						echo "<td>" . $currentCursoAsignaturaProfesor -> getProfesor() -> getNombre() . " " . $currentCursoAsignaturaProfesor -> getProfesor() -> getApellido() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
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
		</div>
	</div>
</div>
