<?php 
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');


class Almacen extends CI_controller
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
		$this->permisos = array("almacen"	=>	3100);
		//obtenemos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//validamos si el usuario tiene permiso para acceder al modulo
		!in_array($this->permisos["almacen"], $this->permisosUsuario)? redirect(base_url("home"),"refresh") : "";

		$this->menu = $this->uri->segment(1);
		//asignamos el id de usuario con la variable session
		$this->usuarioID = $this->session->userdata("id");
		//cargamos el modelo para realizar consultas basicas
		$this->load->model("consultas_model");
		//cargamos el modelo de almacen
		$this->load->model("almacen_model");
		//cargamos el modelo de controlPedidos_model para reutilizar sus consultas
		$this->load->model("controlPedidos_model");

	}

	function controlpedidos()
	{
		$data["menu"] = $this->menu;
		$data["pedidos"] = $this->almacen_model->getPedidos();
		$data["archivosjs"] = array("almacenJs");

		$this->load->view("header",$data);
		$this->load->view("almacen/controlPedidos");
		$this->load->view("footer");
	}

	function getRemisiones()
	{
		$datos = $this->input->post("datos");
		$pedidoID = $datos["pedidoID"];

		$remisiones = $this->almacen_model->getRemisiones($pedidoID);

		echo $remisiones != false ? json_encode($remisiones) : 0;
	}

	function iniciarRemision()
	{
		$datos = $this->input->post("datos");

		$pedidoID = $datos["pedidoID"];
		$usuarioID = $this->usuarioID;

		$remision = $this->almacen_model->iniciarRemision($pedidoID,$usuarioID);

		echo $remision != false ? $remision : 0 ;

	}

	function setAlmacenRemision()
	{
		$datos = $this->input->post("datos");

		$remisionID = $datos["remisionID"];
		//su el valor viene en 0, pondremos el almacenID en Nulo
		$datos["almacenID"] != 0 ? $almacenID = $datos["almacenID"] : $almacenID = NULL;

		$setAlmacen = $this->almacen_model->setAlmacen($remisionID,$almacenID);

		echo $setAlmacen === true ? 1 : 0;
	}

	function surtirproducto()
	{
		$remisionID = $this->uri->segment("3");

		// == validamos la informacion del formulario == //
		$this->form_validation->set_rules("codigob-surtir","trim");
		$this->form_validation->set_rules("cantidad-surtir","trim|numeric");
		$this->form_validation->set_rules("partida-surtir","trim|numeric");
		// ============================================= //

		if ($this->form_validation->run() === true) {
			
			//si es correcta la validacion de los datos del formulario procedemos a insertar el producto surtido
			$datosFormulario = $this->input->post();

			$codigoSurtir = $datosFormulario["codigob-surtir"];
			$cantidadSurtir = $datosFormulario["cantidad-surtir"];
			$partidaVt = $datosFormulario["partida-surtir"];
			$usuarioID = $this->usuarioID;

		}else{

			echo 0;

		}
	}

	function traerExistenciaProducto()
	{
		$datos = $this->input->post("datos");

		$almacenID = $datos["almacenID"];
		$codigoBarras = $datos["codigoBarras"];

		$paramWhere = array("producto_codigob" => $codigoBarras);
		$producto = $this->consultas_model->traerRow("t_producto",$paramWhere);

		$existencia = $this->almacen_model->getExistenciaProducto($almacenID,$producto->producto_id);

		echo $existencia;
	}

	function verRemision()
	{
		$remisionID = $this->uri->segment(3);
		$data["remisionID"] = $remisionID;
		$data["menu"] = $this->menu;
		$data["archivosjs"] = array("almacenJs");

		$data["infoRemision"] = $this->almacen_model->getInfoRemision($remisionID);


		if ($data["infoRemision"] != false) {

			$ventaID = $data["infoRemision"]->ventaID;
			$sucursalID = $data["infoRemision"]->sucursalID;
			//traemos las partidas de la venta
			$data["partidas"] = $this->controlPedidos_model->getPartidas($ventaID);
			//traemos los almacenes de la sucursal
			$paramWhere = array("sucursal_id" => $sucursalID);
			$data["almacenes"] = $this->consultas_model->traerWhere("t_almacen",$paramWhere);
			
			$this->load->view("header",$data);
			$this->load->view("almacen/verRemision");
			$this->load->view("footer");

		}else{

			$this->load->view("error404");

		}

	}
}


?>