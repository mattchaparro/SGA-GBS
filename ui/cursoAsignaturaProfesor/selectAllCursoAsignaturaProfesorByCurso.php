<?php
$order = "";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$curso = new Curso($_GET['idCurso']); 
$curso -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Curso Asignatura Profesor of Curso: <em><?php echo $curso -> getNombre() ?></em></h4>
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
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/cursoAsignaturaProfesor/selectAllCursoAsignaturaProfesorByCurso.php") ?>&idCurso=<?php echo $_GET['idCurso'] ?>&order=noused&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="noused" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/cursoAsignaturaProfesor/selectAllCursoAsignaturaProfesorByCurso.php") ?>&idCurso=<?php echo $_GET['idCurso'] ?>&order=noused&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
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
					$cursoAsignaturaProfesor = new CursoAsignaturaProfesor("", "", $_GET['idCurso'], "", "");
					if($order!="" && $dir!="") {
						$cursoAsignaturaProfesors = $cursoAsignaturaProfesor -> selectAllByCursoOrder($order, $dir);
					} else {
						$cursoAsignaturaProfesors = $cursoAsignaturaProfesor -> selectAllByCurso();
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
					};
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>
