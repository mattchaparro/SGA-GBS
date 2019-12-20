<?php
require_once ("persistence/CursoAsignaturaProfesorDAO.php");
require_once ("persistence/Connection.php");

class CursoAsignaturaProfesor {
	private $idCursoAsignaturaProfesor;
	private $noused;
	private $curso;
	private $asignatura;
	private $profesor;
	private $cursoAsignaturaProfesorDAO;
	private $connection;

	function getIdCursoAsignaturaProfesor() {
		return $this -> idCursoAsignaturaProfesor;
	}

	function setIdCursoAsignaturaProfesor($pIdCursoAsignaturaProfesor) {
		$this -> idCursoAsignaturaProfesor = $pIdCursoAsignaturaProfesor;
	}

	function getNoused() {
		return $this -> noused;
	}

	function setNoused($pNoused) {
		$this -> noused = $pNoused;
	}

	function getCurso() {
		return $this -> curso;
	}

	function setCurso($pCurso) {
		$this -> curso = $pCurso;
	}

	function getAsignatura() {
		return $this -> asignatura;
	}

	function setAsignatura($pAsignatura) {
		$this -> asignatura = $pAsignatura;
	}

	function getProfesor() {
		return $this -> profesor;
	}

	function setProfesor($pProfesor) {
		$this -> profesor = $pProfesor;
	}

	function CursoAsignaturaProfesor($pIdCursoAsignaturaProfesor = "", $pNoused = "", $pCurso = "", $pAsignatura = "", $pProfesor = ""){
		$this -> idCursoAsignaturaProfesor = $pIdCursoAsignaturaProfesor;
		$this -> noused = $pNoused;
		$this -> curso = $pCurso;
		$this -> asignatura = $pAsignatura;
		$this -> profesor = $pProfesor;
		$this -> cursoAsignaturaProfesorDAO = new CursoAsignaturaProfesorDAO($this -> idCursoAsignaturaProfesor, $this -> noused, $this -> curso, $this -> asignatura, $this -> profesor);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCursoAsignaturaProfesor = $result[0];
		$this -> noused = $result[1];
		$curso = new Curso($result[2]);
		$curso -> select();
		$this -> curso = $curso;
		$asignatura = new Asignatura($result[3]);
		$asignatura -> select();
		$this -> asignatura = $asignatura;
		$profesor = new Profesor($result[4]);
		$profesor -> select();
		$this -> profesor = $profesor;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> selectAll());
		$cursoAsignaturaProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$profesor = new Profesor($result[4]);
			$profesor -> select();
			array_push($cursoAsignaturaProfesors, new CursoAsignaturaProfesor($result[0], $result[1], $curso, $asignatura, $profesor));
		}
		$this -> connection -> close();
		return $cursoAsignaturaProfesors;
	}

	function selectAllByCurso(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> selectAllByCurso());
		$cursoAsignaturaProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$profesor = new Profesor($result[4]);
			$profesor -> select();
			array_push($cursoAsignaturaProfesors, new CursoAsignaturaProfesor($result[0], $result[1], $curso, $asignatura, $profesor));
		}
		$this -> connection -> close();
		return $cursoAsignaturaProfesors;
	}

	function selectAllByAsignatura(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> selectAllByAsignatura());
		$cursoAsignaturaProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$profesor = new Profesor($result[4]);
			$profesor -> select();
			array_push($cursoAsignaturaProfesors, new CursoAsignaturaProfesor($result[0], $result[1], $curso, $asignatura, $profesor));
		}
		$this -> connection -> close();
		return $cursoAsignaturaProfesors;
	}

	function selectAllByProfesor(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> selectAllByProfesor());
		$cursoAsignaturaProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$profesor = new Profesor($result[4]);
			$profesor -> select();
			array_push($cursoAsignaturaProfesors, new CursoAsignaturaProfesor($result[0], $result[1], $curso, $asignatura, $profesor));
		}
		$this -> connection -> close();
		return $cursoAsignaturaProfesors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> selectAllOrder($order, $dir));
		$cursoAsignaturaProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$profesor = new Profesor($result[4]);
			$profesor -> select();
			array_push($cursoAsignaturaProfesors, new CursoAsignaturaProfesor($result[0], $result[1], $curso, $asignatura, $profesor));
		}
		$this -> connection -> close();
		return $cursoAsignaturaProfesors;
	}

	function selectAllByCursoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> selectAllByCursoOrder($order, $dir));
		$cursoAsignaturaProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$profesor = new Profesor($result[4]);
			$profesor -> select();
			array_push($cursoAsignaturaProfesors, new CursoAsignaturaProfesor($result[0], $result[1], $curso, $asignatura, $profesor));
		}
		$this -> connection -> close();
		return $cursoAsignaturaProfesors;
	}

	function selectAllByAsignaturaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> selectAllByAsignaturaOrder($order, $dir));
		$cursoAsignaturaProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$profesor = new Profesor($result[4]);
			$profesor -> select();
			array_push($cursoAsignaturaProfesors, new CursoAsignaturaProfesor($result[0], $result[1], $curso, $asignatura, $profesor));
		}
		$this -> connection -> close();
		return $cursoAsignaturaProfesors;
	}

	function selectAllByProfesorOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> selectAllByProfesorOrder($order, $dir));
		$cursoAsignaturaProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$profesor = new Profesor($result[4]);
			$profesor -> select();
			array_push($cursoAsignaturaProfesors, new CursoAsignaturaProfesor($result[0], $result[1], $curso, $asignatura, $profesor));
		}
		$this -> connection -> close();
		return $cursoAsignaturaProfesors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> search($search));
		$cursoAsignaturaProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$profesor = new Profesor($result[4]);
			$profesor -> select();
			array_push($cursoAsignaturaProfesors, new CursoAsignaturaProfesor($result[0], $result[1], $curso, $asignatura, $profesor));
		}
		$this -> connection -> close();
		return $cursoAsignaturaProfesors;
	}

	function selectAllByProfesorCurso($idCurso){
		$this -> connection -> open();
		//echo $this -> cursoAsignaturaProfesorDAO -> selectAllByProfesorCurso($idCurso);
		$this -> connection -> run($this -> cursoAsignaturaProfesorDAO -> selectAllByProfesorCurso($idCurso));
		$cursoAsignaturaProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[2]);
			$curso -> select();
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$profesor = new Profesor($result[4]);
			$profesor -> select();
			array_push($cursoAsignaturaProfesors, new CursoAsignaturaProfesor($result[0], $result[1], $curso, $asignatura, $profesor));
		}
		$this -> connection -> close();
		return $cursoAsignaturaProfesors;
	}
}
?>
