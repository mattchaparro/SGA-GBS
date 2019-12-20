<?php
class GradoDAO{
	private $idGrado;
	private $nombre;

	function GradoDAO($pIdGrado = "", $pNombre = ""){
		$this -> idGrado = $pIdGrado;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Grado(nombre)
				values('" . $this -> nombre . "')";
	}

	function update(){
		return "update Grado set 
				nombre = '" . $this -> nombre . "'	
				where idGrado = '" . $this -> idGrado . "'";
	}

	function select() {
		return "select idGrado, nombre
				from Grado
				where idGrado = '" . $this -> idGrado . "'";
	}

	function selectAll() {
		return "select idGrado, nombre
				from Grado";
	}

	function selectAllOrder($orden, $dir){
		return "select idGrado, nombre
				from Grado
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idGrado, nombre
				from Grado
				where nombre like '%" . $search . "%'";
	}
}
?>
