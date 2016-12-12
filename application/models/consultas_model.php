<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Consultas_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	//funcion para actualizar un row con parametros where
	function actualizar($tabla,$campos,$paramWhere)
	{

		$this->db->where($paramWhere);
		$this->db->update($tabla,$campos);

		//contamos los rows actualizados
		$actualizados = $this->db->affected_rows();

		//si se actualizo almenos 1 row devuelve true de lo contrario devuelve false
		if ($actualizados > 0) {
			
			return true;

		}else{

			return false;

		}

	}
	//funcion para realizar un select * de una tabla
	function traerTodo($tabla)
	{
		$consulta = $this->db->get($tabla);

		if ($consulta->num_rows() > 0) {
			
			return $consulta->result();

		}else{

			return false;

		}
	}
	// funcion para realizar un select con where
	function traerRow($tabla,$paramWhere)
	{
		$row = $this->db->get_where($tabla,$paramWhere);

		if ($row->num_rows() > 0) {
			
			return $row->row();

		}else{

			return false;

		}
	}


}