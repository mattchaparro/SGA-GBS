<?php
class SecretariaDAO{
	private $idSecretaria;
	private $nombre;
	private $apellido;
	private $documento;
	private $correo;
	private $clave;
	private $telefono;
	private $state;

	function SecretariaDAO($pIdSecretaria = "", $pNombre = "", $pApellido = "", $pDocumento = "", $pCorreo = "", $pClave = "", $pTelefono = "", $pState = ""){
		$this -> idSecretaria = $pIdSecretaria;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> documento = $pDocumento;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> telefono = $pTelefono;
		$this -> state = $pState;
	}

	function logIn($email, $password){
		return "select idSecretaria, nombre, apellido, documento, correo, clave, telefono, state
				from Secretaria
				where email = '" . $email . "' and password = '" . md5($password) . "'";
	}

	function insert(){
		return "insert into Secretaria(nombre, apellido, documento, correo, clave, telefono, state)
				values('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> documento . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> telefono . "', '" . $this -> state . "')";
	}

	function update(){
		return "update Secretaria set 
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				documento = '" . $this -> documento . "',
				correo = '" . $this -> correo . "',
				telefono = '" . $this -> telefono . "',
				state = '" . $this -> state . "'	
				where idSecretaria = '" . $this -> idSecretaria . "'";
	}

	function updatePassword($password){
		return "update Secretaria set 
				clave = '" . md5($password) . "'
				where idSecretaria = '" . $this -> idSecretaria . "'";
	}

	function existEmail($email){
		return "select idSecretaria, nombre, apellido, documento, correo, clave, telefono, state
				from Secretaria
				where email = '" . $email . "'";
	}

	function recoverPassword($email, $password){
		return "update Secretaria set 
				clave = '" . md5($password) . "'
				where correo = '" . $email . "'";
	}

	function select() {
		return "select idSecretaria, nombre, apellido, documento, correo, clave, telefono, state
				from Secretaria
				where idSecretaria = '" . $this -> idSecretaria . "'";
	}

	function selectAll() {
		return "select idSecretaria, nombre, apellido, documento, correo, clave, telefono, state
				from Secretaria";
	}

	function selectAllOrder($orden, $dir){
		return "select idSecretaria, nombre, apellido, documento, correo, clave, telefono, state
				from Secretaria
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idSecretaria, nombre, apellido, documento, correo, clave, telefono, state
				from Secretaria
				where nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or documento like '%" . $search . "%' or correo like '%" . $search . "%' or telefono like '%" . $search . "%'";
	}
}
?>
