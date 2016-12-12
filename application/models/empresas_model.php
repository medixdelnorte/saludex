<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Empresas_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
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