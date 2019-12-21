<?php
class EstudianteDAO{
	private $idEstudiante;
	private $nombre;
	private $apellido;
	private $documento;
	private $fecha_nacimiento;
	private $fecha_matricula;
	private $sexo;
	private $curso;
	private $estadoEstudiante;

	function EstudianteDAO($pIdEstudiante = "", $pNombre = "", $pApellido = "", $pDocumento = "", $pFecha_nacimiento = "", $pFecha_matricula = "", $pSexo = "", $pCurso = "", $pEstadoEstudiante = ""){
		$this -> idEstudiante = $pIdEstudiante;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> documento = $pDocumento;
		$this -> fecha_nacimiento = $pFecha_nacimiento;
		$this -> fecha_matricula = $pFecha_matricula;
		$this -> sexo = $pSexo;
		$this -> curso = $pCurso;
		$this -> estadoEstudiante = $pEstadoEstudiante;
	}

	function insert(){
		return "insert into Estudiante(nombre, apellido, documento, fecha_nacimiento, fecha_matricula, sexo, curso_idCurso, estadoEstudiante_idEstadoEstudiante)
				values('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> documento . "', '" . $this -> fecha_nacimiento . "', '" . $this -> fecha_matricula . "', '" . $this -> sexo . "', '" . $this -> curso . "', '" . $this -> estadoEstudiante . "')";
	}

	function update(){
		return "update Estudiante set 
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				documento = '" . $this -> documento . "',
				fecha_nacimiento = '" . $this -> fecha_nacimiento . "',
				fecha_matricula = '" . $this -> fecha_matricula . "',
				sexo = '" . $this -> sexo . "',
				curso_idCurso = '" . $this -> curso . "',
				estadoEstudiante_idEstadoEstudiante = '" . $this -> estadoEstudiante . "'	
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}

	function select() {
		return "select idEstudiante, nombre, apellido, documento, fecha_nacimiento, fecha_matricula, sexo, curso_idCurso, estadoEstudiante_idEstadoEstudiante
				from Estudiante
				where idEstudiante = '" . $this -> idEstudiante . "'";
	}

	function selectAll() {
		return "select idEstudiante, nombre, apellido, documento, fecha_nacimiento, fecha_matricula, sexo, curso_idCurso, estadoEstudiante_idEstadoEstudiante
				from Estudiante";
	}

	function selectAllByCurso() {
		return "select idEstudiante, nombre, apellido, documento, fecha_nacimiento, fecha_matricula, sexo, curso_idCurso, estadoEstudiante_idEstadoEstudiante
				from Estudiante
				where curso_idCurso = '" . $this -> curso . "'";
	}

	function selectAllByEstadoEstudiante() {
		return "select idEstudiante, nombre, apellido, documento, fecha_nacimiento, fecha_matricula, sexo, curso_idCurso, estadoEstudiante_idEstadoEstudiante
				from Estudiante
				where estadoEstudiante_idEstadoEstudiante = '" . $this -> estadoEstudiante . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idEstudiante, nombre, apellido, documento, fecha_nacimiento, fecha_matricula, sexo, curso_idCurso, estadoEstudiante_idEstadoEstudiante
				from Estudiante
				order by " . $orden . " " . $dir;
	}

	function selectAllByCursoOrder($orden, $dir) {
		return "select idEstudiante, nombre, apellido, documento, fecha_nacimiento, fecha_matricula, sexo, curso_idCurso, estadoEstudiante_idEstadoEstudiante
				from Estudiante
				where curso_idCurso = '" . $this -> curso . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByEstadoEstudianteOrder($orden, $dir) {
		return "select idEstudiante, nombre, apellido, documento, fecha_nacimiento, fecha_matricula, sexo, curso_idCurso, estadoEstudiante_idEstadoEstudiante
				from Estudiante
				where estadoEstudiante_idEstadoEstudiante = '" . $this -> estadoEstudiante . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idEstudiante, nombre, apellido, documento, fecha_nacimiento, fecha_matricula, sexo, curso_idCurso, estadoEstudiante_idEstadoEstudiante
				from Estudiante
				where nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or documento like '%" . $search . "%' or fecha_nacimiento like '%" . $search . "%' or fecha_matricula like '%" . $search . "%' or sexo like '%" . $search . "%'";
	}

	function selectAllByCursoAsignatura($asignatura){
		return "select * 
				from estudiante INNER JOIN cursoasignaturaprofesor ON estudiante.curso_idCurso = cursoasignaturaprofesor.curso_idCurso 
				where cursoasignaturaprofesor.asignatura_idAsignatura = '" . $asignatura . "'
				order by estudiante.apellido asc";
	}
}
?>
