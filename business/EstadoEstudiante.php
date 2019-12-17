<?php
require_once ("persistence/EstadoEstudianteDAO.php");
require_once ("persistence/Connection.php");

class EstadoEstudiante {
	private $idEstadoEstudiante;
	private $nombre;
	private $descripcion;
	private $estadoEstudianteDAO;
	private $connection;

	function getIdEstadoEstudiante() {
		return $this -> idEstadoEstudiante;
	}

	function setIdEstadoEstudiante($pIdEstadoEstudiante) {
		$this -> idEstadoEstudiante = $pIdEstadoEstudiante;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getDescripcion() {
		return $this -> descripcion;
	}

	function setDescripcion($pDescripcion) {
		$this -> descripcion = $pDescripcion;
	}

	function EstadoEstudiante($pIdEstadoEstudiante = "", $pNombre = "", $pDescripcion = ""){
		$this -> idEstadoEstudiante = $pIdEstadoEstudiante;
		$this -> nombre = $pNombre;
		$this -> descripcion = $pDescripcion;
		$this -> estadoEstudianteDAO = new EstadoEstudianteDAO($this -> idEstadoEstudiante, $this -> nombre, $this -> descripcion);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoEstudianteDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoEstudianteDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoEstudianteDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idEstadoEstudiante = $result[0];
		$this -> nombre = $result[1];
		$this -> descripcion = $result[2];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoEstudianteDAO -> selectAll());
		$estadoEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($estadoEstudiantes, new EstadoEstudiante($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $estadoEstudiantes;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoEstudianteDAO -> selectAllOrder($order, $dir));
		$estadoEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($estadoEstudiantes, new EstadoEstudiante($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $estadoEstudiantes;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> estadoEstudianteDAO -> search($search));
		$estadoEstudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($estadoEstudiantes, new EstadoEstudiante($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $estadoEstudiantes;
	}
}
?>
