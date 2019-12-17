<?php
require_once ("persistence/CursoDAO.php");
require_once ("persistence/Connection.php");

class Curso {
	private $idCurso;
	private $nombre;
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

	function Curso($pIdCurso = "", $pNombre = ""){
		$this -> idCurso = $pIdCurso;
		$this -> nombre = $pNombre;
		$this -> cursoDAO = new CursoDAO($this -> idCurso, $this -> nombre);
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
	}

	function selectByNombre($nombre){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectByNombre($nombre));
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCurso = $result[0];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectAll());
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($cursos, new Curso($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> selectAllOrder($order, $dir));
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($cursos, new Curso($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $cursos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> cursoDAO -> search($search));
		$cursos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($cursos, new Curso($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $cursos;
	}
}
?>
