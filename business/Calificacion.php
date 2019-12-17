<?php
require_once ("persistence/CalificacionDAO.php");
require_once ("persistence/Connection.php");

class Calificacion {
	private $idCalificacion;
	private $nota;
	private $fallas;
	private $tipoCalificacion;
	private $periodo;
	private $estudiante;
	private $asignatura;
	private $calificacionDAO;
	private $connection;

	function getIdCalificacion() {
		return $this -> idCalificacion;
	}

	function setIdCalificacion($pIdCalificacion) {
		$this -> idCalificacion = $pIdCalificacion;
	}

	function getNota() {
		return $this -> nota;
	}

	function setNota($pNota) {
		$this -> nota = $pNota;
	}

	function getFallas() {
		return $this -> fallas;
	}

	function setFallas($pFallas) {
		$this -> fallas = $pFallas;
	}

	function getTipoCalificacion() {
		return $this -> tipoCalificacion;
	}

	function setTipoCalificacion($pTipoCalificacion) {
		$this -> tipoCalificacion = $pTipoCalificacion;
	}

	function getPeriodo() {
		return $this -> periodo;
	}

	function setPeriodo($pPeriodo) {
		$this -> periodo = $pPeriodo;
	}

	function getEstudiante() {
		return $this -> estudiante;
	}

	function setEstudiante($pEstudiante) {
		$this -> estudiante = $pEstudiante;
	}

	function getAsignatura() {
		return $this -> asignatura;
	}

	function setAsignatura($pAsignatura) {
		$this -> asignatura = $pAsignatura;
	}

	function Calificacion($pIdCalificacion = "", $pNota = "", $pFallas = "", $pTipoCalificacion = "", $pPeriodo = "", $pEstudiante = "", $pAsignatura = ""){
		$this -> idCalificacion = $pIdCalificacion;
		$this -> nota = $pNota;
		$this -> fallas = $pFallas;
		$this -> tipoCalificacion = $pTipoCalificacion;
		$this -> periodo = $pPeriodo;
		$this -> estudiante = $pEstudiante;
		$this -> asignatura = $pAsignatura;
		$this -> calificacionDAO = new CalificacionDAO($this -> idCalificacion, $this -> nota, $this -> fallas, $this -> tipoCalificacion, $this -> periodo, $this -> estudiante, $this -> asignatura);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCalificacion = $result[0];
		$this -> nota = $result[1];
		$this -> fallas = $result[2];
		$tipoCalificacion = new TipoCalificacion($result[3]);
		$tipoCalificacion -> select();
		$this -> tipoCalificacion = $tipoCalificacion;
		$periodo = new Periodo($result[4]);
		$periodo -> select();
		$this -> periodo = $periodo;
		$estudiante = new Estudiante($result[5]);
		$estudiante -> select();
		$this -> estudiante = $estudiante;
		$asignatura = new Asignatura($result[6]);
		$asignatura -> select();
		$this -> asignatura = $asignatura;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> selectAll());
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function selectAllByTipoCalificacion(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> selectAllByTipoCalificacion());
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function selectAllByPeriodo(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> selectAllByPeriodo());
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function selectAllByEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> selectAllByEstudiante());
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function selectAllByAsignatura(){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> selectAllByAsignatura());
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> selectAllOrder($order, $dir));
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function selectAllByTipoCalificacionOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> selectAllByTipoCalificacionOrder($order, $dir));
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function selectAllByPeriodoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> selectAllByPeriodoOrder($order, $dir));
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function selectAllByEstudianteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> selectAllByEstudianteOrder($order, $dir));
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function selectAllByAsignaturaOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> selectAllByAsignaturaOrder($order, $dir));
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> calificacionDAO -> search($search));
		$calificacions = array();
		while ($result = $this -> connection -> fetchRow()){
			$tipoCalificacion = new TipoCalificacion($result[3]);
			$tipoCalificacion -> select();
			$periodo = new Periodo($result[4]);
			$periodo -> select();
			$estudiante = new Estudiante($result[5]);
			$estudiante -> select();
			$asignatura = new Asignatura($result[6]);
			$asignatura -> select();
			array_push($calificacions, new Calificacion($result[0], $result[1], $result[2], $tipoCalificacion, $periodo, $estudiante, $asignatura));
		}
		$this -> connection -> close();
		return $calificacions;
	}

	function selectNotaByPeriodo($periodo){
		$this -> connection -> open();
		//echo $this -> calificacionDAO -> selectNotaByPeriodo($periodo);
		$this -> connection -> run($this -> calificacionDAO -> selectNotaByPeriodo($periodo));
		$nota = "";
		while($result = $this -> connection -> fetchRow()){
			$nota = $result[0];
		}
		$this -> connection -> close();
		return $nota;
	}

	function selectFallasByPeriodo($periodo){
		$this -> connection -> open();
		//echo $this -> calificacionDAO -> selectNotaByPeriodo($periodo);
		$this -> connection -> run($this -> calificacionDAO -> selectFallasByPeriodo($periodo));
		$nota = "";
		while($result = $this -> connection -> fetchRow()){
			$nota = $result[0];
		}
		$this -> connection -> close();
		return $nota;
	}
}
?>
