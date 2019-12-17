<?php
class TipoLogroDAO{
	private $idTipoLogro;
	private $nombre;
	private $descripcion;

	function TipoLogroDAO($pIdTipoLogro = "", $pNombre = "", $pDescripcion = ""){
		$this -> idTipoLogro = $pIdTipoLogro;
		$this -> nombre = $pNombre;
		$this -> descripcion = $pDescripcion;
	}

	function insert(){
		return "insert into TipoLogro(nombre, descripcion)
				values('" . $this -> nombre . "', '" . $this -> descripcion . "')";
	}

	function update(){
		return "update TipoLogro set 
				nombre = '" . $this -> nombre . "',
				descripcion = '" . $this -> descripcion . "'	
				where idTipoLogro = '" . $this -> idTipoLogro . "'";
	}

	function select() {
		return "select idTipoLogro, nombre, descripcion
				from TipoLogro
				where idTipoLogro = '" . $this -> idTipoLogro . "'";
	}

	function selectAll() {
		return "select idTipoLogro, nombre, descripcion
				from TipoLogro";
	}

	function selectAllOrder($orden, $dir){
		return "select idTipoLogro, nombre, descripcion
				from TipoLogro
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idTipoLogro, nombre, descripcion
				from TipoLogro
				where nombre like '%" . $search . "%' or descripcion like '%" . $search . "%'";
	}
}
?>
