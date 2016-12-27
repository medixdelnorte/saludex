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

	function cambiaStatusVenta($ventaID,$nuevoStatus,$usuarioID)
	{
		$this->db->trans_start();

			//status 4 = generar pedido
			if ($nuevoStatus == 4) {

				$this->db->set("usuario_id",$usuarioID);
				$this->db->set("pedido_fecha","NOW()",FALSE);
				$this->db->insert("t_pedido");

				//recuperamos el numero de pedido insertado
				$pedidoID = $this->db->insert_id();

				//generamos el set del pedido_id para actualizarlo en la venta y relacionarlos
				$this->db->set("pedido_id",$pedidoID);

			}

			$this->db->set("venta_status_id",$nuevoStatus);
			$this->db->where("venta_id",$ventaID);
			$this->db->update("t_venta");

		$this->db->trans_complete();
	}

	function detallesPartida($partidaID)
	{
		$this->db->select("partidavt_descripcion AS descripcion, partidavt_iva AS iva, partidavt_comentario AS comentario, partidavt_id AS partidaID");
		$this->db->where("partidavt_id",$partidaID);
		$partida = $this->db->get("t_partidavt");

		return $partida->row();
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
		$this->db->select("vta.venta_id AS op, emp.empresa_nombre_comercial AS empresa, vta.venta_fecha AS fechaOp, vta.pedido_id AS numPedido, ped.pedido_fecha AS fechaPedido, vta.venta_total AS importe, cli.cliente_razon AS cliente, us.usuario_user AS usuario, svta.venta_status_ncorto AS statusNcorto, svta.venta_status_color AS statusColor");
		$this->db->join("t_sucursal suc", "suc.sucursal_id = vta.sucursal_id","left");
		$this->db->join("t_empresa emp", "emp.empresa_id = suc.empresa_id","left");
		$this->db->join("t_pedido ped", "ped.pedido_id = vta.pedido_id", "left");
		$this->db->join("t_cliente cli", "cli.cliente_id = vta.cliente_id","left");
		$this->db->join("t_usuario us","vta.usuario_id = us.usuario_id");
		$this->db->join("t_venta_status svta","svta.venta_status_id = vta.venta_status_id");
		$this->db->order_by("vta.venta_id","DESC");
		$ventas = $this->db->get("t_venta vta");

		if ($ventas->num_rows() > 0) {
			
			return $ventas->result();

		}else{

			return false;

		}
	}

	function getInfoVenta($ventaID)
	{

		$this->db->select("vta.venta_id AS op, emp.empresa_id AS empresaID, emp.empresa_razon AS empresa, vta.venta_status_id AS statusVenta, vta.venta_fecha AS fechaOp, vta.pedido_id AS numPedido, ped.pedido_fecha AS fechaPedido, vta.venta_subtotal AS ventaSubtotal, vta.venta_iva AS ventaIVA, vta.venta_total AS ventaTotal, cli.cliente_razon AS cliente, us.usuario_user AS usuario, vtast.venta_status_nombre AS statusNombre, vta.sucursal_id AS sucursalID, suc.sucursal_nombre AS sucursal");
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
		$this->db->select("pro.producto_codigob AS codigob, pvt.partidavt_descripcion AS descripcion, pvt.partidavt_cantidad AS cantidad, pvt.partidavt_precio AS precio, pvt.partidavt_descuento AS descuento, pvt.partidavt_id AS partidaID, ( pvt.partidavt_precio - ( pvt.partidavt_precio * (pvt.partidavt_descuento/100) ) ) * pvt.partidavt_cantidad AS importe, (pvt.partidavt_cantidad * pvt.partidavt_precio) * (pvt.partidavt_iva / 100) AS iva");
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

	function guardaDtllsVenta($partidaID,$camposUpdate)
	{
		$this->db->where("partidavt_id",$partidaID);
		$this->db->update("t_partidavt", $camposUpdate);
	}

	function infoAdvance($partidaID)
	{
		$this->db->select("us.usuario_user AS usuario, pvt.partidavt_fecha AS fecha");
		$this->db->join("t_usuario us","us.usuario_id = pvt.usuario_id");
		$this->db->where("pvt.partidavt_id",$partidaID);
		$informacion = $this->db->get("t_partidavt pvt");

		return ($informacion->num_rows() > 0) ? $informacion->row() : false;
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
						"producto_id" 			=>	$productoID,
						"partidavt_descripcion"	=>	$infoProducto->producto_descripcion,
						"partidavt_precio"		=>	$infoProducto->producto_pref,
						"partidavt_iva"			=>	$infoProducto->producto_iva,
						"partidavt_pref"		=>	$infoProducto->producto_pref,
						"usuario_id"			=>	$usuarioID,
						"venta_id"				=>	$ventaID
					);
				$this->db->set("partidavt_fecha","NOW()", FALSE);
				$this->db->insert("t_partidavt",$camposInsertar);
				//tomamos el id de la partida insertada
				$partidaID = $this->db->insert_id();

				//traemos la informacion de la partida para mostrarla al usuario
				$paramWhere = array("partidavt_id" => $partidaID);
				$this->db->select("pro.producto_codigob AS codigo, pvt.partidavt_descripcion AS descripcion, pvt.partidavt_id AS partidaID, pvt.partidavt_cantidad AS cantidad, pvt.partidavt_precio AS precio, pvt.partidavt_descuento AS descuento, (pvt.partidavt_cantidad * pvt.partidavt_precio) * (pvt.partidavt_iva / 100) AS iva, pvt.partidavt_id AS partidaID, ( pvt.partidavt_precio - ( pvt.partidavt_precio * (pvt.partidavt_descuento/100) ) ) * pvt.partidavt_cantidad AS importe");
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

	function nuevaVenta($usuarioID)
	{
		$this->db->set("usuario_id",$usuarioID);
		$this->db->set("venta_fecha","NOW()",FALSE);
		$this->db->insert("t_venta");

		$ventaID = $this->db->insert_id();

		return $ventaID;
	}

	function validaCotizacion($ventaID)
	{
		$this->db->where("venta_id = $ventaID AND sucursal_id IS NOT NULL AND cliente_id IS NOT NULL AND venta_total IS NOT NULL");
		$valida = $this->db->get_where("t_venta");

		return $valida->num_rows();
	}
	
}