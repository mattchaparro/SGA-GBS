<?php
$order = "apellido";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "desc";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$estadoEstudiante = new EstadoEstudiante($_GET['idEstadoEstudiante']); 
$estadoEstudiante -> select();
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Get All Estudiante of Estado Estudiante: <em><?php echo $estadoEstudiante -> getNombre() ?></em></h4>
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
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=nombre&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="nombre" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=nombre&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Apellido 
						<?php if($order=="apellido" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=apellido&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="apellido" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=apellido&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Documento 
						<?php if($order=="documento" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=documento&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="documento" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=documento&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Fecha_nacimiento 
						<?php if($order=="fecha_nacimiento" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=fecha_nacimiento&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="fecha_nacimiento" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=fecha_nacimiento&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Fecha_matricula 
						<?php if($order=="fecha_matricula" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=fecha_matricula&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="fecha_matricula" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=fecha_matricula&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Sexo 
						<?php if($order=="sexo" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Ascending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=sexo&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="sexo" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Sort Descending' href='index.php?pid=<?php echo base64_encode("ui/estudiante/selectAllEstudianteByEstadoEstudiante.php") ?>&idEstadoEstudiante=<?php echo $_GET['idEstadoEstudiante'] ?>&order=sexo&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Curso</th>
						<th>Estado Estudiante</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$estudiante = new Estudiante("", "", "", "", "", "", "", "", $_GET['idEstadoEstudiante']);
					if($order!="" && $dir!="") {
						$estudiantes = $estudiante -> selectAllByEstadoEstudianteOrder($order, $dir);
					} else {
						$estudiantes = $estudiante -> selectAllByEstadoEstudiante();
					}
					$counter = 1;
					foreach ($estudiantes as $currentEstudiante) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentEstudiante -> getNombre() . "</td>";
						echo "<td>" . $currentEstudiante -> getApellido() . "</td>";
						echo "<td>" . $currentEstudiante -> getDocumento() . "</td>";
						echo "<td>" . $currentEstudiante -> getFecha_nacimiento() . "</td>";
						echo "<td>" . $currentEstudiante -> getFecha_matricula() . "</td>";
						echo "<td>" . $currentEstudiante -> getSexo() . "</td>";
						echo "<td>" . $currentEstudiante -> getCurso() -> getNombre() . "</td>";
						echo "<td>" . $currentEstudiante -> getEstadoEstudiante() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/estudiante/updateEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Estudiante' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/calificacion/selectAllCalificacionByEstudiante.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Get All Calificacion' ></span></a> ";
						if($_SESSION['entity'] == 'Administrator') {
							echo "<a href='index.php?pid=" . base64_encode("ui/calificacion/insertCalificacion.php") . "&idEstudiante=" . $currentEstudiante -> getIdEstudiante() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Create Calificacion' ></span></a> ";
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
