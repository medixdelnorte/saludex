<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');


class Almacenes_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getAlmacenes()
	{
		$this->db->select("alm.almacen_id,alm.almacen_nombre,suc.sucursal_nombre,emp.empresa_razon");	
		$this->db->join("t_sucursal suc","alm.sucursal_id = suc.sucursal_id");
		$this->db->join("t_empresa emp","emp.empresa_id = suc.empresa_id");

		$almacenes = $this->db->get("t_almacen alm");

		if ($almacenes->num_rows() > 0) {
		
			return $almacenes->result();

		}else{

			return false;

		}
	}

	function getInfoAlmacen($almacenID)
	{
		$this->db->select("alm.almacen_nombre,suc.sucursal_nombre");
		$this->db->join("t_sucursal suc","suc.sucursal_id = alm.sucursal_id");
		$paramWhere = array("alm.almacen_id"	=>	$almacenID);

		$almacen = $this->db->get_where("t_almacen alm",$paramWhere);

		if ($almacen->num_rows() > 0) {
				
			return $almacen->row();

		}else{

			return false;

		}
	}

	function insertaAlmacen($campos)
	{
		//iniciamos transaccion
		$this->db->trans_start();

			$this->db->set("almacen_fecha_alta","NOW()",FALSE);
			$this->db->insert("t_almacen",$campos);

			//tomamos el id del almacen insertado
			$almacenID = $this->db->insert_id();

			//insertamos en la tabla de existencias el nuevo almacen relacionado a los productos
			$this->db->query("INSERT INTO t_existencia(producto_id,almacen_id) SELECT producto_id,$almacenID FROM t_producto");

		//completamos transaccion
		$this->db->trans_complete();
	}

}




?>