<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Buscar extends CI_Controller {

	protected $menu;
	protected $usuarioID;
	protected $permisosUsuario;
	protected $permisos;

	public function __construct()
	{
		parent::__construct();

		//validamos si existe sesion iniciada, de lo contrario se redirige a login
		if (!$this->session->userdata("login")) { redirect(base_url("login"),"refresh"); }

		// cargamos el modelo de busquedas
		$this->load->model("buscar_model");
		
	}

	public function ejecutarBusqueda()
	{
		//tomamos los datos enviados
		$datos = $this->input->post("datos");
		//tomamos la tabla donde se realizara la busqueda
		$tabla = "t_".$datos["tabla"];
		//tomamos el valor que buscaremos
		$buscar = $datos["buscar"];
		//convertimos en arreglo el string de los campos en los que se realizara la busqueda
		$arrayCampos = explode("|", $datos["campos"]);
		//iteramos los campos y formamos el arreglo
		foreach ($arrayCampos as $key => $campo) {
			
			$camposBuscar[$datos["tabla"]."_".$campo] = $buscar;

		}

		//realizamos la busqueda
		$busqueda = $this->buscar_model->buscar($tabla,$camposBuscar);

		if ($busqueda != false) {
			
			//realizamos la codificacion en json
			$busqueda = json_encode($busqueda);
			//devolvemos el resultado en json
			echo $busqueda;

		}else{

			echo false;

		}
		
	}

}