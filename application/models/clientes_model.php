<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Clientes_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function actualizarCliente($clienteID,$camposActualizar)
	{
		$this->db->where("cliente_id",$clienteID);
		$this->db->update("t_cliente",$camposActualizar);

		$actualizacion = $this->db->affected_rows();

		if ($actualizacion > 0) {

			return true;

		}else{

			return false;

		}
	}

	function getClientes()
	{
		$clientes = $this->db->get("t_cliente");

		if ($clientes->num_rows() > 0) {

			return $clientes->result();

		}else{

			return false;

		}
	}

	function getInfoCliente($clienteID)
	{
		$parametros = array("cliente_id" => $clienteID);
		
		$cliente = $this->db->get_where("t_cliente",$parametros);

		if ($cliente->num_rows() > 0) {
			
			return $cliente->row();

		}else{

			false;

		}
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