<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Empresas_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function actualizarEmpresa($empresaID,$camposActualizar)
	{
		$this->db->where("empresa_id",$empresaID);
		$this->db->update("t_empresa",$camposActualizar);

		$actualizacion = $this->db->affected_rows();

		if ($actualizacion > 0) {

			return true;

		}else{

			return false;

		}
	}

	function getEmpresas()
	{
		$empresas = $this->db->get("t_empresa");

		if ($empresas->num_rows() > 0) {

			return $empresas->result();

		}else{

			return false;

		}
	}

	function getInfoEmpresa($empresaID)
	{
		$parametros = array("empresa_id" => $empresaID);
		
		$empresa = $this->db->get_where("t_empresa",$parametros);

		if ($empresa->num_rows() > 0) {
			
			return $empresa->row();

		}else{

			false;

		}
	}

	function getListaEmpresas()
	{
		$this->db->select("empresa_id,empresa_razon");
		$empresas = $this->db->get("t_empresa");

		if ($empresas->num_rows() > 0) {
			
			return $empresas->result();

		}else{

			return false;

		}
	}

	function insertaEmpresa($campos)
	{
		$this->db->set("empresa_fecha_alta","NOW()",FALSE);
		$this->db->insert("t_empresa",$campos);
	}
}


?>