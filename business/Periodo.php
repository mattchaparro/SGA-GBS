<?php
require_once ("persistence/PeriodoDAO.php");
require_once ("persistence/Connection.php");

class Periodo {
	private $idPeriodo;
	private $orden;
	private $fecha_inicio;
	private $fecha_fin;
	private $anio;
	private $periodoDAO;
	private $connection;

	function getIdPeriodo() {
		return $this -> idPeriodo;
	}

	function setIdPeriodo($pIdPeriodo) {
		$this -> idPeriodo = $pIdPeriodo;
	}

	function getOrden() {
		return $this -> orden;
	}

	function setOrden($pOrden) {
		$this -> orden = $pOrden;
	}

	function getFecha_inicio() {
		return $this -> fecha_inicio;
	}

	function setFecha_inicio($pFecha_inicio) {
		$this -> fecha_inicio = $pFecha_inicio;
	}

	function getFecha_fin() {
		return $this -> fecha_fin;
	}

	function setFecha_fin($pFecha_fin) {
		$this -> fecha_fin = $pFecha_fin;
	}

	function getAnio() {
		return $this -> anio;
	}

	function setAnio($pAnio) {
		$this -> anio = $pAnio;
	}

	function Periodo($pIdPeriodo = "", $pOrden = "", $pFecha_inicio = "", $pFecha_fin = "", $pAnio = ""){
		$this -> idPeriodo = $pIdPeriodo;
		$this -> orden = $pOrden;
		$this -> fecha_inicio = $pFecha_inicio;
		$this -> fecha_fin = $pFecha_fin;
		$this -> anio = $pAnio;
		$this -> periodoDAO = new PeriodoDAO($this -> idPeriodo, $this -> orden, $this -> fecha_inicio, $this -> fecha_fin, $this -> anio);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> periodoDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> periodoDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> periodoDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idPeriodo = $result[0];
		$this -> orden = $result[1];
		$this -> fecha_inicio = $result[2];
		$this -> fecha_fin = $result[3];
		$this -> anio = $result[4];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> periodoDAO -> selectAll());
		$periodos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($periodos, new Periodo($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $periodos;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> periodoDAO -> selectAllOrder($order, $dir));
		$periodos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($periodos, new Periodo($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $periodos;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> periodoDAO -> search($search));
		$periodos = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($periodos, new Periodo($result[0], $result[1], $result[2], $result[3], $result[4]));
		}
		$this -> connection -> close();
		return $periodos;
	}
}
?>
