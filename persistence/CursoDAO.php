<?php
class CursoDAO{
	private $idCurso;
	private $nombre;
	private $anio;
	private $grado;

	function CursoDAO($pIdCurso = "", $pNombre = "", $pAnio = "", $pGrado = ""){
		$this -> idCurso = $pIdCurso;
		$this -> nombre = $pNombre;
		$this -> anio = $pAnio;
		$this -> grado = $pGrado;
	}

	function insert(){
		return "insert into Curso(nombre, anio, grado_idGrado)
				values('" . $this -> nombre . "', '" . $this -> anio . "', '" . $this -> grado . "')";
	}

	function update(){
		return "update Curso set 
				nombre = '" . $this -> nombre . "',
				anio = '" . $this -> anio . "',
				grado_idGrado = '" . $this -> grado . "'	
				where idCurso = '" . $this -> idCurso . "'";
	}

	function select() {
		return "select idCurso, nombre, anio, grado_idGrado
				from Curso
				where idCurso = '" . $this -> idCurso . "'";
	}

	function selectAll() {
		return "select idCurso, nombre, anio, grado_idGrado
				from Curso";
	}

	function selectAllByGrado() {
		return "select idCurso, nombre, anio, grado_idGrado
				from Curso
				where grado_idGrado = '" . $this -> grado . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idCurso, nombre, anio, grado_idGrado
				from Curso
				order by " . $orden . " " . $dir;
	}

	function selectAllByGradoOrder($orden, $dir) {
		return "select idCurso, nombre, anio, grado_idGrado
				from Curso
				where grado_idGrado = '" . $this -> grado . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCurso, nombre, anio, grado_idGrado
				from Curso
				where nombre like '%" . $search . "%' or anio like '%" . $search . "%'";
	}

	
	function selectByNombre($nombre) {
		return "select idCurso
				from Curso
				where nombre = '" . $nombre . "'";
	}
}
?>
