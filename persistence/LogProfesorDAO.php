<?php
class LogProfesorDAO{
	private $idLogProfesor;
	private $action;
	private $information;
	private $date;
	private $time;
	private $ip;
	private $os;
	private $browser;
	private $profesor;

	function LogProfesorDAO($pIdLogProfesor = "", $pAction = "", $pInformation = "", $pDate = "", $pTime = "", $pIp = "", $pOs = "", $pBrowser = "", $pProfesor = ""){
		$this -> idLogProfesor = $pIdLogProfesor;
		$this -> action = $pAction;
		$this -> information = $pInformation;
		$this -> date = $pDate;
		$this -> time = $pTime;
		$this -> ip = $pIp;
		$this -> os = $pOs;
		$this -> browser = $pBrowser;
		$this -> profesor = $pProfesor;
	}

	function insert(){
		return "insert into LogProfesor(action, information, date, time, ip, os, browser, profesor_idProfesor)
				values('" . $this -> action . "', '" . $this -> information . "', '" . $this -> date . "', '" . $this -> time . "', '" . $this -> ip . "', '" . $this -> os . "', '" . $this -> browser . "', '" . $this -> profesor . "')";
	}

	function update(){
		return "update LogProfesor set 
				action = '" . $this -> action . "',
				information = '" . $this -> information . "',
				date = '" . $this -> date . "',
				time = '" . $this -> time . "',
				ip = '" . $this -> ip . "',
				os = '" . $this -> os . "',
				browser = '" . $this -> browser . "',
				profesor_idProfesor = '" . $this -> profesor . "'	
				where idLogProfesor = '" . $this -> idLogProfesor . "'";
	}

	function select() {
		return "select idLogProfesor, action, information, date, time, ip, os, browser, profesor_idProfesor
				from LogProfesor
				where idLogProfesor = '" . $this -> idLogProfesor . "'";
	}

	function selectAll() {
		return "select idLogProfesor, action, information, date, time, ip, os, browser, profesor_idProfesor
				from LogProfesor";
	}

	function selectAllByProfesor() {
		return "select idLogProfesor, action, information, date, time, ip, os, browser, profesor_idProfesor
				from LogProfesor
				where profesor_idProfesor = '" . $this -> profesor . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idLogProfesor, action, information, date, time, ip, os, browser, profesor_idProfesor
				from LogProfesor
				order by " . $orden . " " . $dir;
	}

	function selectAllByProfesorOrder($orden, $dir) {
		return "select idLogProfesor, action, information, date, time, ip, os, browser, profesor_idProfesor
				from LogProfesor
				where profesor_idProfesor = '" . $this -> profesor . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idLogProfesor, action, information, date, time, ip, os, browser, profesor_idProfesor
				from LogProfesor
				where action like '%" . $search . "%' or date like '%" . $search . "%' or time like '%" . $search . "%' or ip like '%" . $search . "%' or os like '%" . $search . "%' or browser like '%" . $search . "%'
				order by date desc, time desc";
	}
}
?>
