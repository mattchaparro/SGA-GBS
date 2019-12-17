<?php
require_once ("persistence/LogrosCalificacionDAO.php");
require_once ("persistence/Connection.php");

class LogrosCalificacion {
	private $idLogrosCalificacion;
	private $calificacion;
	private $logro;
	private $logrosCalificacionDAO;
	private $connection;

	function getIdLogrosCalificacion() {
		return $this -> idLogrosCalificacion;
	}

	function setIdLogrosCalificacion($pIdLogrosCalificacion) {
		$this -> idLogrosCalificacion = $pIdLogrosCalificacion;
	}

	function getCalificacion() {
		return $this -> calificacion;
	}

	function setCalificacion($pCalificacion) {
		$this -> calificacion = $pCalificacion;
	}

	function getLogro() {
		return $this -> logro;
	}

	function setLogro($pLogro) {
		$this -> logro = $pLogro;
	}

	function LogrosCalificacion($pIdLogrosCalificacion = "", $pCalificacion = "", $pLogro = ""){
		$this -> idLogrosCalificacion = $pIdLogrosCalificacion;
		$this -> calificacion = $pCalificacion;
		$this -> logro = $pLogro;
		$this -> logrosCalificacionDAO = new LogrosCalificacionDAO($this -> idLogrosCalificacion, $this -> calificacion, $this -> logro);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logrosCalificacionDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logrosCalificacionDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logrosCalificacionDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idLogrosCalificacion = $result[0];
		$calificacion = new Calificacion($result[1]);
		$calificacion -> select();
		$this -> calificacion = $calificacion;
		$logro = new Logro($result[2]);
		$logro -> select();
		$this -> logro = $logro;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logrosCalificacionDAO -> selectAll());
		$logrosCalificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$calificacion = new Calificacion($result[1]);
			$calificacion -> select();
			$logro = new Logro($result[2]);
			$logro -> select();
			array_push($logrosCalificacions, new LogrosCalificacion($result[0], $calificacion, $logro));
		}
		$this -> connection -> close();
		return $logrosCalificacions;
	}

	function selectAllByCalificacion(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logrosCalificacionDAO -> selectAllByCalificacion());
		$logrosCalificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$calificacion = new Calificacion($result[1]);
			$calificacion -> select();
			$logro = new Logro($result[2]);
			$logro -> select();
			array_push($logrosCalificacions, new LogrosCalificacion($result[0], $calificacion, $logro));
		}
		$this -> connection -> close();
		return $logrosCalificacions;
	}

	function selectAllByLogro(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logrosCalificacionDAO -> selectAllByLogro());
		$logrosCalificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$calificacion = new Calificacion($result[1]);
			$calificacion -> select();
			$logro = new Logro($result[2]);
			$logro -> select();
			array_push($logrosCalificacions, new LogrosCalificacion($result[0], $calificacion, $logro));
		}
		$this -> connection -> close();
		return $logrosCalificacions;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logrosCalificacionDAO -> selectAllOrder($order, $dir));
		$logrosCalificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$calificacion = new Calificacion($result[1]);
			$calificacion -> select();
			$logro = new Logro($result[2]);
			$logro -> select();
			array_push($logrosCalificacions, new LogrosCalificacion($result[0], $calificacion, $logro));
		}
		$this -> connection -> close();
		return $logrosCalificacions;
	}

	function selectAllByCalificacionOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logrosCalificacionDAO -> selectAllByCalificacionOrder($order, $dir));
		$logrosCalificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$calificacion = new Calificacion($result[1]);
			$calificacion -> select();
			$logro = new Logro($result[2]);
			$logro -> select();
			array_push($logrosCalificacions, new LogrosCalificacion($result[0], $calificacion, $logro));
		}
		$this -> connection -> close();
		return $logrosCalificacions;
	}

	function selectAllByLogroOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logrosCalificacionDAO -> selectAllByLogroOrder($order, $dir));
		$logrosCalificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$calificacion = new Calificacion($result[1]);
			$calificacion -> select();
			$logro = new Logro($result[2]);
			$logro -> select();
			array_push($logrosCalificacions, new LogrosCalificacion($result[0], $calificacion, $logro));
		}
		$this -> connection -> close();
		return $logrosCalificacions;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> logrosCalificacionDAO -> search($search));
		$logrosCalificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$calificacion = new Calificacion($result[1]);
			$calificacion -> select();
			$logro = new Logro($result[2]);
			$logro -> select();
			array_push($logrosCalificacions, new LogrosCalificacion($result[0], $calificacion, $logro));
		}
		$this -> connection -> close();
		return $logrosCalificacions;
	}
}
?>
