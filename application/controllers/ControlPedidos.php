<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class ControlPedidos extends CI_Controller {

	protected $menu;
	protected $usuarioID;
	protected $permisosUsuario;
	protected $permisos;

	public function __construct()
	{
		parent::__construct();

		//validamos si existe sesion iniciada, de lo contrario se redirige a login
		if (!$this->session->userdata("login")) { redirect(base_url("login"),"refresh"); }
		//establecemos los permisos del modulo
		$this->permisos = array("controlpedidos" =>	6100);
		//obtenemos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//validamos si el usuario tiene permiso para acceder al modulo
		!in_array($this->permisos["controlpedidos"], $this->permisosUsuario) ? redirect(base_url("home"),"refresh") : "";
		
		//tomamos el primer segmento de la url para saber que modulo se posiciona en activo
		$this->menu = $this->uri->segment(1);
		//asignamos el id de usuario con la variable session
		$this->usuarioID = $this->session->userdata("id");
		//cargamos el modelo para realizar consultas basicas
		$this->load->model("consultas_model");
		//cargamos el modelo de control de pedidos
		$this->load->model("controlPedidos_model");
		//cargamos el modelo de empresas
		$this->load->model("empresas_model");

		
	}

	function actualizaPartidaVenta()
	{
		$partidaID = $this->uri->segment(2);
		$datos = $this->input->post("datos");

		foreach ($datos as $key => $value) {

			$campos["partidavt_".$key] = $value;

		}

		$paramWhere = array("partidavt_id" => $partidaID);

		$this->consultas_model->actualizar("t_partidavt",$campos,$paramWhere);
	}

	function cambiaSucursalVenta()
	{
		$ventaID = $this->uri->segment(2);

		$datos = explode("@", $this->input->post("datos"));
		
		//validamos si datos[0] no viene vacio
		empty($datos[0]) ? $sucursalID = NULL : $sucursalID = $datos[0];

		$campos = array("sucursal_id" => $sucursalID);
		$paramWhere = array("venta_id" => $ventaID);

		$this->consultas_model->actualizar("t_venta",$campos,$paramWhere);
	}

	function insertaPartidavt()
	{
		$datos = $this->input->post("datos");

		$productoID = $datos["productoID"];
		$ventaID = $datos["ventaID"];
		$usuarioID = $this->usuarioID;

		$insertaPartida = $this->controlPedidos_model->insertaPartidaVt($productoID,$ventaID,$usuarioID);

		if ($insertaPartida != false) {
			
			//codificamos a json
			$insertaPartida = json_encode($insertaPartida);

			echo $insertaPartida;

		}else{

			echo false;

		}

	}

	function quitarPartidaVt()
	{
		$datos = $this->input->post("datos");

		$partidaID = $datos["partidaID"];

		$eliminaPartida = $this->controlPedidos_model->eliminaPartida($partidaID);

		echo $eliminaPartida;
	}

	function pedidos()
	{
		$data["menu"] = $this->menu;

		$data["ventas"] = $this->controlPedidos_model->getVentas();

		$this->load->view("header",$data);
		$this->load->view("controlpedidos/pedidos");
		$this->load->view("footer");
	}

	function setClienteVenta()
	{
		$datos = $this->input->post("datos");

		$clienteID = $datos["clienteID"];
		$ventaID = $datos["ventaID"];

		$campos = array("cliente_id" => $clienteID);
		$paramWhere =array('venta_id' => $ventaID);

		$this->consultas_model->actualizar("t_venta",$campos,$paramWhere);
	}

	function traerSucursalesVenta()
	{
		//tomamos el id del a venta de la url
		$ventaID = $this->uri->segment(2);
		//creamos un arreglo de los datos recibidos
		$datos = explode("@", $this->input->post("datos"));
		//tomamos el id de empresa de primer dato
		$empresaID = $datos[0];

		//seteamos la sucursal de la venta en NULL
		$campos = array("sucursal_id" => NULL);
		$paramWhere = array("venta_id" => $ventaID);
		$setSucursal = $this->consultas_model->actualizar("t_venta",$campos,$paramWhere);

		if (!empty($empresaID)) {
			
			//traemos las sucursales
			$sucursales = $this->empresas_model->traerSucursalesEmpresa($empresaID);

			//codificamos el resultado en json
			$sucursales = json_encode($sucursales);

		}else{

			$sucursales = false;

		}

		

		echo $sucursales;
	}

	function verVenta()
	{
		$data["menu"] = $this->menu;
		$ventaID = $this->uri->segment(3);
		$data["ventaID"] = $ventaID;
		//obtenemos la iformacion de la venta
		$data["infoVenta"] = $this->controlPedidos_model->getInfoVenta($ventaID);
		//obtenemos la lista de empresas
		$data["empresas"] = $this->empresas_model->getListaEmpresas();
		//si se tiene seleccionada una sucursal se traen las sucursales de la empresa a la cual pertenece la sucursal
		$data["infoVenta"]->sucursalID != NULL ? $data["sucursales"] = $this->empresas_model->traerSucursalesEmpresa($data["infoVenta"]->empresaID) : $data["sucursales"] = FALSE;

		//traemos las partidas de la venta
		$data["partidas"] = $this->controlPedidos_model->getPartidas($ventaID);

		if ($data["infoVenta"] != false) {
			
			$this->load->view("header",$data);
			$this->load->view("controlpedidos/verVenta");
			$this->load->view("footer");

		}else{

			$this->load->view("error404");

		}

	}

}