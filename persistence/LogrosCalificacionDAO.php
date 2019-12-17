<?php
class LogrosCalificacionDAO{
	private $idLogrosCalificacion;
	private $calificacion;
	private $logro;

	function LogrosCalificacionDAO($pIdLogrosCalificacion = "", $pCalificacion = "", $pLogro = ""){
		$this -> idLogrosCalificacion = $pIdLogrosCalificacion;
		$this -> calificacion = $pCalificacion;
		$this -> logro = $pLogro;
	}

	function insert(){
		return "insert into LogrosCalificacion(calificacion_idCalificacion, logro_idLogro)
				values('" . $this -> calificacion . "', '" . $this -> logro . "')";
	}

	function update(){
		return "update LogrosCalificacion set 
				calificacion_idCalificacion = '" . $this -> calificacion . "',
				logro_idLogro = '" . $this -> logro . "'	
				where idLogrosCalificacion = '" . $this -> idLogrosCalificacion . "'";
	}

	function select() {
		return "select idLogrosCalificacion, calificacion_idCalificacion, logro_idLogro
				from LogrosCalificacion
				where idLogrosCalificacion = '" . $this -> idLogrosCalificacion . "'";
	}

	function selectAll() {
		return "select idLogrosCalificacion, calificacion_idCalificacion, logro_idLogro
				from LogrosCalificacion";
	}

	function selectAllByCalificacion() {
		return "select idLogrosCalificacion, calificacion_idCalificacion, logro_idLogro
				from LogrosCalificacion
				where calificacion_idCalificacion = '" . $this -> calificacion . "'";
	}

	function selectAllByLogro() {
		return "select idLogrosCalificacion, calificacion_idCalificacion, logro_idLogro
				from LogrosCalificacion
				where logro_idLogro = '" . $this -> logro . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idLogrosCalificacion, calificacion_idCalificacion, logro_idLogro
				from LogrosCalificacion
				order by " . $orden . " " . $dir;
	}

	function selectAllByCalificacionOrder($orden, $dir) {
		return "select idLogrosCalificacion, calificacion_idCalificacion, logro_idLogro
				from LogrosCalificacion
				where calificacion_idCalificacion = '" . $this -> calificacion . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByLogroOrder($orden, $dir) {
		return "select idLogrosCalificacion, calificacion_idCalificacion, logro_idLogro
				from LogrosCalificacion
				where logro_idLogro = '" . $this -> logro . "'
				order by " . $orden . " " . $dir;
	}
}
?>
