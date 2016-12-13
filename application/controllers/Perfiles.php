<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Perfiles extends CI_Controller {

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
		$this->permisos = array("perfiles"	=>	4200);
		//asignamos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//validamos si el usuario tiene permiso para acceder al modulo
		!in_array($this->permisos["perfiles"], $this->permisosUsuario) ? redirect(base_url("home"),"refresh") : "";
		//cargamos la libreria de perfiles
		$this->load->model("perfiles_model");
		//cargamos el modelo para validar la existencia de un producto
		$this->load->model("validaNuevoRegistro_model");
		//cargamos el modelo de consultas general
		$this->load->model("consultas_model");
		
	}


	function crearPerfil()
	{
		//== validamos datos del formulario == //
		$this->form_validation->set_rules("usuario_perfil_nombre","","trim|min_length[5]");
		//== fin validacion datos del formulario == //

		if ($this->form_validation->run() == true) {

			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();
			$datosFormulario["usuario_id"] = $this->usuarioID;

			// == realizamos la validacion que no exista el perfil == //
			$paramWhere = array("usuario_perfil_nombre" => $datosFormulario["usuario_perfil_nombre"]);
			$insertaPerfil = $this->validaNuevoRegistro_model->validar("t_usuario_perfil",$paramWhere);
			//si no existe el perfil se inserta
			if ($insertaPerfil === true) {

				$this->perfiles_model->insertaPerfil($datosFormulario);

				echo "correcto";
				
			}else{

				echo "existe";

			}


		}else{

			echo "error";

		}
	}

	function perfiles()
	{
		$data["menu"] = $this->menu;		
		
		//cargamos header
		$this->load->view("header",$data);

		$data["perfiles"] = $this->consultas_model->traerTodo("t_usuario_perfil");
		$this->load->view("perfiles/perfiles",$data);

		//cargamos el footer
		$this->load->view("footer");
	}

	function nuevoPerfil()
	{
		$data["menu"] = $this->menu;

		//cargamos header
		$this->load->view("header",$data);
		$this->load->view("perfiles/nuevoPerfil");
		//cargamos el footer
		$this->load->view("footer");
	}

	function permisoPerfil()
	{
		//creamos un arreglo de los datos recibidos
		$datos = explode("@", $this->input->post("datos"));
		//tomamos el id del perfil
		$perfilID = $datos[0];
		//tomamos el valor del permiso seleccionado
		$valorPermiso = $datos[1];

		//obtenemos los permios del perfil
		$paramWhere = array("usuario_perfil_id" => $perfilID);
		$permisosPerfil = $this->consultas_model->traerRow("t_usuario_perfil",$paramWhere);
		//creamos un arreglo para validar si existe el permiso en el perfil
		$permisosPerfil = explode("||", $permisosPerfil->usuario_perfil_permisos);

		if (!in_array($valorPermiso, $permisosPerfil)) {
			
			//si el valor no se encuentra dentro del perfil, se agrega el valor al perfil
			array_push($permisosPerfil, $valorPermiso);

		}else{

			//si el valor se encuentra dentro del perfil, se procede a eliminarlo

			//buscamos la llave del permiso dentro del arreglo $permisosPerfil
			$key = array_search($valorPermiso, $permisosPerfil);
			//eliminamos el permiso del perfil
			unset($permisosPerfil[$key]);

		}

		//ordenamos el arreglo de menor a mayor
		sort($permisosPerfil);
		//creamos el string del arreglo $permisosPerfil para actualizar el perfil
		$nuevosPermisosPerfil = implode("||", $permisosPerfil);

		$camposActualizar = array("usuario_perfil_permisos" => $nuevosPermisosPerfil);


		$this->perfiles_model->actualizarPerfil($perfilID,$camposActualizar);

	}

	function verPerfil()
	{
		$data["menu"] = $this->menu;
		$perfilID = $this->uri->segment(3);
		$data["perfilID"] = $perfilID;
		$paramWhere = array("usuario_perfil_id" => $perfilID);
		//obtenemos la informacion del perfil
		$data["infoPerfil"] = $this->consultas_model->traerRow("t_usuario_perfil",$paramWhere);
		//creamos un arreglo de los permisos del perfil
		$data["permisosPerfil"] = explode("||", $data["infoPerfil"]->usuario_perfil_permisos);

		if ($data["infoPerfil"] != false) {

			$data["permisos"] = $this->perfiles_model->getPermisos();
			
			$this->load->view("header",$data);
			$this->load->view("perfiles/verPerfil");
			$this->load->view("footer");

		}else{

			$this->load->view("error404");

		}
		
	}

}