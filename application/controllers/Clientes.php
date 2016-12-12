<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Clientes extends CI_Controller {

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
		//obtenemos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//cargamos el modelo de clientes
		$this->load->model("clientes_model");
		//cargamos el modelo para validar si existe un cliente
		$this->load->model("validaNuevoRegistro_model");
		//cargamos el modelo para realizar consultas basicas
		$this->load->model("consultas_model");

		$this->permisos = array(
				"clientes"	=>	1100
			);
	}

	function controlClientes()
	{
		$data["menu"] = $this->menu;

		//cargamos header
		$this->load->view("header",$data);

		//validamos si el usuario tiene permiso para acceder al modulo
		if (in_array($this->permisos["clientes"], $this->permisosUsuario)) {

			//traemos los clientes del a base de datos
			$data["clientes"] = $this->consultas_model->traerTodo("t_cliente");

			$this->load->view("clientes/controlClientes",$data);

		}

		//cargamos el footer
		$this->load->view("footer");
	}

	function crearCliente()
	{
		// ====== reglas del formulario ====== //
		$this->form_validation->set_rules("cliente_razon","Razon Social",'trim|required|min_length[5]');
		$this->form_validation->set_rules("cliente_rfc","",'trim|required|min_length[10]');
		$this->form_validation->set_rules("cliente_direccion","",'trim|required|min_length[10]');
		$this->form_validation->set_rules("cliente_cp","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("cliente_colonia","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("cliente_ciudad","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("cliente_estado","",'trim|required|min_length[5]');
		// ====== fin reglas del formulario ====== //

		//validamos que el formulario este correcto
		if ($this->form_validation->run() === true) {

			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();


			//agregamos campo de usuario_id
			$datosFormulario["usuario_id"] = $this->usuarioID;

			// ========= realizamos la validacion si existe el cliente ======== //
			$paramWhere = array(
					"cliente_razon" => $datosFormulario["cliente_razon"]
				);

			$insertaCliente = $this->validaNuevoRegistro_model->validar("t_cliente",$paramWhere);
			//si no existe el cliente se realiza el insert
			if ($insertaCliente === true) {

				$this->clientes_model->insertaCliente($datosFormulario);

				echo "correcto";

			}else{

				echo "existe";

			}
			

		}else{

			echo "error";

		}
		
	}

	function editarCliente()
	{
		// ====== reglas del formulario ====== //
		$this->form_validation->set_rules("cliente_razon","Razon Social",'trim|required|min_length[5]');
		$this->form_validation->set_rules("cliente_rfc","",'trim|required|min_length[10]');
		$this->form_validation->set_rules("cliente_direccion","",'trim|required|min_length[10]');
		$this->form_validation->set_rules("cliente_cp","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("cliente_colonia","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("cliente_ciudad","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("cliente_estado","",'trim|required|min_length[5]');
		// ====== fin reglas del formulario ====== //

		if ($this->form_validation->run() === true) {
			
			//tomamos el id del cliente del segmento 3
			$clienteID = $this->uri->segment(2);

			$data["clienteID"] = $clienteID;


			$paramWhere = array("cliente_id" => $clienteID);
			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();
			//actualizamos al cliente
			$actualizarCliente = $this->consultas_model->actualizar("t_cliente",$datosFormulario,$paramWhere);

			//validamos si se actualizo el cliente
			if ($actualizarCliente === true) {

				echo "update";

			}else{

				echo "no-update";

			}

		}else{

			echo "error";

		}

	}

	function nuevoCliente()
	{
		$data["menu"] = $this->menu;
		
		//cargamos header
		$this->load->view("header",$data);
		$this->load->view("clientes/nuevoCliente");
		//cargamos el footer
		$this->load->view("footer");
	}

	function verCliente()
	{
		$data["menu"] = $this->menu;
		//tomamos del segmento 3 de la url el numero de cliente
		$clienteID = $this->uri->segment(3);
		$data["clienteID"] = $clienteID;

		$paramWhere = array("cliente_id" => $clienteID);
		$data["infoCliente"] = $this->consultas_model->traerRow("t_cliente",$paramWhere);
		$data["listaStatusCliente"] = $this->clientes_model->getListaStatusCliente();

		//si el cliente existe muestra la informacion, de lo contrario se muestra error
		if ($data["infoCliente"] != false) {
			
			//cargamos header
			$this->load->view("header",$data);
			$this->load->view("clientes/verCliente");
			//cargamos el footer
			$this->load->view("footer");

		}else{

			$this->load->view("error404");

		}

	}
	
}