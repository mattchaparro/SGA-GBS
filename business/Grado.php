<?php
require_once ("persistence/GradoDAO.php");
require_once ("persistence/Connection.php");

class Grado {
	private $idGrado;
	private $nombre;
	private $gradoDAO;
	private $connection;

	function getIdGrado() {
		return $this -> idGrado;
	}

	function setIdGrado($pIdGrado) {
		$this -> idGrado = $pIdGrado;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function Grado($pIdGrado = "", $pNombre = ""){
		$this -> idGrado = $pIdGrado;
		$this -> nombre = $pNombre;
		$this -> gradoDAO = new GradoDAO($this -> idGrado, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> gradoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> gradoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> gradoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idGrado = $result[0];
		$this -> nombre = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> gradoDAO -> selectAll());
		$grados = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($grados, new Grado($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $grados;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> gradoDAO -> selectAllOrder($order, $dir));
		$grados = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($grados, new Grado($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $grados;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> gradoDAO -> search($search));
		$grados = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($grados, new Grado($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $grados;
	}
}
?>
