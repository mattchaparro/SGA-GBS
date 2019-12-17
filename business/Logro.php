<?php
require_once ("persistence/LogroDAO.php");
require_once ("persistence/Connection.php");

class Logro {
	private $idLogro;
	private $nombre;
	private $descripcion;
	private $asignatura;
	private $tipoLogro;
	private $logroDAO;
	private $connection;

	function getIdLogro() {
		return $this -> idLogro;
	}

	function setIdLogro($pIdLogro) {
		$this -> idLogro = $pIdLogro;
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

	function getAsignatura() {
		return $this -> asignatura;
	}

	function setAsignatura($pAsignatura) {
		$this -> asignatura = $pAsignatura;
	}

	function getTipoLogro() {
		return $this -> tipoLogro;
	}

	function setTipoLogro($pTipoLogro) {
		$this -> tipoLogro = $pTipoLogro;
	}

	function Logro($pIdLogro = "", $pNombre = "", $pDescripcion = "", $pAsignatura = "", $pTipoLogro = ""){
		$this -> idLogro = $pIdLogro;
		$this -> nombre = $pNombre;
		$this -> descripcion = $pDescripcion;
		$this -> asignatura = $pAsignatura;
		$this -> tipoLogro = $pTipoLogro;
		$this -> logroDAO = new LogroDAO($this -> idLogro, $this -> nombre, $this -> descripcion, $this -> asignatura, $this -> tipoLogro);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logroDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logroDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logroDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idLogro = $result[0];
		$this -> nombre = $result[1];
		$this -> descripcion = $result[2];
		$asignatura = new Asignatura($result[3]);
		$asignatura -> select();
		$this -> asignatura = $asignatura;
		$tipoLogro = new TipoLogro($result[4]);
		$tipoLogro -> select();
		$this -> tipoLogro = $tipoLogro;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logroDAO -> selectAll());
		$logros = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$tipoLogro = new TipoLogro($result[4]);
			$tipoLogro -> select();
			array_push($logros, new Logro($result[0], $result[1], $result[2], $asignatura, $tipoLogro));
		}
		$this -> connection -> close();
		return $logros;
	}

	function selectAllByAsignatura(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logroDAO -> selectAllByAsignatura());
		$logros = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$tipoLogro = new TipoLogro($result[4]);
			$tipoLogro -> select();
			array_push($logros, new Logro($result[0], $result[1], $result[2], $asignatura, $tipoLogro));
		}
		$this -> connection -> close();
		return $logros;
	}

	function selectAllByTipoLogro(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logroDAO -> selectAllByTipoLogro());
		$logros = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$tipoLogro = new TipoLogro($result[4]);
			$tipoLogro -> select();
			array_push($logros, new Logro($result[0], $result[1], $result[2], $asignatura, $tipoLogro));
		}
		$this -> connection -> close();
		return $logros;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logroDAO -> selectAllOrder($order, $dir));
		$logros = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$tipoLogro = new TipoLogro($result[4]);
			$tipoLogro -> select();
			array_push($logros, new Logro($result[0], $result[1], $result[2], $asignatura, $tipoLogro));
		}
		$this -> connection -> close();
		return $logros;
	}

	function selectAllByAsignaturaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logroDAO -> selectAllByAsignaturaOrder($order, $dir));
		$logros = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$tipoLogro = new TipoLogro($result[4]);
			$tipoLogro -> select();
			array_push($logros, new Logro($result[0], $result[1], $result[2], $asignatura, $tipoLogro));
		}
		$this -> connection -> close();
		return $logros;
	}

	function selectAllByTipoLogroOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logroDAO -> selectAllByTipoLogroOrder($order, $dir));
		$logros = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$tipoLogro = new TipoLogro($result[4]);
			$tipoLogro -> select();
			array_push($logros, new Logro($result[0], $result[1], $result[2], $asignatura, $tipoLogro));
		}
		$this -> connection -> close();
		return $logros;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> logroDAO -> search($search));
		$logros = array();
		while ($result = $this -> connection -> fetchRow()){
			$asignatura = new Asignatura($result[3]);
			$asignatura -> select();
			$tipoLogro = new TipoLogro($result[4]);
			$tipoLogro -> select();
			array_push($logros, new Logro($result[0], $result[1], $result[2], $asignatura, $tipoLogro));
		}
		$this -> connection -> close();
		return $logros;
	}
}
?>
