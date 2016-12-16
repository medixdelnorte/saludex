<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class ControlPedidos_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getVentas()
	{
		$this->db->select("vta.venta_id AS op, emp.empresa_nombre_comercial AS empresa, vta.venta_status_id AS statusVenta, vta.venta_fecha AS fechaOp, vta.pedido_id AS numPedido, ped.pedido_fecha AS fechaPedido, vta.venta_total AS importe, cli.cliente_razon AS cliente, us.usuario_user AS usuario");
		$this->db->join("t_sucursal suc", "suc.sucursal_id = vta.sucursal_id","left");
		$this->db->join("t_empresa emp", "emp.empresa_id = suc.empresa_id","left");
		$this->db->join("t_pedido ped", "ped.pedido_id = vta.pedido_id", "left");
		$this->db->join("t_cliente cli", "cli.cliente_id = vta.cliente_id","left");
		$this->db->join("t_usuario us","vta.usuario_id = us.usuario_id");
		$ventas = $this->db->get("t_venta vta");

		if ($ventas->num_rows() > 0) {
			
			return $ventas->result();

		}else{

			return false;

		}
	}

	function getInfoVenta($ventaID)
	{

		$this->db->select("vta.venta_id AS op, emp.empresa_id AS empresaID, emp.empresa_nombre_comercial AS empresa, vta.venta_status_id AS statusVenta, vta.venta_fecha AS fechaOp, vta.pedido_id AS numPedido, ped.pedido_fecha AS fechaPedido, vta.venta_total AS importe, cli.cliente_razon AS cliente, us.usuario_user AS usuario, vtast.venta_status_nombre AS statusNombre, vta.sucursal_id AS sucursalID");
		$this->db->join("t_sucursal suc", "suc.sucursal_id = vta.sucursal_id","left");
		$this->db->join("t_empresa emp", "emp.empresa_id = suc.empresa_id","left");
		$this->db->join("t_pedido ped", "ped.pedido_id = vta.pedido_id", "left");
		$this->db->join("t_cliente cli", "cli.cliente_id = vta.cliente_id","left");
		$this->db->join("t_usuario us","vta.usuario_id = us.usuario_id");
		$this->db->join("t_venta_status vtast", "vtast.venta_status_id = vta.venta_status_id");
		$paramWhere = array("vta.venta_id" => $ventaID);
		$ventas = $this->db->get_where("t_venta vta",$paramWhere);

		if ($ventas->num_rows() > 0) {
			
			return $ventas->row();

		}else{

			return false;

		}

	}

	function getPartidas($ventaID)
	{
		//establecemos la condicion where
		$paramWhere = array("venta_id" => $ventaID);
		//establecemos el select
		$this->db->select("pro.producto_codigob AS codigob, pro.producto_descripcion AS descripcion, pvt.partidavt_cantidad AS cantidad, pvt.partidavt_precio AS precio, pvt.partidavt_descuento AS descuento, pvt.partidavt_iva AS iva");
		//realizamos los join necesarios
		$this->db->join("t_producto pro","pro.producto_id = pvt.producto_id");
		//realizamos el get
		$partidas = $this->db->get_where("t_partidavt pvt",$paramWhere);

		if ($partidas->num_rows() > 0) {
			
			return $partidas->result();

		}else{

			return false;

		}
	}
	
}