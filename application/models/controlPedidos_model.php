<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class ControlPedidos_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function actualizarTotalesVenta($ventaID)
	{
		$this->db->trans_begin();

			$this->db->select("SUM((partidavt_precio - (partidavt_precio * (partidavt_descuento/100) ) ) * partidavt_cantidad) AS ventaSubtotal, SUM(((partidavt_precio - (partidavt_precio * (partidavt_descuento/100) ) ) * partidavt_cantidad) * (partidavt_iva /100)) AS ventaIVA, SUM( ((partidavt_precio - (partidavt_precio * (partidavt_descuento/100) ) ) * partidavt_cantidad) * ((partidavt_iva /100) +1)) AS ventaTotal");
			$this->db->where("venta_id",$ventaID);
			$query = $this->db->get("t_partidavt");

			$totales = $query->row();

			$campos = array(
					"venta_subtotal"	=>	$totales->ventaSubtotal,
					"venta_iva"			=>	$totales->ventaIVA,
					"venta_total"		=>	$totales->ventaTotal
				);
			$this->db->where("venta_id", $ventaID);
			$this->db->update("t_venta",$campos);

		if ($this->db->trans_status() === FALSE) {
			
			$this->db->trans_rollback();

			return false;

		}else{

			$this->db->trans_commit();

			return $totales;

		}

	}

	function eliminaPartida($partidaID)
	{
		$this->db->trans_begin();

			$this->db->where("partidavt_id",$partidaID);
			$this->db->delete("t_partidavt");

		if ($this->db->trans_status() === FALSE) {
			
			$this->db->trans_rollback();

			return false;

		}else{

			$this->db->trans_commit();

			return true;

		}
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

		$this->db->select("vta.venta_id AS op, emp.empresa_id AS empresaID, emp.empresa_nombre_comercial AS empresa, vta.venta_status_id AS statusVenta, vta.venta_fecha AS fechaOp, vta.pedido_id AS numPedido, ped.pedido_fecha AS fechaPedido, vta.venta_subtotal AS ventaSubtotal, vta.venta_iva AS ventaIVA, vta.venta_total AS ventaTotal, cli.cliente_razon AS cliente, us.usuario_user AS usuario, vtast.venta_status_nombre AS statusNombre, vta.sucursal_id AS sucursalID");
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
		$this->db->select("pro.producto_codigob AS codigob, pro.producto_descripcion AS descripcion, pvt.partidavt_cantidad AS cantidad, pvt.partidavt_precio AS precio, pvt.partidavt_descuento AS descuento, pvt.partidavt_iva AS iva, pvt.partidavt_id AS partidaID, ( pvt.partidavt_precio - ( pvt.partidavt_precio * (pvt.partidavt_descuento/100) ) ) * pvt.partidavt_cantidad AS importe");
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

	function insertaPartidaVt($productoID,$ventaID,$usuarioID)
	{
		// == traemos los datos del productos insertado == //
		$paramWhere = array("producto_id" => $productoID);
		$producto = $this->db->get_where("t_producto",$paramWhere);
		// =============================================== //
		if ($producto->num_rows() > 0) {

			$infoProducto = $producto->row();
			
			//iniciamos transaccion
			$this->db->trans_begin();

				$camposInsertar = array(
						"producto_id" 		=>	$productoID,
						"partidavt_precio"	=>	$infoProducto->producto_pref,
						"partidavt_iva"		=>	$infoProducto->producto_iva,
						"partidavt_pref"	=>	$infoProducto->producto_pref,
						"usuario_id"		=>	$usuarioID,
						"venta_id"			=>	$ventaID
					);
				$this->db->set("partidavt_fecha","NOW()", FALSE);
				$this->db->insert("t_partidavt",$camposInsertar);
				//tomamos el id de la partida insertada
				$partidaID = $this->db->insert_id();

				//traemos la informacion de la partida para mostrarla al usuario
				$paramWhere = array("partidavt_id" => $partidaID);
				$this->db->select("pro.producto_codigob AS codigo, pro.producto_descripcion AS descripcion, pvt.partidavt_id AS partidaID, pvt.partidavt_cantidad AS cantidad, pvt.partidavt_precio AS precio, pvt.partidavt_descuento AS descuento, pvt.partidavt_iva AS iva, pvt.partidavt_id AS partidaID, ( pvt.partidavt_precio - ( pvt.partidavt_precio * (pvt.partidavt_descuento/100) ) ) * pvt.partidavt_cantidad AS importe");
				$this->db->join("t_producto pro","pro.producto_id = pvt.producto_id");
				$partidavt = $this->db->get_where("t_partidavt pvt",$paramWhere);				
			//si alguna consulta fallo, se realiza rollback y se retorna false
			if ($this->db->trans_status() === FALSE) {
				
				$this->db->trans_rollback();

				return false;

			}else{
			//terminamos la transaccion y realizamos los cambios en bd retornamos la informacion de la partidavt insertada
				$this->db->trans_commit();

				return $partidavt->row();

			}			

		}else{

			return false;

		}
	}
	
}