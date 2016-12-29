<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');


class Almacen_model extends CI_Model
{
	protected $pedidoPendiente = 1;
	protected $pedidoSurtiendo = 2;
	protected $remisionAbierta = 1;
	protected $remisionCerrada = 2;

	
	function __construct()
	{
		parent::__construct();
	}

	function getInfoRemision($remisionID)
	{
		$this->db->select("rem.pedido_id AS pedidoID,stpd.pedido_status_nombre AS pedidoStatus, pd.pedido_fecha AS pedidoFecha, uspd.usuario_user AS pedidoUsuario, cli.cliente_razon AS cliente, suc.sucursal_nombre AS sucursal, emp.empresa_razon AS empresa");
		$this->db->join("t_pedido pd","pd.pedido_id = rem.pedido_id");
		$this->db->join("t_pedido_status stpd","stpd.pedido_status_id = pd.pedido_status_id");
		$this->db->join("t_usuario uspd","uspd.usuario_id = pd.usuario_id");
		$this->db->join("t_venta vt", "vt.pedido_id = pd.pedido_id");
		$this->db->join("t_cliente cli", "cli.cliente_id = vt.cliente_id");
		$this->db->join("t_sucursal suc","suc.sucursal_id = vt.sucursal_id");
		$this->db->join("t_empresa emp", "emp.empresa_id = suc.empresa_id");
		$this->db->where("rem.remision_id",$remisionID);
		$remision = $this->db->get("t_remision rem");

		if ($remision->num_rows() > 0) {
			
			return $remision->row();

		}else{

			return false;

		}
	}

	function getRemisiones($pedidoID)
	{
		$this->db->select("rem.remision_id AS remisionID, rem.remision_fecha AS remisionFecha, strem.remision_status_nombre AS remisionStatus, us.usuario_user AS usuario");
		$this->db->join("t_usuario us", "us.usuario_id = rem.usuario_id");
		$this->db->join("t_remision_status strem","strem.remision_status_id = rem.remision_status_id");
		$this->db->where("rem.pedido_id",$pedidoID);
		$remisiones = $this->db->get("t_remision rem");

		if ($remisiones->num_rows() > 0) {
			
			return $remisiones->result();

		}else{

			return false;

		}
	}

	function getPedidos()	
	{
		$this->db->select("pd.pedido_id AS pedidoID, pd.pedido_fecha AS fecha, stpd.pedido_status_color AS statusColor, stpd.pedido_status_nombre AS statusNombre, emp.empresa_nombre_comercial AS empresa, cli.cliente_razon AS cliente, (SELECT COUNT(*) FROM t_remision WHERE pedido_id = pd.pedido_id AND remision_status_id = ".$this->remisionAbierta.") AS remisionAbierta, (SELECT COUNT(*) FROM t_remision WHERE pedido_id = pd.pedido_id) AS remisiones");
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