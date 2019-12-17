<?php
require_once ("persistence/SecretariaDAO.php");
require_once ("persistence/Connection.php");

class Secretaria {
	private $idSecretaria;
	private $nombre;
	private $apellido;
	private $documento;
	private $correo;
	private $clave;
	private $telefono;
	private $state;
	private $secretariaDAO;
	private $connection;

	function getIdSecretaria() {
		return $this -> idSecretaria;
	}

	function setIdSecretaria($pIdSecretaria) {
		$this -> idSecretaria = $pIdSecretaria;
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

	function Secretaria($pIdSecretaria = "", $pNombre = "", $pApellido = "", $pDocumento = "", $pCorreo = "", $pClave = "", $pTelefono = "", $pState = ""){
		$this -> idSecretaria = $pIdSecretaria;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> documento = $pDocumento;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> telefono = $pTelefono;
		$this -> state = $pState;
		$this -> secretariaDAO = new SecretariaDAO($this -> idSecretaria, $this -> nombre, $this -> apellido, $this -> documento, $this -> correo, $this -> clave, $this -> telefono, $this -> state);
		$this -> connection = new Connection();
	}

	function logIn($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> secretariaDAO -> logIn($email, $password));
		if($this -> connection -> numRows()==1){
			$result = $this -> connection -> fetchRow();
			$this -> idSecretaria = $result[0];
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
		$this -> connection -> run($this -> secretariaDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> secretariaDAO -> update());
		$this -> connection -> close();
	}

	function updatePassword($password){
		$this -> connection -> open();
		$this -> connection -> run($this -> secretariaDAO -> updatePassword($password));
		$this -> connection -> close();
	}

	function existEmail($email){
		$this -> connection -> open();
		$this -> connection -> run($this -> secretariaDAO -> existEmail($email));
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
		$this -> connection -> run($this -> secretariaDAO -> recoverPassword($email, $password));
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> secretariaDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idSecretaria = $result[0];
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
		$this -> connection -> run($this -> secretariaDAO -> selectAll());
		$secretarias = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($secretarias, new Secretaria($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7]));
		}
		$this -> connection -> close();
		return $secretarias;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> secretariaDAO -> selectAllOrder($order, $dir));
		$secretarias = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($secretarias, new Secretaria($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7]));
		}
		$this -> connection -> close();
		return $secretarias;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> secretariaDAO -> search($search));
		$secretarias = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($secretarias, new Secretaria($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7]));
		}
		$this -> connection -> close();
		return $secretarias;
	}
}
?>
