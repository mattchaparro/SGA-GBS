<?php
require_once ("persistence/LogProfesorDAO.php");
require_once ("persistence/Connection.php");

class LogProfesor {
	private $idLogProfesor;
	private $action;
	private $information;
	private $date;
	private $time;
	private $ip;
	private $os;
	private $browser;
	private $profesor;
	private $logProfesorDAO;
	private $connection;

	function getIdLogProfesor() {
		return $this -> idLogProfesor;
	}

	function setIdLogProfesor($pIdLogProfesor) {
		$this -> idLogProfesor = $pIdLogProfesor;
	}

	function getAction() {
		return $this -> action;
	}

	function setAction($pAction) {
		$this -> action = $pAction;
	}

	function getInformation() {
		return $this -> information;
	}

	function setInformation($pInformation) {
		$this -> information = $pInformation;
	}

	function getDate() {
		return $this -> date;
	}

	function setDate($pDate) {
		$this -> date = $pDate;
	}

	function getTime() {
		return $this -> time;
	}

	function setTime($pTime) {
		$this -> time = $pTime;
	}

	function getIp() {
		return $this -> ip;
	}

	function setIp($pIp) {
		$this -> ip = $pIp;
	}

	function getOs() {
		return $this -> os;
	}

	function setOs($pOs) {
		$this -> os = $pOs;
	}

	function getBrowser() {
		return $this -> browser;
	}

	function setBrowser($pBrowser) {
		$this -> browser = $pBrowser;
	}

	function getProfesor() {
		return $this -> profesor;
	}

	function setProfesor($pProfesor) {
		$this -> profesor = $pProfesor;
	}

	function LogProfesor($pIdLogProfesor = "", $pAction = "", $pInformation = "", $pDate = "", $pTime = "", $pIp = "", $pOs = "", $pBrowser = "", $pProfesor = ""){
		$this -> idLogProfesor = $pIdLogProfesor;
		$this -> action = $pAction;
		$this -> information = $pInformation;
		$this -> date = $pDate;
		$this -> time = $pTime;
		$this -> ip = $pIp;
		$this -> os = $pOs;
		$this -> browser = $pBrowser;
		$this -> profesor = $pProfesor;
		$this -> logProfesorDAO = new LogProfesorDAO($this -> idLogProfesor, $this -> action, $this -> information, $this -> date, $this -> time, $this -> ip, $this -> os, $this -> browser, $this -> profesor);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logProfesorDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logProfesorDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logProfesorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idLogProfesor = $result[0];
		$this -> action = $result[1];
		$this -> information = $result[2];
		$this -> date = $result[3];
		$this -> time = $result[4];
		$this -> ip = $result[5];
		$this -> os = $result[6];
		$this -> browser = $result[7];
		$profesor = new Profesor($result[8]);
		$profesor -> select();
		$this -> profesor = $profesor;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logProfesorDAO -> selectAll());
		$logProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[8]);
			$profesor -> select();
			array_push($logProfesors, new LogProfesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $profesor));
		}
		$this -> connection -> close();
		return $logProfesors;
	}

	function selectAllByProfesor(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logProfesorDAO -> selectAllByProfesor());
		$logProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[8]);
			$profesor -> select();
			array_push($logProfesors, new LogProfesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $profesor));
		}
		$this -> connection -> close();
		return $logProfesors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logProfesorDAO -> selectAllOrder($order, $dir));
		$logProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[8]);
			$profesor -> select();
			array_push($logProfesors, new LogProfesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $profesor));
		}
		$this -> connection -> close();
		return $logProfesors;
	}

	function selectAllByProfesorOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logProfesorDAO -> selectAllByProfesorOrder($order, $dir));
		$logProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[8]);
			$profesor -> select();
			array_push($logProfesors, new LogProfesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $profesor));
		}
		$this -> connection -> close();
		return $logProfesors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> logProfesorDAO -> search($search));
		$logProfesors = array();
		while ($result = $this -> connection -> fetchRow()){
			$profesor = new Profesor($result[8]);
			$profesor -> select();
			array_push($logProfesors, new LogProfesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $profesor));
		}
		$this -> connection -> close();
		return $logProfesors;
	}
}
?>
