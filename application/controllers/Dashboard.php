<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Dashboard extends CI_Controller {

	protected $menu;

	public function __construct()
	{
		parent::__construct();

		//validamos si existe sesion iniciada, de lo contrario se redirige a login
		if (!$this->session->userdata("login")) { redirect(base_url("login"),"refresh"); }
		
		//tomamos el primer segmento de la url para saber que modulo se posiciona en activo
		$this->menu = $this->uri->segment(1);
	}

	function index()
	{
		$data["menu"] = $this->menu;

		//cargamos header
		$this->load->view("header",$data);

		$this->load->view("dashboard/dashboard");

		//cargamos el footer
		$this->load->view("footer");
	}

	
}