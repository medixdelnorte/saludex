<?php 
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');


class Almacenes extends CI_Controller
{
	protected $menu;
	protected $usuarioID;
	protected $permisosUsuario;
	protected $permisos;
	
	function __construct()
	{
		parent::__construct();

		//validamos si existe sesion iniciada, de lo contrario se redirige a login
		if (!$this->session->userdata("login")) { redirect(base_url("login"),"refresh"); }
		//establecemos los permisos del modulo
		$this->permisos = array("almacenes"	=>	4600);
		//obtenemos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//validamos si el usuario tiene permiso para acceder al modulo
		!in_array($this->permisos["almacenes"], $this->permisosUsuario)? redirect(base_url("home"),"refresh") : "";

		$this->menu = $this->uri->segment(1);
		//asignamos el id de usuario con la variable session
		$this->usuarioID = $this->session->userdata("id");
		//cargamos el modelo de almacenes
		$this->load->model("almacenes_model");
		//cargamos el modelo para validar que no existe el almacen
		$this->load->model("validaNuevoRegistro_model");
		//cargamos el modelo de sucursales
		$this->load->model("sucursales_model");
		//cargamos el modelo para realizar consultas basicas
		$this->load->model("consultas_model");

	}

	function almacenes()
	{
		$data["menu"] = $this->menu;
		$data["almacenes"] = $this->almacenes_model->getAlmacenes();

		$this->load->view("header",$data);				
		$this->load->view("almacenes/almacenes");	
		$this->load->view("footer");
	}

	function crearAlmacen()
	{
		// === reglas del formulario     === //
		$this->form_validation->set_rules("almacen_nombre","","trim|required|min_length[5]");
		$this->form_validation->set_rules("sucursal_id","","trim|required");
		// === fin reglas del formulario === //

		//validamos si se cumplieron las reglas
		if ($this->form_validation->run() === true) {
			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();
			$datosFormulario["usuario_id"] = $this->usuarioID;

			// ========= realizamos la validacion si existe el producto ======== //
			$paramWhere = array(
					"almacen_nombre"	=>	$datosFormulario["almacen_nombre"]
				);

			$insertaAlmacen = $this->validaNuevoRegistro_model->validar("t_almacen",$paramWhere);
			//si no existe la sucursal se inserta
			if ($insertaAlmacen === true) {

				$this->almacenes_model->insertaAlmacen($datosFormulario);
				
				echo "correcto";

			}else{

				echo "existe";

			}

		}else{

			echo "error";

		}
	}

	function editarAlmacen()
	{
		// === reglas del formulario     === //
		$this->form_validation->set_rules("almacen_nombre","","trim|required|min_length[5]");
		// === fin reglas del formulario === //

		//validamos si se cumplieron las reglas
		if ($this->form_validation->run() === true) {
			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();
			$almacenID = $this->uri->segment(2);

			$paramWhere = array("almacen_id" => $almacenID);
			$updateAlmacen = $this->consultas_model->actualizar("t_almacen",$datosFormulario,$paramWhere);
			//si no existe la sucursal se inserta
			if ($updateAlmacen === true) {
				
				echo "update";

			}else{

				echo "no-update";

			}

		}else{

			echo "error";

		}
	}

	function nuevoAlmacen()
	{
		$data["menu"] = $this->menu;

		$data["sucursales"] = $this->sucursales_model->getListSucursales();

		$this->load->view("header",$data);
		$this->load->view("almacenes/nuevoAlmacen");
		$this->load->view("footer");
	}

	function verAlmacen()
	{
		$data["menu"] = $this->menu;
		$almacenID = $this->uri->segment(3);

		$data["almacenID"] = $this->security->xss_clean($almacenID);

		$data["infoAlmacen"] = $this->almacenes_model->getInfoAlmacen($almacenID);

		if ($data["infoAlmacen"] != false) {
			
			$this->load->view("header",$data);
			$this->load->view("almacenes/verAlmacen");
			$this->load->view("footer");

		}else{

			$this->load->view("error404");

		}

	}
}


 ?>