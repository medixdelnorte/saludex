<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Departamentos_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getDepartamentos()
	{
		$deptos = $this->db->get("t_usuario_departamento");

		if ($deptos->num_rows() > 0) {
			
			return $deptos->result();

		}else{

			return false;

		}
	}

	function insertaDepartamento($campos)
	{
		$this->db->insert("t_usuario_departamento",$campos);
	}
}