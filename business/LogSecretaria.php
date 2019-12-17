<?php
require_once ("persistence/LogSecretariaDAO.php");
require_once ("persistence/Connection.php");

class LogSecretaria {
	private $idLogSecretaria;
	private $action;
	private $information;
	private $date;
	private $time;
	private $ip;
	private $os;
	private $browser;
	private $secretaria;
	private $logSecretariaDAO;
	private $connection;

	function getIdLogSecretaria() {
		return $this -> idLogSecretaria;
	}

	function setIdLogSecretaria($pIdLogSecretaria) {
		$this -> idLogSecretaria = $pIdLogSecretaria;
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

	function getSecretaria() {
		return $this -> secretaria;
	}

	function setSecretaria($pSecretaria) {
		$this -> secretaria = $pSecretaria;
	}

	function LogSecretaria($pIdLogSecretaria = "", $pAction = "", $pInformation = "", $pDate = "", $pTime = "", $pIp = "", $pOs = "", $pBrowser = "", $pSecretaria = ""){
		$this -> idLogSecretaria = $pIdLogSecretaria;
		$this -> action = $pAction;
		$this -> information = $pInformation;
		$this -> date = $pDate;
		$this -> time = $pTime;
		$this -> ip = $pIp;
		$this -> os = $pOs;
		$this -> browser = $pBrowser;
		$this -> secretaria = $pSecretaria;
		$this -> logSecretariaDAO = new LogSecretariaDAO($this -> idLogSecretaria, $this -> action, $this -> information, $this -> date, $this -> time, $this -> ip, $this -> os, $this -> browser, $this -> secretaria);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logSecretariaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logSecretariaDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logSecretariaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idLogSecretaria = $result[0];
		$this -> action = $result[1];
		$this -> information = $result[2];
		$this -> date = $result[3];
		$this -> time = $result[4];
		$this -> ip = $result[5];
		$this -> os = $result[6];
		$this -> browser = $result[7];
		$secretaria = new Secretaria($result[8]);
		$secretaria -> select();
		$this -> secretaria = $secretaria;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logSecretariaDAO -> selectAll());
		$logSecretarias = array();
		while ($result = $this -> connection -> fetchRow()){
			$secretaria = new Secretaria($result[8]);
			$secretaria -> select();
			array_push($logSecretarias, new LogSecretaria($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $secretaria));
		}
		$this -> connection -> close();
		return $logSecretarias;
	}

	function selectAllBySecretaria(){
		$this -> connection -> open();
		$this -> connection -> run($this -> logSecretariaDAO -> selectAllBySecretaria());
		$logSecretarias = array();
		while ($result = $this -> connection -> fetchRow()){
			$secretaria = new Secretaria($result[8]);
			$secretaria -> select();
			array_push($logSecretarias, new LogSecretaria($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $secretaria));
		}
		$this -> connection -> close();
		return $logSecretarias;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logSecretariaDAO -> selectAllOrder($order, $dir));
		$logSecretarias = array();
		while ($result = $this -> connection -> fetchRow()){
			$secretaria = new Secretaria($result[8]);
			$secretaria -> select();
			array_push($logSecretarias, new LogSecretaria($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $secretaria));
		}
		$this -> connection -> close();
		return $logSecretarias;
	}

	function selectAllBySecretariaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> logSecretariaDAO -> selectAllBySecretariaOrder($order, $dir));
		$logSecretarias = array();
		while ($result = $this -> connection -> fetchRow()){
			$secretaria = new Secretaria($result[8]);
			$secretaria -> select();
			array_push($logSecretarias, new LogSecretaria($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $secretaria));
		}
		$this -> connection -> close();
		return $logSecretarias;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> logSecretariaDAO -> search($search));
		$logSecretarias = array();
		while ($result = $this -> connection -> fetchRow()){
			$secretaria = new Secretaria($result[8]);
			$secretaria -> select();
			array_push($logSecretarias, new LogSecretaria($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $secretaria));
		}
		$this -> connection -> close();
		return $logSecretarias;
	}
}
?>
