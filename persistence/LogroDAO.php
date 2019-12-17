<?php
class LogroDAO{
	private $idLogro;
	private $nombre;
	private $descripcion;
	private $asignatura;
	private $tipoLogro;

	function LogroDAO($pIdLogro = "", $pNombre = "", $pDescripcion = "", $pAsignatura = "", $pTipoLogro = ""){
		$this -> idLogro = $pIdLogro;
		$this -> nombre = $pNombre;
		$this -> descripcion = $pDescripcion;
		$this -> asignatura = $pAsignatura;
		$this -> tipoLogro = $pTipoLogro;
	}

	function insert(){
		return "insert into Logro(nombre, descripcion, asignatura_idAsignatura, tipoLogro_idTipoLogro)
				values('" . $this -> nombre . "', '" . $this -> descripcion . "', '" . $this -> asignatura . "', '" . $this -> tipoLogro . "')";
	}

	function update(){
		return "update Logro set 
				nombre = '" . $this -> nombre . "',
				descripcion = '" . $this -> descripcion . "',
				asignatura_idAsignatura = '" . $this -> asignatura . "',
				tipoLogro_idTipoLogro = '" . $this -> tipoLogro . "'	
				where idLogro = '" . $this -> idLogro . "'";
	}

	function select() {
		return "select idLogro, nombre, descripcion, asignatura_idAsignatura, tipoLogro_idTipoLogro
				from Logro
				where idLogro = '" . $this -> idLogro . "'";
	}

	function selectAll() {
		return "select idLogro, nombre, descripcion, asignatura_idAsignatura, tipoLogro_idTipoLogro
				from Logro";
	}

	function selectAllByAsignatura() {
		return "select idLogro, nombre, descripcion, asignatura_idAsignatura, tipoLogro_idTipoLogro
				from Logro
				where asignatura_idAsignatura = '" . $this -> asignatura . "'";
	}

	function selectAllByTipoLogro() {
		return "select idLogro, nombre, descripcion, asignatura_idAsignatura, tipoLogro_idTipoLogro
				from Logro
				where tipoLogro_idTipoLogro = '" . $this -> tipoLogro . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idLogro, nombre, descripcion, asignatura_idAsignatura, tipoLogro_idTipoLogro
				from Logro
				order by " . $orden . " " . $dir;
	}

	function selectAllByAsignaturaOrder($orden, $dir) {
		return "select idLogro, nombre, descripcion, asignatura_idAsignatura, tipoLogro_idTipoLogro
				from Logro
				where asignatura_idAsignatura = '" . $this -> asignatura . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByTipoLogroOrder($orden, $dir) {
		return "select idLogro, nombre, descripcion, asignatura_idAsignatura, tipoLogro_idTipoLogro
				from Logro
				where tipoLogro_idTipoLogro = '" . $this -> tipoLogro . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idLogro, nombre, descripcion, asignatura_idAsignatura, tipoLogro_idTipoLogro
				from Logro
				where nombre like '%" . $search . "%' or descripcion like '%" . $search . "%'";
	}
}
?>
