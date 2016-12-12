<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Productos_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getProductos()
	{
		$this->db->select("prod.producto_id,prod.producto_codigob,prod.producto_descripcion,prod.producto_sustancia,prod.producto_ppublico");
		$this->db->select_sum("ex.existencia_cantidad","existenciaGlobal");
		$this->db->group_by("prod.producto_id");
		$this->db->join("t_existencia ex","ex.producto_id = prod.producto_id");
		$productos = $this->db->get("t_producto prod");

		if ($productos->num_rows() > 0) {
			
			return $productos->result();

		}else{

			return false;

		}
	}

	function getInfoProducto($productoID)
	{
		$this->db->join("t_producto_tipo tprod","tprod.producto_tipo_id = prod.producto_tipo_id");
		$paramWhere = array("prod.producto_id"	=>	$productoID);
		$producto = $this->db->get_where("t_producto prod",$paramWhere);

		if ($producto->num_rows() > 0) {
			
			return $producto->row();

		}else{

			return false;

		}
	}

	function getTipoProducto()
	{
		$tipoProducto = $this->db->get("t_producto_tipo");

		if ($tipoProducto->num_rows() > 0) {
			
			return $tipoProducto->result();

		}else{

			return false;

		}
	}

	function insertaProducto($campos)
	{
		//iniciamos transaccion
		$this->db->trans_start();
			
			$this->db->set("producto_fecha_alta","NOW()",FALSE);
			$this->db->insert("t_producto",$campos);

			//tomamos el id de producto insertado
			$productoID = $this->db->insert_id();

			//insertamos el producto en relacion a los almacenes en la tabla de existencias
			$this->db->query("INSERT INTO t_existencia(producto_id,almacen_id) SELECT $productoID,almacen_id FROM t_almacen");

		//completamos transaccion
		$this->db->trans_complete();
	}

}


?>