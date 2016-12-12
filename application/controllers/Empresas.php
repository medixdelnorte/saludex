<?php 
defined('BASEPATH') OR exit("No se puede acceder al archivo directamente.");


class Empresas extends CI_Controller {

	protected $menu;
	protected $usuarioID;
	protected $permisosUsuario;
	protected $permisos;
	
	function __construct()
	{
		parent::__construct();

		//validamos si existe sesion iniciada, de lo contrario se redirige a login
		if (!$this->session->userdata("login")) { redirect(base_url("login"),"refresh"); }
		
		//tomamos el menu activo
		$this->menu = $this->uri->segment(1);
		//asignamos el id de usuario con la variable session
		$this->usuarioID = $this->session->userdata("id");
		//asignamos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//cargamos el modelo de empresas
		$this->load->model("empresas_model");
		//cargamos el modelo de validacion
		$this->load->model("validaNuevoRegistro_model");
		//cargamos el modelo para realizar consultas basicas
		$this->load->model("consultas_model");

		$this->permisos = array(
				"empresas"	=>	4400
			);
	}

	function empresas()
	{
		$data["menu"] = $this->menu;

		$this->load->view("header.php",$data);

		//validamos si el usuario tiene permiso para acceder al modulo
		if (in_array($this->permisos["empresas"], $this->permisosUsuario)) {

			$data["empresas"] = $this->consultas_model->traerTodo("t_empresa");

			$this->load->view("empresa/empresas",$data);

		}

		$this->load->view("footer.php");
	}

	function crearEmpresa()
	{
		// ====== reglas del formulario ====== //
		$this->form_validation->set_rules("empresa_razon","Razon Social",'trim|required|min_length[5]');
		$this->form_validation->set_rules("empresa_rfc","",'trim|required|min_length[10]');
		$this->form_validation->set_rules("empresa_direccion","",'trim|required|min_length[10]');
		$this->form_validation->set_rules("empresa_cp","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("empresa_colonia","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("empresa_ciudad","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("empresa_estado","",'trim|required|min_length[5]');
		// ====== fin reglas del formulario ====== //

		//validamos que el formulario este correcto
		if ($this->form_validation->run() === true) {

			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();

			//agregamos campo de usuario_id
			$datosFormulario["usuario_id"] = $this->usuarioID;

			// ========= realizamos la validacion si existe el cliente ======== //
			$paramWhere = array(
					"empresa_razon" => $datosFormulario["empresa_razon"]
				);

			$insertaCliente = $this->validaNuevoRegistro_model->validar("t_empresa",$paramWhere);
			//si no existe el cliente se realiza el insert
			if ($insertaCliente === true) {

				$this->empresas_model->insertaEmpresa($datosFormulario);

				echo "correcto";

			}else{

				echo "existe";

			}
			

		}else{

			echo "error";

		}
	}

	function editarEmpresa()
	{
		// ====== reglas del formulario ====== //
		$this->form_validation->set_rules("empresa_razon","Razon Social",'trim|required|min_length[5]');
		$this->form_validation->set_rules("empresa_rfc","",'trim|required|min_length[10]');
		$this->form_validation->set_rules("empresa_direccion","",'trim|required|min_length[10]');
		$this->form_validation->set_rules("empresa_cp","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("empresa_colonia","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("empresa_ciudad","",'trim|required|min_length[5]');
		$this->form_validation->set_rules("empresa_estado","",'trim|required|min_length[5]');
		// ====== fin reglas del formulario ====== //

		if ($this->form_validation->run() === true) {
			//tomamos el id del producto
			$empresaID = $this->uri->segment(2);


			$paramWhere = array("empresa_id" => $empresaID);
			//cachamos los datos del formulario
			$datosFormulario = $this->input->post();

			//actualizamos el producto
			$updateEmpresa = $this->consultas_model->actualizar("t_empresa",$datosFormulario,$paramWhere);

			if ($updateEmpresa === true) {
				
				echo "update";

			}else{

				echo "no-update";

			}


		}else{

			echo "error";

		}
	}

	function nuevaEmpresa()
	{
		$data["menu"] = $this->menu;

		$this->load->view("header.php",$data);
		$this->load->view("empresa/nuevaEmpresa");
		$this->load->view("footer.php");
	}

	function verEmpresa()
	{
		$data["menu"] = $this->menu;
		//tomamos del segmento 3 de la url el numero de cliente
		$empresaID = $this->uri->segment(3);
		$data["empresaID"] = $empresaID;

		$paramWhere = array("empresa_id" => $empresaID);
		$data["infoEmpresa"] = $this->consultas_model->traerRow("t_empresa",$paramWhere);

		//si el cliente existe muestra la informacion, de lo contrario se muestra error
		if ($data["infoEmpresa"] != false) {
			
			//cargamos header
			$this->load->view("header",$data);
			$this->load->view("empresa/verEmpresa");
			//cargamos el footer
			$this->load->view("footer");

		}else{

			$this->load->view("error404");

		}

	}

}



 ?>