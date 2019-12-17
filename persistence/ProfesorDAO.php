<?php
class ProfesorDAO{
	private $idProfesor;
	private $nombre;
	private $apellido;
	private $documento;
	private $correo;
	private $clave;
	private $telefono;
	private $state;

	function ProfesorDAO($pIdProfesor = "", $pNombre = "", $pApellido = "", $pDocumento = "", $pCorreo = "", $pClave = "", $pTelefono = "", $pState = ""){
		$this -> idProfesor = $pIdProfesor;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> documento = $pDocumento;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> telefono = $pTelefono;
		$this -> state = $pState;
	}

	function logIn($email, $password){
		return "select idProfesor, nombre, apellido, documento, correo, clave, telefono, state
				from Profesor
				where correo = '" . $email . "' and clave = '" . md5($password) . "'";
	}

	function insert(){
		return "insert into Profesor(nombre, apellido, documento, correo, clave, telefono, state)
				values('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> documento . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> telefono . "', '" . $this -> state . "')";
	}

	function update(){
		return "update Profesor set 
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				documento = '" . $this -> documento . "',
				correo = '" . $this -> correo . "',
				telefono = '" . $this -> telefono . "',
				state = '" . $this -> state . "'	
				where idProfesor = '" . $this -> idProfesor . "'";
	}

	function updatePassword($password){
		return "update Profesor set 
				clave = '" . md5($password) . "'
				where idProfesor = '" . $this -> idProfesor . "'";
	}

	function existEmail($email){
		return "select idProfesor, nombre, apellido, documento, correo, clave, telefono, state
				from Profesor
				where email = '" . $email . "'";
	}

	function recoverPassword($email, $password){
		return "update Profesor set 
				clave = '" . md5($password) . "'
				where correo = '" . $email . "'";
	}

	function select() {
		return "select idProfesor, nombre, apellido, documento, correo, clave, telefono, state
				from Profesor
				where idProfesor = '" . $this -> idProfesor . "'";
	}

	function selectAll() {
		return "select idProfesor, nombre, apellido, documento, correo, clave, telefono, state
				from Profesor";
	}

	function selectAllOrder($orden, $dir){
		return "select idProfesor, nombre, apellido, documento, correo, clave, telefono, state
				from Profesor
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idProfesor, nombre, apellido, documento, correo, clave, telefono, state
				from Profesor
				where nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or documento like '%" . $search . "%' or correo like '%" . $search . "%' or telefono like '%" . $search . "%'";
	}
}
?>
