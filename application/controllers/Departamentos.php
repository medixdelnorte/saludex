<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Departamentos extends CI_Controller {

	protected $menu;
	protected $usuarioID;
	protected $permisosUsuario;
	protected $permisos;

	function __construct()
	{
		parent::__construct();

		//validamos si existe sesion iniciada, de lo contrario se redirige a login
		if (!$this->session->userdata("login")) { redirect(base_url("login"),"refresh"); }
		
		//tomamos el primer segmento de la url para saber que modulo se posiciona en activo
		$this->menu = $this->uri->segment(1);
		//asignamos el id de usuario con la variable session
		$this->usuarioID = $this->session->userdata("id");
		//establecemos los permisos del modulo
		$this->permisos = array("departamentos" => 4300);
		//tomamos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		!in_array($this->permisos["departamentos"], $this->permisosUsuario)? redirect(base_url("home"),"refresh") : "";
		//asignamos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//cargamos el modelo de departamentos
		$this->load->model("departamentos_model");
		//cargamos el modelo para validar la existencia de la sucursal
		$this->load->model("validaNuevoRegistro_model");
		//cargamos el modeo de consultas generales
		$this->load->model("consultas_model");
	}

	function crearDepartamento()
	{
		// == establecemos las reglas del formulario == //
		$this->form_validation->set_rules("usuario_departamento_nombre","","trim|min_length[5]");
		// == fin reglas del formulario == //

		//validamos la informacion del formulario
		if ($this->form_validation->run() === true) {

			$datosFormulario = $this->input->post();
			$datosFormulario["usuario_id"] = $this->usuarioID;

			//validamos si el nombre del departamento esta disponible
			$paramWhere = array("usuario_departamento_nombre" => $datosFormulario["usuario_departamento_nombre"]);
			$insertaDepto = $this->validaNuevoRegistro_model->validar("t_usuario_departamento",$paramWhere);

			if ($insertaDepto === true) {

				//insertamos el departamento en la bd
				$this->departamentos_model->insertaDepartamento($datosFormulario);
				
				echo "correcto";

			}else{

				echo "existe";

			}

		}else{

			echo "error";

		}
	}

	function departamentos()
	{
		$data["menu"] = $this->menu;

		$data["departamentos"] = $this->consultas_model->traerTodo("t_usuario_departamento");

		$this->load->view("header",$data);
		$this->load->view("departamentos/departamentos");
		$this->load->view("footer");
	}

	function nuevoDepartamento()
	{
		$data["menu"] = $this->menu;

		$this->load->view("header",$data);
		$this->load->view("departamentos/nuevoDepartamento");
		$this->load->view("footer");
	}


}