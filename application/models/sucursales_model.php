<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Sucursales_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function actualizarSucursal($sucursalID,$camposActualizar)
	{
		$this->db->where("sucursal_id",$sucursalID);
		$this->db->update("t_sucursal",$camposActualizar);

		$actualizados = $this->db->affected_rows();

		if ($actualizados > 0) {

			return true;

		}else{

			return false;

		}
	}

	function getInfoSucursal($sucursalID)
	{
		$this->db->select("suc.sucursal_id,suc.sucursal_nombre,emp.empresa_razon,suc.sucursal_direccion,suc.sucursal_num_externo, suc.sucursal_num_interno,suc.sucursal_cp,suc.sucursal_colonia,suc.sucursal_ciudad,suc.sucursal_estado,suc.empresa_id");
		$this->db->join("t_empresa emp", "emp.empresa_id = suc.empresa_id");

		$paramWhere = array(
				"suc.sucursal_id"	=>	$sucursalID
			);

		$sucursales = $this->db->get_where("t_sucursal suc",$paramWhere);

		if ($sucursales->num_rows() > 0) {

			return $sucursales->row();

		}else{

			return false;

		}
	}

	function getSucursales()
	{
		$this->db->select("suc.sucursal_id,suc.sucursal_nombre,emp.empresa_razon");
		$this->db->join("t_empresa emp", "emp.empresa_id = suc.empresa_id");
		$sucursales = $this->db->get("t_sucursal suc");

		if ($sucursales->num_rows() > 0) {

			return $sucursales->result();

		}else{

			return false;

		}
	}

	function getListSucursales()
	{
		$sucursales = $this->db->get("t_sucursal");

		if ($sucursales->num_rows() > 0) {
			
			return $sucursales->result();

		}else{

			return false;

		}
	}

	function insertaSucursal($campos)
	{
		$this->db->set("sucursal_fecha_alta","NOW()",FALSE);
		$this->db->insert("t_sucursal",$campos);
	}

}



?>