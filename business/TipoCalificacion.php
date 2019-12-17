<?php
require_once ("persistence/TipoCalificacionDAO.php");
require_once ("persistence/Connection.php");

class TipoCalificacion {
	private $idTipoCalificacion;
	private $nombre;
	private $tipoCalificacionDAO;
	private $connection;

	function getIdTipoCalificacion() {
		return $this -> idTipoCalificacion;
	}

	function setIdTipoCalificacion($pIdTipoCalificacion) {
		$this -> idTipoCalificacion = $pIdTipoCalificacion;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function TipoCalificacion($pIdTipoCalificacion = "", $pNombre = ""){
		$this -> idTipoCalificacion = $pIdTipoCalificacion;
		$this -> nombre = $pNombre;
		$this -> tipoCalificacionDAO = new TipoCalificacionDAO($this -> idTipoCalificacion, $this -> nombre);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoCalificacionDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoCalificacionDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoCalificacionDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idTipoCalificacion = $result[0];
		$this -> nombre = $result[1];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoCalificacionDAO -> selectAll());
		$tipoCalificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipoCalificacions, new TipoCalificacion($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $tipoCalificacions;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoCalificacionDAO -> selectAllOrder($order, $dir));
		$tipoCalificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipoCalificacions, new TipoCalificacion($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $tipoCalificacions;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoCalificacionDAO -> search($search));
		$tipoCalificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipoCalificacions, new TipoCalificacion($result[0], $result[1]));
		}
		$this -> connection -> close();
		return $tipoCalificacions;
	}
}
?>
