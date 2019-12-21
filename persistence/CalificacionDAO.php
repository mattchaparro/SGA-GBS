<?php
class CalificacionDAO{
	private $idCalificacion;
	private $nota;
	private $fallas;
	private $tipoCalificacion;
	private $periodo;
	private $estudiante;
	private $asignatura;

	function CalificacionDAO($pIdCalificacion = "", $pNota = "", $pFallas = "", $pTipoCalificacion = "", $pPeriodo = "", $pEstudiante = "", $pAsignatura = ""){
		$this -> idCalificacion = $pIdCalificacion;
		$this -> nota = $pNota;
		$this -> fallas = $pFallas;
		$this -> tipoCalificacion = $pTipoCalificacion;
		$this -> periodo = $pPeriodo;
		$this -> estudiante = $pEstudiante;
		$this -> asignatura = $pAsignatura;
	}

	function insert(){
		return "insert into Calificacion(nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura)
				values('" . $this -> nota . "', '" . $this -> fallas . "', '" . $this -> tipoCalificacion . "', '" . $this -> periodo . "', '" . $this -> estudiante . "', '" . $this -> asignatura . "')";
	}

	function update(){
		return "update Calificacion set 
				nota = '" . $this -> nota . "',
				fallas = '" . $this -> fallas . "',
				tipoCalificacion_idTipoCalificacion = '" . $this -> tipoCalificacion . "',
				periodo_idPeriodo = '" . $this -> periodo . "',
				estudiante_idEstudiante = '" . $this -> estudiante . "',
				asignatura_idAsignatura = '" . $this -> asignatura . "'	
				where idCalificacion = '" . $this -> idCalificacion . "'";
	}

	function select() {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				where idCalificacion = '" . $this -> idCalificacion . "'";
	}

	function selectAll() {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion";
	}

	function selectAllByTipoCalificacion() {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				where tipoCalificacion_idTipoCalificacion = '" . $this -> tipoCalificacion . "'";
	}

	function selectAllByPeriodo() {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				where periodo_idPeriodo = '" . $this -> periodo . "'";
	}

	function selectAllByEstudiante() {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				where estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}

	function selectAllByAsignatura() {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				where asignatura_idAsignatura = '" . $this -> asignatura . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				order by " . $orden . " " . $dir;
	}

	function selectAllByTipoCalificacionOrder($orden, $dir) {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				where tipoCalificacion_idTipoCalificacion = '" . $this -> tipoCalificacion . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByPeriodoOrder($orden, $dir) {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				where periodo_idPeriodo = '" . $this -> periodo . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByEstudianteOrder($orden, $dir) {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				where estudiante_idEstudiante = '" . $this -> estudiante . "'
				order by " . $orden . " " . $dir;
	}

	function selectAllByAsignaturaOrder($orden, $dir) {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				where asignatura_idAsignatura = '" . $this -> asignatura . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCalificacion, nota, fallas, tipoCalificacion_idTipoCalificacion, periodo_idPeriodo, estudiante_idEstudiante, asignatura_idAsignatura
				from Calificacion
				where nota like '%" . $search . "%' or fallas like '%" . $search . "%'";
	}

	function selectNotaByPeriodo($periodo) {
		return "select nota
				from calificacion
				where periodo_idPeriodo = '" . $periodo . "' and tipoCalificacion_idTipoCalificacion = '". $this -> tipoCalificacion . "'
				and asignatura_idAsignatura = '" . $this -> asignatura . "' and estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}
	function selectFallasByPeriodo($periodo) {
		return "select fallas
				from calificacion
				where periodo_idPeriodo = '" . $periodo . "' and tipoCalificacion_idTipoCalificacion = '". $this -> tipoCalificacion . "'
				and asignatura_idAsignatura = '" . $this -> asignatura . "' and estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}

	function selectLastCalificacion(){
		return " select max(idCalificacion) from calificacion";
	}

	function selectIdByNotaPeriodo($periodo) {
		return "select idCalificacion
				from calificacion
				where periodo_idPeriodo = '" . $periodo . "' and tipoCalificacion_idTipoCalificacion = '". $this -> tipoCalificacion . "'
				and asignatura_idAsignatura = '" . $this -> asignatura . "' and estudiante_idEstudiante = '" . $this -> estudiante . "'";
	}
}
?>
