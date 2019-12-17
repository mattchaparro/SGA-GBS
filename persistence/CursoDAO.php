<?php
class CursoDAO{
	private $idCurso;
	private $nombre;

	function CursoDAO($pIdCurso = "", $pNombre = ""){
		$this -> idCurso = $pIdCurso;
		$this -> nombre = $pNombre;
	}

	function insert(){
		return "insert into Curso(nombre)
				values('" . $this -> nombre . "')";
	}

	function update(){
		return "update Curso set 
				nombre = '" . $this -> nombre . "'	
				where idCurso = '" . $this -> idCurso . "'";
	}

	function select() {
		return "select idCurso, nombre
				from Curso
				where idCurso = '" . $this -> idCurso . "'";
	}

	function selectByNombre($nombre) {
		return "select idCurso
				from Curso
				where nombre = '" . $nombre . "'";
	}

	function selectAll() {
		return "select idCurso, nombre
				from Curso";
	}

	function selectAllOrder($orden, $dir){
		return "select idCurso, nombre
				from Curso
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCurso, nombre
				from Curso
				where nombre like '%" . $search . "%'";
	}
}
?>
