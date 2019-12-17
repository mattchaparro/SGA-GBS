<?php
class EstadoEstudianteDAO{
	private $idEstadoEstudiante;
	private $nombre;
	private $descripcion;

	function EstadoEstudianteDAO($pIdEstadoEstudiante = "", $pNombre = "", $pDescripcion = ""){
		$this -> idEstadoEstudiante = $pIdEstadoEstudiante;
		$this -> nombre = $pNombre;
		$this -> descripcion = $pDescripcion;
	}

	function insert(){
		return "insert into EstadoEstudiante(nombre, descripcion)
				values('" . $this -> nombre . "', '" . $this -> descripcion . "')";
	}

	function update(){
		return "update EstadoEstudiante set 
				nombre = '" . $this -> nombre . "',
				descripcion = '" . $this -> descripcion . "'	
				where idEstadoEstudiante = '" . $this -> idEstadoEstudiante . "'";
	}

	function select() {
		return "select idEstadoEstudiante, nombre, descripcion
				from EstadoEstudiante
				where idEstadoEstudiante = '" . $this -> idEstadoEstudiante . "'";
	}

	function selectAll() {
		return "select idEstadoEstudiante, nombre, descripcion
				from EstadoEstudiante";
	}

	function selectAllOrder($orden, $dir){
		return "select idEstadoEstudiante, nombre, descripcion
				from EstadoEstudiante
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idEstadoEstudiante, nombre, descripcion
				from EstadoEstudiante
				where nombre like '%" . $search . "%' or descripcion like '%" . $search . "%'";
	}
}
?>
