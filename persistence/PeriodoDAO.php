<?php
class PeriodoDAO{
	private $idPeriodo;
	private $orden;
	private $fecha_inicio;
	private $fecha_fin;
	private $anio;
	private $encurso;

	function PeriodoDAO($pIdPeriodo = "", $pOrden = "", $pFecha_inicio = "", $pFecha_fin = "", $pAnio = "", $pEncurso = ""){
		$this -> idPeriodo = $pIdPeriodo;
		$this -> orden = $pOrden;
		$this -> fecha_inicio = $pFecha_inicio;
		$this -> fecha_fin = $pFecha_fin;
		$this -> anio = $pAnio;
		$this -> encurso = $pEncurso;
	}

	function insert(){
		return "insert into Periodo(orden, fecha_inicio, fecha_fin, anio, encurso)
				values('" . $this -> orden . "', '" . $this -> fecha_inicio . "', '" . $this -> fecha_fin . "', '" . $this -> anio . "', '" . $this -> encurso . "')";
	}

	function update(){
		return "update Periodo set 
				orden = '" . $this -> orden . "',
				fecha_inicio = '" . $this -> fecha_inicio . "',
				fecha_fin = '" . $this -> fecha_fin . "',
				anio = '" . $this -> anio . "',
				encurso = '" . $this -> encurso . "'	
				where idPeriodo = '" . $this -> idPeriodo . "'";
	}

	function select() {
		return "select idPeriodo, orden, fecha_inicio, fecha_fin, anio, encurso
				from Periodo
				where idPeriodo = '" . $this -> idPeriodo . "'";
	}

	function selectAll() {
		return "select idPeriodo, orden, fecha_inicio, fecha_fin, anio, encurso
				from Periodo";
	}

	function selectAllOrder($orden, $dir){
		return "select idPeriodo, orden, fecha_inicio, fecha_fin, anio, encurso
				from Periodo
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idPeriodo, orden, fecha_inicio, fecha_fin, anio, encurso
				from Periodo
				where orden like '%" . $search . "%' or fecha_inicio like '%" . $search . "%' or fecha_fin like '%" . $search . "%' or anio like '%" . $search . "%' or encurso like '%" . $search . "%'";
	}

	function selectByOrden() {
		return "select idPeriodo, orden, fecha_inicio, fecha_fin, anio, encurso
				from Periodo
				where orden = '" . $this -> orden . "'";
	}
}
?>
