<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');


class buscar_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function buscar($tabla,$camposBuscar)
	{
		$this->db->or_like($camposBuscar);
		$busqueda = $this->db->get($tabla);

		if ($busqueda->num_rows() > 0) {
			
			return $busqueda->result();

		}else{

			return false;

		}
	}

}