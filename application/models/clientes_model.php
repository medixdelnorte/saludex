<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Clientes_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getListaStatusCliente()
	{
		$statusCliente = $this->db->get("t_cliente_status");

		if ($statusCliente->num_rows() > 0) {
			
			return $statusCliente->result();

		}else{

			return false;

		}
	}

	function insertaCliente($campos)
	{
		$this->db->insert("t_cliente",$campos);
	}

}


?>