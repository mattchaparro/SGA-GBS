<?php
class CursoAsignaturaProfesorDAO{
	private $idCursoAsignaturaProfesor;
	private $noused;
	private $curso;
	private $asignatura;
	private $profesor;

	function CursoAsignaturaProfesorDAO($pIdCursoAsignaturaProfesor = "", $pNoused = "", $pCurso = "", $pAsignatura = "", $pProfesor = ""){
		$this -> idCursoAsignaturaProfesor = $pIdCursoAsignaturaProfesor;
		$this -> noused = $pNoused;
		$this -> curso = $pCurso;
		$this -> asignatura = $pAsignatura;
		$this -> profesor = $pProfesor;
	}

	function insert(){
		return "insert into CursoAsignaturaProfesor(noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor)
				values('" . $this -> noused . "', '" . $this -> curso . "', '" . $this -> asignatura . "', '" . $this -> profesor . "')";
	}

	function update(){
		return "update CursoAsignaturaProfesor set 
				noused = '" . $this -> noused . "',
				curso_idCurso = '" . $this -> curso . "',
				asignatura_idAsignatura = '" . $this -> asignatura . "',
				profesor_idProfesor = '" . $this -> profesor . "'	
				where idCursoAsignaturaProfesor = '" . $this -> idCursoAsignaturaProfesor . "'";
	}

	function select() {
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor
				where idCursoAsignaturaProfesor = '" . $this -> idCursoAsignaturaProfesor . "'";
	}

	function selectAll() {
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor";
	}

	function selectAllByCurso() {
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor
				where curso_idCurso = '" . $this -> curso . "'";
	}

	function selectAllByAsignatura() {
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor
				where asignatura_idAsignatura = '" . $this -> asignatura . "'";
	}

	function selectAllByProfesor() {
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor
				where profesor_idProfesor = '" . $this -> profesor . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor
				order by " . $orden . " " . $dir;
	}

	function selectAllByCursoOrder($orden, $dir) {
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor
				where curso_idCurso = '" . $this -> curso . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByAsignaturaOrder($orden, $dir) {
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor
				where asignatura_idAsignatura = '" . $this -> asignatura . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByProfesorOrder($orden, $dir) {
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor
				where profesor_idProfesor = '" . $this -> profesor . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor
				where noused like '%" . $search . "%'";
	}

	function selectAllByProfesorCurso($idCurso) {
		return "select idCursoAsignaturaProfesor, noused, curso_idCurso, asignatura_idAsignatura, profesor_idProfesor
				from CursoAsignaturaProfesor
				where curso_idCurso = '".  $idCurso . "'and profesor_idProfesor = '" . $this -> profesor . "'";
	}
}
?>
