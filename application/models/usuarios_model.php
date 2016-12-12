<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Usuarios_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function actualizarUsuario($usuarioID,$camposActualizar)
	{
		$this->db->where("usuario_id",$usuarioID);
		$this->db->update("t_usuario",$camposActualizar);

		$actualizados = $this->db->affected_rows();

		if ($actualizados > 0) {

			return true;

		}else{

			return false;

		}
	}

	function cambiaPwd($usuarioID,$nuevoPwd)
	{		
		$camposActualizar = array("usuario_pwd"	=>	$nuevoPwd);
		$this->db->where("usuario_id",$usuarioID);
		$this->db->update("t_usuario",$camposActualizar);

		$actualizados = $this->db->affected_rows();

		if ($actualizados > 0) {
			
			return true;

		}else{

			return false;

		}
	}

	function getDepartamentos()
	{
		$departamentos = $this->db->get("t_usuario_departamento");

		if ($departamentos->num_rows() > 0) {
			
			return $departamentos->result();

		}else{

			return false;

		}
	}

	function getInfoUsuario($usuarioID)
	{
		$this->db->select("us.usuario_nombre,us.usuario_apellido,us.usuario_telefono,us.usuario_correo,dus.usuario_departamento_nombre, pus.usuario_perfil_nombre, us.usuario_user,dus.usuario_departamento_id, pus.usuario_perfil_id");
		$this->db->join("t_usuario_departamento dus","dus.usuario_departamento_id = us.usuario_departamento_id");
		$this->db->join("t_usuario_perfil pus","pus.usuario_perfil_id = us.usuario_perfil_id");
		$paramWhere = array("us.usuario_id" => $usuarioID);
		$usuario = $this->db->get_where("t_usuario us",$paramWhere);

		if ($usuario->num_rows() > 0) {
			
			return $usuario->row();

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

	function getUsuarios()
	{
		$this->db->select("us.usuario_id,CONCAT(us.usuario_nombre,' ',us.usuario_apellido) AS usuarioNombre,us.usuario_user,dus.usuario_departamento_nombre,pus.usuario_perfil_nombre");
		$this->db->join("t_usuario_perfil pus", "pus.usuario_perfil_id = us.usuario_perfil_id");
		$this->db->join("t_usuario_departamento dus", "dus.usuario_departamento_id = us.usuario_departamento_id");
		$usuarios = $this->db->get("t_usuario us");

		if ($usuarios->num_rows() > 0) {
			
			return $usuarios->result();

		}else{

			return false;

		}
	}

	function insertaUsuario($campos)
	{
		$this->db->set("usuario_fecha_alta","NOW()",FALSE);
		$this->db->insert("t_usuario",$campos);
	}

}