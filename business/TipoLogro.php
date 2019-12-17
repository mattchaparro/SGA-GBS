<?php
require_once ("persistence/TipoLogroDAO.php");
require_once ("persistence/Connection.php");

class TipoLogro {
	private $idTipoLogro;
	private $nombre;
	private $descripcion;
	private $tipoLogroDAO;
	private $connection;

	function getIdTipoLogro() {
		return $this -> idTipoLogro;
	}

	function setIdTipoLogro($pIdTipoLogro) {
		$this -> idTipoLogro = $pIdTipoLogro;
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

	function TipoLogro($pIdTipoLogro = "", $pNombre = "", $pDescripcion = ""){
		$this -> idTipoLogro = $pIdTipoLogro;
		$this -> nombre = $pNombre;
		$this -> descripcion = $pDescripcion;
		$this -> tipoLogroDAO = new TipoLogroDAO($this -> idTipoLogro, $this -> nombre, $this -> descripcion);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoLogroDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoLogroDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoLogroDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idTipoLogro = $result[0];
		$this -> nombre = $result[1];
		$this -> descripcion = $result[2];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoLogroDAO -> selectAll());
		$tipoLogros = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipoLogros, new TipoLogro($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $tipoLogros;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoLogroDAO -> selectAllOrder($order, $dir));
		$tipoLogros = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipoLogros, new TipoLogro($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $tipoLogros;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> tipoLogroDAO -> search($search));
		$tipoLogros = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($tipoLogros, new TipoLogro($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $tipoLogros;
	}
}
?>
