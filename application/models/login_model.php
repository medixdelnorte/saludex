<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Login_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getCredentials($usuario)
	{
		$paramWhere = array("usuario_user" => $usuario);
		$this->db->select("usuario_id,usuario_user,usuario_pwd,usuario_nombre,usuario_perfil_id");
		$usuario = $this->db->get_where("t_usuario",$paramWhere);

		if ($usuario->num_rows() == 1) {
			
			return $usuario->row();

		}else{

			return false;

		}
	}

}