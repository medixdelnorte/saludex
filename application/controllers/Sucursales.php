<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Sucursales extends CI_Controller {

	protected $menu;
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
		//asignamos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//cargamos el modelo de sucursales
		$this->load->model("sucursales_model");
		//cargamos el modelo de empresas
		$this->load->model("empresas_model");
		//cargamos el modelo para validar la existencia de la sucursal
		$this->load->model("validaNuevoRegistro_model");

		$this->permisos = array(
				"sucursales"	=>	4500
			);
	}

	function crearSucursal()
	{
		// === reglas del formulario     === //
		$this->form_validation->set_rules("sucursal_nombre","","trim|required|min_length[5]");
		$this->form_validation->set_rules("empresa_id","","trim|required|integer");
		// === fin reglas del formulario === //

		//validamos si se cumplieron las reglas
		if ($this->form_validation->run() === true) {
			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();
			$datosFormulario["usuario_id"] = $this->usuarioID;

			// ========= realizamos la validacion si existe el producto ======== //
			$paramWhere = array(
					"sucursal_nombre"	=>	$datosFormulario["sucursal_nombre"]
				);

			$insertaSucursal = $this->validaNuevoRegistro_model->validar("t_sucursal",$paramWhere);
			//si no existe la sucursal se inserta
			if ($insertaSucursal === true) {

				$this->sucursales_model->insertaSucursal($datosFormulario);
				
				echo "correcto";

			}else{

				echo "existe";

			}

		}else{

			echo "error";

		}
	}

	function editarSucursal()
	{
		// === reglas del formulario     === //
		$this->form_validation->set_rules("sucursal_nombre","","trim|required|min_length[5]");
		// === fin reglas del formulario === //

		//validamos si se cumplieron las reglas
		if ($this->form_validation->run() === true) {
			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();
			$sucursalID = $this->uri->segment(2);

			$updateSucursal = $this->sucursales_model->actualizarSucursal($sucursalID,$datosFormulario);
			//si no existe la sucursal se inserta
			if ($updateSucursal === true) {
				
				echo "update";

			}else{

				echo "no-update";

			}

		}else{

			echo "error";

		}
	}

	function nuevaSucursal()
	{
		$data["menu"] = $this->menu;
		$data["empresas"] = $this->empresas_model->getListaEmpresas();

		$this->load->view("header",$data);
		$this->load->view("sucursales/nuevaSucursal");
		$this->load->view("footer");
	}

	function sucursales()
	{
		$data["menu"] = $this->menu;

		//cargamos header
		$this->load->view("header",$data);

		//validamos si el usuario tiene permiso para acceder al modulo
		if (in_array($this->permisos["sucursales"], $this->permisosUsuario)) {

			//traemos los clientes del a base de datos
			$data["sucursales"] = $this->sucursales_model->getSucursales();

			$this->load->view("sucursales/sucursales",$data);

		}
		
		//cargamos el footer
		$this->load->view("footer");
	}

	function verSucursal()
	{
		$data["menu"] = $this->menu;
		$sucursalID = $this->uri->segment(3);
		$data["sucursalID"] = $sucursalID;

		$data["infoSucursal"] = $this->sucursales_model->getInfoSucursal($sucursalID);

		if ($data["infoSucursal"] != false) {
			
			$this->load->view("header",$data);
			$this->load->view("sucursales/verSucursal");
			$this->load->view("footer");

		}else{

			$this->load->view("error404");

		}
	}

}


?>
