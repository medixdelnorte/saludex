<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Proveedores extends CI_Controller {

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
		//establecemos los permisos del modulo
		$this->permisos = array("proveedores"	=>	5100);
		//obtenemos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//validamos si el usuario tiene permiso para acceder al modulo
		!in_array($this->permisos["proveedores"], $this->permisosUsuario) ? redirect(base_url("login"),"refresh") : "";
		//cargamos modelo de proveedores
		$this->load->model("proveedores_model");
		//cargamos el modelo para validar si existe un proveedor
		$this->load->model("validaNuevoRegistro_model");
		//cargamos el modelo para realizar consultas basicas
		$this->load->model("consultas_model");

	}

	function crearProveedor()
	{
		// ====== reglas del formulario ====== //
		$this->form_validation->set_rules("proveedor_razon","Razon Social",'trim|required|min_length[5]');
		// ====== fin reglas del formulario ====== //

		//validamos que el formulario este correcto
		if ($this->form_validation->run() === true) {

			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();


			//agregamos campo de usuario_id
			$datosFormulario["usuario_id"] = $this->session->userdata("id");

			// ========= realizamos la validacion si existe el proveedor ======== //
			$paramWhere = array(
					"proveedor_razon" => $datosFormulario["proveedor_razon"]
				);

			$insertaproveedor = $this->validaNuevoRegistro_model->validar("t_proveedor",$paramWhere);
			//si no existe el proveedor se realiza el insert
			if ($insertaproveedor === true) {

				$this->proveedores_model->insertaproveedor($datosFormulario);

				echo "correcto";

			}else{

				echo "existe";

			}
			

		}else{

			echo "error";

		}
	}

	function editarProveedor()
	{
		// == establecemos las reglas del formulario == //
		$this->form_validation->set_rules("proveedor_razon","","trim|required|min_length[8]");
		// == fin reglas del formulario == //

		if ($this->form_validation->run() === true) {
			
			//tomamos el id del cliente del segmento 3
			$proveedorID = $this->uri->segment(2);

			$data["proveedorID"] = $proveedorID;

			$paramWhere = array("proveedor_id" => $proveedorID);
			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();
			//actualizamos al cliente
			$actualizarProveedor = $this->consultas_model->actualizar("t_proveedor",$datosFormulario,$paramWhere);

			//validamos si se actualizo el cliente
			if ($actualizarProveedor === true) {

				echo "update";

			}else{

				echo "no-update";

			}

		}else{

			echo "error";

		}

	}

	function proveedores()
	{
		$data["menu"] = $this->menu;

		//cargamos header
		$this->load->view("header",$data);

		//traemos los proveedors del a base de datos
		$data["proveedores"] = $this->consultas_model->traerTodo("t_proveedor");

		$this->load->view("proveedores/proveedores",$data);

		//cargamos el footer
		$this->load->view("footer");
	}


	function nuevoProveedor()
	{
		$data["menu"] = $this->menu;
		
		//cargamos header
		$this->load->view("header",$data);
		$this->load->view("proveedores/nuevoProveedor");
		//cargamos el footer
		$this->load->view("footer");
	}

	function verProveedor()
	{
		$data["menu"] = $this->menu;
		//tomamos del segmento 3 de la url el numero de cliente
		$proveedorID = $this->uri->segment(3);
		$data["proveedorID"] = $proveedorID;

		$paramWhere = array("proveedor_id" => $proveedorID);
		$data["infoProveedor"] = $this->consultas_model->traerRow("t_proveedor",$paramWhere);

		//si el cliente existe muestra la informacion, de lo contrario se muestra error
		if ($data["infoProveedor"] != false) {
			
			//cargamos header
			$this->load->view("header",$data);
			$this->load->view("proveedores/verProveedor");
			//cargamos el footer
			$this->load->view("footer");

		}else{

			$this->load->view("error404");

		}
	}


}