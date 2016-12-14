<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Usuarios extends CI_Controller {

	protected $menu;
	protected $salt1;
	protected $salt2;
	protected $usuarioID;
	protected $permisosUsuario;
	protected $permisos;

	public function __construct()
	{
		parent::__construct();

		//validamos si existe sesion iniciada, de lo contrario se redirige a login
		if (!$this->session->userdata("login")) { redirect(base_url("login"),"refresh"); }
		
		//tomamos el primer segmento de la url para saber que modulo se posiciona en activo
		$this->menu = $this->uri->segment(1);
		//asignamos el id de usuario con la variable session
		$this->usuarioID = $this->session->userdata("id");
		//establecemos los permisos del modulo
		$this->permisos = array("usuarios"	=>	4100);
		//asignamos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//validamos si el usuario tiene permiso para acceder al modulo
		!in_array($this->permisos["usuarios"], $this->permisosUsuario) ? redirect(base_url("login"),"refresh") : "";
		//cargamos el modelo para validar si existe un cliente
		$this->load->model("validaNuevoRegistro_model");
		//cargamos el modelo de usuario
		$this->load->model("usuarios_model");
		//cargamos el modelo para realizar consultas basicas
		$this->load->model("consultas_model");

		$this->salt1 = md5("Lokdi09//_rf@67cwoiwmMoidwe[");
		$this->salt2 = md5("P0dw098jdwomJ__Uude/,sdib(few._dwe[}");
	}

	function cambiaPwd()
	{
		// === reglas del formulario     === //
		$this->form_validation->set_rules("valor","","trim|required|integer");
		$this->form_validation->set_rules("contra","","trim|required|min_length[5]");
		// === fin reglas del formulario === //

		if ($this->form_validation->run() === true) {
			
			$datosFormulario = $this->input->post();

			//mezclamos la contraseña del usuario con las sales y generamos el hash con md5
			$nuevoPwd = md5($this->salt1.$datosFormulario["contra"].$this->salt2);
			$usuarioID = $datosFormulario["valor"];

			$cambiaPwd = $this->usuarios_model->cambiaPwd($usuarioID,$nuevoPwd);

			if ($cambiaPwd === true) {
				
				echo "update";

			}else{

				echo "no-update";

			}

		}else{

			echo "no-update";

		}

		
	}

	function crearUsuario()
	{
		// === reglas del formulario     === //
		$this->form_validation->set_rules("usuario_nombre","","trim|required|min_length[5]");
		$this->form_validation->set_rules("usuario_apellido","","trim|required|min_length[5]");
		$this->form_validation->set_rules("usuario_correo","","trim|required|valid_email");
		$this->form_validation->set_rules("usuario_departamento_id","","trim|required|integer|exact_length[1]");
		$this->form_validation->set_rules("usuario_perfil_id","","trim|required|integer|exact_length[1]");
		$this->form_validation->set_rules("usuario_user","","trim|required|min_length[5]");
		$this->form_validation->set_rules("usuario_pwd","","trim|required|min_length[5]");
		// === fin reglas del formulario === //

		//validamos si se cumplieron las reglas
		if ($this->form_validation->run() === true) {

			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();
			$datosFormulario["usuario_registro"] = $this->usuarioID;
			//mezclamos la contraseña del usuario con las sales y generamos el hash con md5
			$datosFormulario["usuario_pwd"] = md5($this->salt1.$datosFormulario["usuario_pwd"].$this->salt2);

			// ========= realizamos la validacion si existe el producto ======== //
			$paramWhere = array(
					"usuario_user"	=>	$datosFormulario["usuario_user"]
				);

			$insertaUsuario = $this->validaNuevoRegistro_model->validar("t_usuario",$paramWhere);
			//si no existe la sucursal se inserta
			if ($insertaUsuario === true) {

				$this->usuarios_model->insertaUsuario($datosFormulario);
				
				echo "correcto";

			}else{

				echo "existe";

			}

		}else{

			echo "error";

		}
	}

	function editarUsuario()
	{
		// === reglas del formulario     === //
		$this->form_validation->set_rules("usuario_nombre","","trim|required|min_length[5]");
		$this->form_validation->set_rules("usuario_apellido","","trim|required|min_length[5]");
		$this->form_validation->set_rules("usuario_correo","","trim|required|valid_email");
		$this->form_validation->set_rules("usuario_departamento_id","","trim|required|integer|exact_length[1]");
		$this->form_validation->set_rules("usuario_perfil_id","","trim|required|integer|exact_length[1]");
		// === fin reglas del formulario === //

		//validamos si se cumplieron las reglas
		if ($this->form_validation->run() === true) {
			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();
			$usuarioID = $this->uri->segment(2);
			$paramWhere = array("usuario_id" => $usuarioID);

			$updateUsuario = $this->consultas_model->actualizar("t_usuario",$datosFormulario,$paramWhere);
			//si no existe la sucursal se inserta
			if ($updateUsuario === true) {
				
				echo "update";

			}else{

				echo "no-update";

			}

		}else{

			echo "error";

		}
	}

	function usuarios()
	{
		$data["menu"] = $this->menu;
		$data["usuarios"] = $this->usuarios_model->getUsuarios();

		$this->load->view("header",$data);
		$this->load->view("usuarios/usuarios",$data);
		$this->load->view("footer");
	}

	function nuevoUsuario()
	{
		$data["menu"] = $this->menu;

		$data["departamentos"] = $this->usuarios_model->getDepartamentos();
		$data["perfiles"] = $this->usuarios_model->getPerfiles();

		$this->load->view("header",$data);
		$this->load->view("usuarios/nuevoUsuario");
		$this->load->view("footer");
	}

	function verUsuario()
	{
		$data["menu"] = $this->menu;
		$usuarioID = $this->uri->segment(3);
		$data["usuarioID"] = $usuarioID;

		$data["infoUsuario"] = $this->usuarios_model->getInfoUsuario($usuarioID);
		$data["departamentos"] = $this->usuarios_model->getDepartamentos();
		$data["perfiles"] = $this->usuarios_model->getPerfiles();

		if ($data["infoUsuario"] != false) {
			
			$this->load->view("header",$data);
			$this->load->view("usuarios/verUsuario");
			$this->load->view("footer");

		}else{

			$this->load->view("error404");

		}
	}

}