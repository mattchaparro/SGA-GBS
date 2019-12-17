<?php
class TipoCalificacionDAO{
	private $idTipoCalificacion;
	private $nombre;

	function TipoCalificacionDAO($pIdTipoCalificacion = "", $pNombre = ""){
		$this -> idTipoCalificacion = $pIdTipoCalificacion;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into TipoCalificacion(nombre)
				values('" . $this -> nombre . "')";
	}

	function update(){
		return "update TipoCalificacion set 
				nombre = '" . $this -> nombre . "'	
				where idTipoCalificacion = '" . $this -> idTipoCalificacion . "'";
	}

	function select() {
		return "select idTipoCalificacion, nombre
				from TipoCalificacion
				where idTipoCalificacion = '" . $this -> idTipoCalificacion . "'";
	}

	function selectAll() {
		return "select idTipoCalificacion, nombre
				from TipoCalificacion";
	}

	function selectAllOrder($orden, $dir){
		return "select idTipoCalificacion, nombre
				from TipoCalificacion
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idTipoCalificacion, nombre
				from TipoCalificacion
				where nombre like '%" . $search . "%'";
	}
}
?>
