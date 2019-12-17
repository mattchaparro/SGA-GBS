<?php
class LogSecretariaDAO{
	private $idLogSecretaria;
	private $action;
	private $information;
	private $date;
	private $time;
	private $ip;
	private $os;
	private $browser;
	private $secretaria;

	function LogSecretariaDAO($pIdLogSecretaria = "", $pAction = "", $pInformation = "", $pDate = "", $pTime = "", $pIp = "", $pOs = "", $pBrowser = "", $pSecretaria = ""){
		$this -> idLogSecretaria = $pIdLogSecretaria;
		$this -> action = $pAction;
		$this -> information = $pInformation;
		$this -> date = $pDate;
		$this -> time = $pTime;
		$this -> ip = $pIp;
		$this -> os = $pOs;
		$this -> browser = $pBrowser;
		$this -> secretaria = $pSecretaria;
	}

	function insert(){
		return "insert into LogSecretaria(action, information, date, time, ip, os, browser, secretaria_idSecretaria)
				values('" . $this -> action . "', '" . $this -> information . "', '" . $this -> date . "', '" . $this -> time . "', '" . $this -> ip . "', '" . $this -> os . "', '" . $this -> browser . "', '" . $this -> secretaria . "')";
	}

	function update(){
		return "update LogSecretaria set 
				action = '" . $this -> action . "',
				information = '" . $this -> information . "',
				date = '" . $this -> date . "',
				time = '" . $this -> time . "',
				ip = '" . $this -> ip . "',
				os = '" . $this -> os . "',
				browser = '" . $this -> browser . "',
				secretaria_idSecretaria = '" . $this -> secretaria . "'	
				where idLogSecretaria = '" . $this -> idLogSecretaria . "'";
	}

	function select() {
		return "select idLogSecretaria, action, information, date, time, ip, os, browser, secretaria_idSecretaria
				from LogSecretaria
				where idLogSecretaria = '" . $this -> idLogSecretaria . "'";
	}

	function selectAll() {
		return "select idLogSecretaria, action, information, date, time, ip, os, browser, secretaria_idSecretaria
				from LogSecretaria";
	}

	function selectAllBySecretaria() {
		return "select idLogSecretaria, action, information, date, time, ip, os, browser, secretaria_idSecretaria
				from LogSecretaria
				where secretaria_idSecretaria = '" . $this -> secretaria . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idLogSecretaria, action, information, date, time, ip, os, browser, secretaria_idSecretaria
				from LogSecretaria
				order by " . $orden . " " . $dir;
	}

	function selectAllBySecretariaOrder($orden, $dir) {
		return "select idLogSecretaria, action, information, date, time, ip, os, browser, secretaria_idSecretaria
				from LogSecretaria
				where secretaria_idSecretaria = '" . $this -> secretaria . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idLogSecretaria, action, information, date, time, ip, os, browser, secretaria_idSecretaria
				from LogSecretaria
				where action like '%" . $search . "%' or date like '%" . $search . "%' or time like '%" . $search . "%' or ip like '%" . $search . "%' or os like '%" . $search . "%' or browser like '%" . $search . "%'
				order by date desc, time desc";
	}
}
?>
