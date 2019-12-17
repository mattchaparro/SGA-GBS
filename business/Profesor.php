<?php
require_once ("persistence/ProfesorDAO.php");
require_once ("persistence/Connection.php");

class Profesor {
	private $idProfesor;
	private $nombre;
	private $apellido;
	private $documento;
	private $correo;
	private $clave;
	private $telefono;
	private $state;
	private $profesorDAO;
	private $connection;

	function getIdProfesor() {
		return $this -> idProfesor;
	}

	function setIdProfesor($pIdProfesor) {
		$this -> idProfesor = $pIdProfesor;
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

	function getCorreo() {
		return $this -> correo;
	}

	function setCorreo($pCorreo) {
		$this -> correo = $pCorreo;
	}

	function getClave() {
		return $this -> clave;
	}

	function setClave($pClave) {
		$this -> clave = $pClave;
	}

	function getTelefono() {
		return $this -> telefono;
	}

	function setTelefono($pTelefono) {
		$this -> telefono = $pTelefono;
	}

	function getState() {
		return $this -> state;
	}

	function setState($pState) {
		$this -> state = $pState;
	}

	function Profesor($pIdProfesor = "", $pNombre = "", $pApellido = "", $pDocumento = "", $pCorreo = "", $pClave = "", $pTelefono = "", $pState = ""){
		$this -> idProfesor = $pIdProfesor;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> documento = $pDocumento;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> telefono = $pTelefono;
		$this -> state = $pState;
		$this -> profesorDAO = new ProfesorDAO($this -> idProfesor, $this -> nombre, $this -> apellido, $this -> documento, $this -> correo, $this -> clave, $this -> telefono, $this -> state);
		$this -> connection = new Connection();
	}

	function logIn($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> logIn($email, $password));
		if($this -> connection -> numRows()==1){
			$result = $this -> connection -> fetchRow();
			$this -> idProfesor = $result[0];
			$this -> nombre = $result[1];
			$this -> apellido = $result[2];
			$this -> documento = $result[3];
			$this -> correo = $result[4];
			$this -> clave = $result[5];
			$this -> telefono = $result[6];
			$this -> state = $result[7];
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> update());
		$this -> connection -> close();
	}

	function updatePassword($password){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> updatePassword($password));
		$this -> connection -> close();
	}

	function existEmail($email){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> existEmail($email));
		if($this -> connection -> numRows()==1){
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
	}

	function recoverPassword($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> recoverPassword($email, $password));
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idProfesor = $result[0];
		$this -> nombre = $result[1];
		$this -> apellido = $result[2];
		$this -> documento = $result[3];
		$this -> correo = $result[4];
		$this -> clave = $result[5];
		$this -> telefono = $result[6];
		$this -> state = $result[7];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> selectAll());
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7]));
		}
		$this -> connection -> close();
		return $profesors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> selectAllOrder($order, $dir));
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7]));
		}
		$this -> connection -> close();
		return $profesors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> profesorDAO -> search($search));
		$profesors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($profesors, new Profesor($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7]));
		}
		$this -> connection -> close();
		return $profesors;
	}
}
?>
