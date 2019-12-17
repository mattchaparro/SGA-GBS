<?php
session_start();
$idProfesor = $_SESSION['id'];
$curso = new Curso();
$nombre = "Cuarto";
$curso -> selectByNombre($nombre);
$idCurso = $curso -> getIdCurso();
$cursoAsignaturaProfesor = new CursoAsignaturaProfesor("","","","", $idProfesor);
$cursoAsignaturaProfesors = $cursoAsignaturaProfesor -> selectAllByProfesorCurso($idCurso);
if(count($cursoAsignaturaProfesors)){ 
?>
<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
                        <th>Asignatura</th>
						<th>Curso</th>
						<th>Profesor</th>
						<th> Evaluar</th>
					</tr>
				</thead>
				</tbody>
					<?php
					foreach ($cursoAsignaturaProfesors as $currentCursoAsignaturaProfesor) {
                        echo "<td>" . $currentCursoAsignaturaProfesor -> getAsignatura() -> getNombre() . "</td>";
						echo "<td>" . $currentCursoAsignaturaProfesor -> getCurso() -> getNombre() . "</td>";
						echo "<td>" . $currentCursoAsignaturaProfesor -> getProfesor() -> getNombre() . " " . $currentCursoAsignaturaProfesor -> getProfesor() -> getApellido() . "</td>";
						echo "<td class='text-center'>";
						echo "<a href='index.php?pid=" . base64_encode("ui/profesor/evaluarEstudiante.php") . "&idMateria=" . $currentCursoAsignaturaProfesor -> getAsignatura() -> getIdAsignatura() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Edit Curso Asignatura Profesor' ></span></a> ";
						echo "</td>";
						echo "</tr>";
						
					}
					?>
				</tbody>
			</table>
			<?php }else{ ?>
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Al parecer no tienes materias asignadas en este curso!</strong>.
				</div>
				<?php  } ?>