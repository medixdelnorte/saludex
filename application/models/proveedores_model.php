<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Proveedores_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function insertaProveedor($campos)
	{
		$this->db->set("proveedor_fecha_alta","NOW()",FALSE);
		$this->db->insert("t_proveedor",$campos);
	}

}