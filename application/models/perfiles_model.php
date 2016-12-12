<?php

defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Perfiles_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function actualizarPerfil($perfilID,$camposActualizar)
	{
		$this->db->where("usuario_perfil_id",$perfilID);
		$this->db->update("t_usuario_perfil",$camposActualizar);
		//cachamos cuantos rows fueron actualizados
		$actualizacion = $this->db->affected_rows();
		//si se actualizo un row enviamos true de lo contrario devolvemos false
		if ($actualizacion > 0) {
			
			return true;

		}else{

			return false;

		}
	}

	function getInfoPerfil($perfilID)
	{
		$paramWhere = array("usuario_perfil_id" => $perfilID);
		$perfil = $this->db->get_where("t_usuario_perfil",$paramWhere);

		if ($perfil->num_rows() == 1) {
			
			return $perfil->row();

		}else{

			return false;

		}
	}

	function getPerfiles()
	{
		$perfiles = $this->db->get("t_usuario_perfil");

		if ($perfiles->num_rows() > 0) {
			
			return $perfiles->result();

		}else{

			return false;

		}
	}

	function getPermisos()
	{
		$this->db->order_by("permiso_valor","ASC");
		$permisos = $this->db->get("t_permiso");

		if ($permisos->num_rows() > 0) {
			
			return $permisos->result();

		}else{

			return false;

		}
	}

	function insertaPerfil($campos)
	{
		$this->db->set("usuario_perfil_fecha_alta","NOW()",FALSE);
		$this->db->insert("t_usuario_perfil",$campos);
	}

}