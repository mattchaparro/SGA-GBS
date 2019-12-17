<?php
class PeriodoDAO{
	private $idPeriodo;
	private $orden;
	private $fecha_inicio;
	private $fecha_fin;
	private $anio;

	function PeriodoDAO($pIdPeriodo = "", $pOrden = "", $pFecha_inicio = "", $pFecha_fin = "", $pAnio = ""){
		$this -> idPeriodo = $pIdPeriodo;
		$this -> orden = $pOrden;
		$this -> fecha_inicio = $pFecha_inicio;
		$this -> fecha_fin = $pFecha_fin;
		$this -> anio = $pAnio;
	}

	function insert(){
		return "insert into Periodo(orden, fecha_inicio, fecha_fin, anio)
				values('" . $this -> orden . "', '" . $this -> fecha_inicio . "', '" . $this -> fecha_fin . "', '" . $this -> anio . "')";
	}

	function update(){
		return "update Periodo set 
				orden = '" . $this -> orden . "',
				fecha_inicio = '" . $this -> fecha_inicio . "',
				fecha_fin = '" . $this -> fecha_fin . "',
				anio = '" . $this -> anio . "'	
				where idPeriodo = '" . $this -> idPeriodo . "'";
	}

	function select() {
		return "select idPeriodo, orden, fecha_inicio, fecha_fin, anio
				from Periodo
				where idPeriodo = '" . $this -> idPeriodo . "'";
	}

	function selectAll() {
		return "select idPeriodo, orden, fecha_inicio, fecha_fin, anio
				from Periodo";
	}

	function selectAllOrder($orden, $dir){
		return "select idPeriodo, orden, fecha_inicio, fecha_fin, anio
				from Periodo
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idPeriodo, orden, fecha_inicio, fecha_fin, anio
				from Periodo
				where orden like '%" . $search . "%' or fecha_inicio like '%" . $search . "%' or fecha_fin like '%" . $search . "%' or anio like '%" . $search . "%'";
	}
}
?>
