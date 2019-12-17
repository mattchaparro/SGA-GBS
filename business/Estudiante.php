<?php
require_once ("persistence/EstudianteDAO.php");
require_once ("persistence/Connection.php");

class Estudiante {
	private $idEstudiante;
	private $nombre;
	private $apellido;
	private $documento;
	private $fecha_nacimiento;
	private $fecha_matricula;
	private $sexo;
	private $curso;
	private $estadoEstudiante;
	private $estudianteDAO;
	private $connection;

	function getIdEstudiante() {
		return $this -> idEstudiante;
	}

	function setIdEstudiante($pIdEstudiante) {
		$this -> idEstudiante = $pIdEstudiante;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getApellido() {
		return $this -> apellido;
	}

	function setApellido($pApellido) {
		$this -> apellido = $pApellido;
	}

	function getDocumento() {
		return $this -> documento;
	}

	function setDocumento($pDocumento) {
		$this -> documento = $pDocumento;
	}

	function getFecha_nacimiento() {
		return $this -> fecha_nacimiento;
	}

	function setFecha_nacimiento($pFecha_nacimiento) {
		$this -> fecha_nacimiento = $pFecha_nacimiento;
	}

	function getFecha_matricula() {
		return $this -> fecha_matricula;
	}

	function setFecha_matricula($pFecha_matricula) {
		$this -> fecha_matricula = $pFecha_matricula;
	}

	function getSexo() {
		return $this -> sexo;
	}

	function setSexo($pSexo) {
		$this -> sexo = $pSexo;
	}

	function getCurso() {
		return $this -> curso;
	}

	function setCurso($pCurso) {
		$this -> curso = $pCurso;
	}

	function getEstadoEstudiante() {
		return $this -> estadoEstudiante;
	}

	function setEstadoEstudiante($pEstadoEstudiante) {
		$this -> estadoEstudiante = $pEstadoEstudiante;
	}

	function Estudiante($pIdEstudiante = "", $pNombre = "", $pApellido = "", $pDocumento = "", $pFecha_nacimiento = "", $pFecha_matricula = "", $pSexo = "", $pCurso = "", $pEstadoEstudiante = ""){
		$this -> idEstudiante = $pIdEstudiante;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> documento = $pDocumento;
		$this -> fecha_nacimiento = $pFecha_nacimiento;
		$this -> fecha_matricula = $pFecha_matricula;
		$this -> sexo = $pSexo;
		$this -> curso = $pCurso;
		$this -> estadoEstudiante = $pEstadoEstudiante;
		$this -> estudianteDAO = new EstudianteDAO($this -> idEstudiante, $this -> nombre, $this -> apellido, $this -> documento, $this -> fecha_nacimiento, $this -> fecha_matricula, $this -> sexo, $this -> curso, $this -> estadoEstudiante);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idEstudiante = $result[0];
		$this -> nombre = $result[1];
		$this -> apellido = $result[2];
		$this -> documento = $result[3];
		$this -> fecha_nacimiento = $result[4];
		$this -> fecha_matricula = $result[5];
		$this -> sexo = $result[6];
		$curso = new Curso($result[7]);
		$curso -> select();
		$this -> curso = $curso;
		$estadoEstudiante = new EstadoEstudiante($result[8]);
		$estadoEstudiante -> select();
		$this -> estadoEstudiante = $estadoEstudiante;
	}

	function selectAll(){
		$this -> connection -> open();
		echo $this -> estudianteDAO -> selectAll();
		$this -> connection -> run($this -> estudianteDAO -> selectAll());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[7]);
			$curso -> select();
			$estadoEstudiante = new EstadoEstudiante($result[8]);
			$estadoEstudiante -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $curso, $estadoEstudiante));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByCurso(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByCurso());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[7]);
			$curso -> select();
			$estadoEstudiante = new EstadoEstudiante($result[8]);
			$estadoEstudiante -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $curso, $estadoEstudiante));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByEstadoEstudiante(){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByEstadoEstudiante());
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[7]);
			$curso -> select();
			$estadoEstudiante = new EstadoEstudiante($result[8]);
			$estadoEstudiante -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $curso, $estadoEstudiante));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[7]);
			$curso -> select();
			$estadoEstudiante = new EstadoEstudiante($result[8]);
			$estadoEstudiante -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $curso, $estadoEstudiante));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByCursoOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByCursoOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[7]);
			$curso -> select();
			$estadoEstudiante = new EstadoEstudiante($result[8]);
			$estadoEstudiante -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $curso, $estadoEstudiante));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByEstadoEstudianteOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByEstadoEstudianteOrder($order, $dir));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[7]);
			$curso -> select();
			$estadoEstudiante = new EstadoEstudiante($result[8]);
			$estadoEstudiante -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $curso, $estadoEstudiante));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> search($search));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[7]);
			$curso -> select();
			$estadoEstudiante = new EstadoEstudiante($result[8]);
			$estadoEstudiante -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $curso, $estadoEstudiante));
		}
		$this -> connection -> close();
		return $estudiantes;
	}

	function selectAllByCursoAsignatura($asignatura){
		$this -> connection -> open();
		$this -> connection -> run($this -> estudianteDAO -> selectAllByCursoAsignatura($asignatura));
		$estudiantes = array();
		while ($result = $this -> connection -> fetchRow()){
			$curso = new Curso($result[7]);
			$curso -> select();
			$estadoEstudiante = new EstadoEstudiante($result[8]);
			$estadoEstudiante -> select();
			array_push($estudiantes, new Estudiante($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $curso, $estadoEstudiante));
		}
		$this -> connection -> close();
		return $estudiantes;
	}
}
?>
