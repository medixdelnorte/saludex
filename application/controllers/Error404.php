<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Error404 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		//validamos si existe sesion iniciada, de lo contrario se redirige a login
		if (!$this->session->userdata("login")) { redirect(base_url("login"),"refresh"); }
	}

	public function index()
	{
		
		$this->load->view("error404");

	}


}