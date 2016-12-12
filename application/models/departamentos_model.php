<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Departamentos_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function insertaDepartamento($campos)
	{
		$this->db->set("usuario_departamento_fecha_alta","NOW()",FALSE);
		$this->db->insert("t_usuario_departamento",$campos);
	}
	
}