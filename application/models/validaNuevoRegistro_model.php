<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class ValidaNuevoRegistro_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function validar($tabla,$paramWhere)
	{
		$valida = $this->db->get_where($tabla,$paramWhere);

		if ($valida->num_rows() == 0) {
			
			return true;

		}else{

			return false;

		}
	}

}


?>