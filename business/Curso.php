<?php
require_once ("persistence/CursoDAO.php");
require_once ("persistence/Connection.php");

class Curso {
	private $idCurso;
	private $nombre;
	private $anio;
	private $grado;
	private $cursoDAO;
	private $connection;

	function getIdCurso() {
		return $this -> idCurso;
	}

	function setIdCurso($pIdCurso) {
		$this -> idCurso = $pIdCurso;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getAnio() {
		return $this -> anio;
	}

	function setAnio($pAnio) {
		$this -> anio = $pAnio;
	}

	function getGrado() {
		return $this -> grado;
	}

	function setGrado($pGrado) {
		$this -> grado = $pGrado;
	}

	function Curso($pIdCurso = "", $pNombre = "", $pAnio = "", $pGrado = ""){
		$this -> idCurso = $pIdCurso;
		$this -> nombre = $pNombre;
		$this -> anio = $pAnio;
		$this -> grado = $pGrado;
		$this -> cursoDAO = new CursoDAO($this -> idCurso, $this -> nombre, $this -> anio, $this -> grado);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCurso = $result[0];
		$this -> nombre = $result[1];
		$this -> anio = $result[2];
		$grado = new Grado($result[3]);
		$grado -> select();
		$this -> grado = $grado;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectAll());
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			$grado = new Grado($result[3]);
			$grado -> select();
			array_push($cursos, new Curso($result[0], $result[1], $result[2], $grado));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function selectAllByGrado(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectAllByGrado());
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			$grado = new Grado($result[3]);
			$grado -> select();
			array_push($cursos, new Curso($result[0], $result[1], $result[2], $grado));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectAllOrder($order, $dir));
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			$grado = new Grado($result[3]);
			$grado -> select();
			array_push($cursos, new Curso($result[0], $result[1], $result[2], $grado));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function selectAllByGradoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectAllByGradoOrder($order, $dir));
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			$grado = new Grado($result[3]);
			$grado -> select();
			array_push($cursos, new Curso($result[0], $result[1], $result[2], $grado));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> search($search));
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			$grado = new Grado($result[3]);
			$grado -> select();
			array_push($cursos, new Curso($result[0], $result[1], $result[2], $grado));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function selectByNombre($nombre){
		$this -> connection -> open();
		echo $this -> cursoDAO -> selectByNombre($nombre);
		$this -> connection -> run($this -> cursoDAO -> selectByNombre($nombre));
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCurso = $result[0];
	}

}
?>
