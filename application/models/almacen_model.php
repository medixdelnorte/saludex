<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');


class Almacen_model extends CI_Model
{
	protected $pedidoPendiente = 1;
	protected $pedidoSurtiendo = 2;

	
	function __construct()
	{
		parent::__construct();
	}

	function getPedidos()	
	{
		$this->db->select("pd.pedido_id AS pedidoID, pd.pedido_fecha AS fecha, stpd.pedido_status_color AS statusColor, stpd.pedido_status_nombre AS statusNombre, emp.empresa_nombre_comercial AS empresa, cli.cliente_razon AS cliente, (SELECT COUNT(*) FROM t_remision WHERE pedido_id = pd.pedido_id) AS remisionAbierta");
		$this->db->join("t_pedido_status stpd","stpd.pedido_status_id = pd.pedido_status_id");
		$this->db->join("t_venta vta","vta.pedido_id = pd.pedido_id");
		$this->db->join("t_cliente cli","cli.cliente_id = vta.cliente_id");
		$this->db->join("t_sucursal suc","suc.sucursal_id = vta.sucursal_id");
		$this->db->join("t_empresa emp","emp.empresa_id = suc.empresa_id");
		//traemos todos los pedidos
		$pedidos = $this->db->get("t_pedido pd");

		if ($pedidos->num_rows() > 0) {
			
			return $pedidos->result();

		}else{

			return false;

		}
	}

	function iniciarRemision($pedidoID,$usuarioID)
	{
		$this->db->trans_begin();

			//preparamos los campos para insertar la remision
			$campos = array(
					"usuario_id"	=> $usuarioID,
					"pedido_id"		=> $pedidoID
				);
			$this->db->set("remision_fecha","NOW()",FALSE);
			$this->db->insert("t_remision",$campos);
			//recuperamos el id de la remision insertada
			$remisionID = $this->db->insert_id();

			//actualizamos el pedido a surtiendo
			$this->db->set("pedido_status_id",$this->pedidoSurtiendo);
			$this->db->where("pedido_id",$pedidoID);
			$this->db->update("t_pedido");

		if ($this->db->trans_status() === FALSE) {
			
			$this->db->trans_rollback();

			return false;

		}else{

			$this->db->trans_commit();

			return $remisionID;

		}
	}
}



?>