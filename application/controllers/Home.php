<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Home extends CI_Controller {

	protected $menu;

	public function __construct()
	{
		parent::__construct();
		//validamos si existe sesion iniciada, de lo contrario se redirige a login
		if (!$this->session->userdata("login")) { redirect(base_url("login"),"refresh"); }
	}

	function index()
	{
		$data["menu"] = "dashboard";
		//cargamos header
		$this->load->view("header",$data);
		//cargamos el modulo dashboard como predeterminado
		$this->load->view("dashboard/dashboard");
		//cargamos el footer
		$this->load->view("footer");
	}
}
