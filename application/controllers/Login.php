<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Login extends CI_Controller {

	protected $salt1;
	protected $salt2;

	public function __construct()
	{
		parent::__construct();
		//establecemos las sales
		$this->salt1 = md5("Lokdi09//_rf@67cwoiwmMoidwe[");
		$this->salt2 = md5("P0dw098jdwomJ__Uude/,sdib(few._dwe[}");

		//cargamos el modeo de login
		$this->load->model("login_model");
		//cargamos el modelo de perfiles, para cargar el perfil del usuario una vez que inicia sesion
		$this->load->model("perfiles_model");
		//cargamos modelo para consultas generales
		$this->load->model("consultas_model");
	}

	function index()
	{
		if (!$this->session->userdata("login")) {

			$this->load->view("login");	

		}else{

			redirect(base_url(),"refresh");

		}
	}

	function salir()
	{
		$this->load->driver("cache");
		$this->session->sess_destroy();
		$this->cache->clean();

		redirect(base_url(),"refresh");
	}

	function iniciarSesion()
	{
		// == establecemos las reglas del formulario == //
		$this->form_validation->set_rules("usuario","","trim|required|min_length[5]");
		$this->form_validation->set_rules("password","","trim|required|min_length[5]");
		// == fin reglas del formulario == //

		//validamos las reglas
		if ($this->form_validation->run() === true) {
			
			$datosFormulario = $this->input->post();
			//mezclamos las sales con la contraseña ingresada para generar el hash md5
			$pwd = md5($this->salt1.$datosFormulario["password"].$this->salt2);
			$usuario = $datosFormulario["usuario"];

			$credenciales = $this->login_model->getCredentials($usuario);
			//validamos credenciales
			if ($credenciales != false) {
				//validamos la contraseña
				if ($pwd == $credenciales->usuario_pwd) {

					$paramWhere = array("usuario_perfil_id" => $credenciales->usuario_perfil_id);
					$permisosUsuario = $this->consultas_model->traerRow("t_usuario_perfil",$paramWhere);
					$permisosUsuario = explode("||", $permisosUsuario->usuario_perfil_permisos);

					$data = array(
							"id"		=>	$credenciales->usuario_id,
							"nombre"	=>	$credenciales->usuario_nombre,
							"login"		=>	TRUE,
							"permisos"	=>	$permisosUsuario
						);

					$this->session->set_userdata($data);
					
					echo "pasa";

				}else{

					echo "no-pasa";

				}

			}else{

				echo "no-pasa";

			}


		}else{

			echo "no-pasa";

		}
	}

}