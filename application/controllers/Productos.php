<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');

class Productos extends CI_Controller {

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
		//asignamos los permisos del usuario
		$this->permisosUsuario = $this->session->userdata("permisos");
		//cargamos el modelo de productos
		$this->load->model("productos_model");
		//cargamos la libreria para validar la existencia de un producto
		$this->load->model("validaNuevoRegistro_model");
		//cargamos el modelo para realizar consultas basicas
		$this->load->model("consultas_model");

		$this->permisos = array(
				"productos"	=>	2100
			);

	}

	function crearProducto()
	{
		// === reglas del formulario     === //
		$this->form_validation->set_rules("producto_codigob","","trim|required|min_length[5]");
		$this->form_validation->set_rules("producto_descripcion","","trim|required|min_length[5]");
		$this->form_validation->set_rules("producto_ppublico","","trim|required|numeric");
		$this->form_validation->set_rules("producto_pfarm","","trim|required|numeric");
		$this->form_validation->set_rules("producto_pref","","trim|required|numeric");
		$this->form_validation->set_rules("producto_tipo_id","","trim|required|integer|exact_length[1]|in_list[1,2]");
		// === fin reglas del formulario === //

		//validamos si se cumplieron las reglas
		if ($this->form_validation->run() === true) {
			//tomamos los datos del formulario
			$datosFormulario = $this->input->post();
			$datosFormulario["usuario_id"] = $this->usuarioID;

			// ========= realizamos la validacion si existe el producto ======== //
			$paramWhere = array("producto_codigob"	=>	$datosFormulario["producto_codigob"]);

			$insertaProducto = $this->validaNuevoRegistro_model->validar("t_producto",$paramWhere);
			//si no existe el producto se inserta
			if ($insertaProducto === true) {

				$this->productos_model->insertaProducto($datosFormulario);
				
				echo "correcto";

			}else{

				echo "existe";

			}

		}else{

			echo "error";

		}
	}

	function controlProductos()
	{
		$data["menu"] = $this->menu;		

		//cargamos header
		$this->load->view("header",$data);

		//validamos si el usuario tiene permiso para acceder al modulo
		if (in_array($this->permisos["productos"], $this->permisosUsuario)) {

			$data["productos"] = $this->productos_model->getProductos();

			$this->load->view("productos/controlProductos",$data);

		}
		
		//cargamos el footer
		$this->load->view("footer");
	}

	function editarProducto()
	{
		// === reglas del formulario     === //
		$this->form_validation->set_rules("producto_codigob","","trim|required|min_length[5]");
		$this->form_validation->set_rules("producto_descripcion","","trim|required|min_length[5]");
		$this->form_validation->set_rules("producto_ppublico","","trim|required|numeric");
		$this->form_validation->set_rules("producto_pfarm","","trim|required|numeric");
		$this->form_validation->set_rules("producto_pref","","trim|required|numeric");
		// === fin reglas del formulario === //

		if ($this->form_validation->run() === true) {
			//tomamos el id del producto
			$productoID = $this->uri->segment(2);

			$paramWhere = array("producto_id" => $productoID);
			//cachamos los datos del formulario
			$datosFormulario = $this->input->post();

			//actualizamos el producto
			$updateProducto = $this->consultas_model->actualizar("t_producto",$datosFormulario,$paramWhere);

			if ($updateProducto === true) {
				
				echo "update";

			}else{

				echo "no-update";

			}


		}else{

			echo "error";

		}
	}

	function nuevoProducto()
	{
		$data["menu"] = $this->menu;

		$data["tipoProducto"] = $this->productos_model->getTipoProducto();

		//cargamos header
		$this->load->view("header",$data);
		$this->load->view("productos/nuevoProducto");
		//cargamos el footer
		$this->load->view("footer");
	}

	function verProducto()
	{
		$data["menu"] = $this->menu;

		$productoID = $this->uri->segment(3);
		$data["productoID"] = $productoID;
		$data["infoProducto"] = $this->productos_model->getInfoProducto($productoID);

		if ($data["infoProducto"] != false) {

			$this->load->view("header",$data);
			$this->load->view("productos/verProducto");
			$this->load->view("footer");

		}else{

			$this->load->view("error404");

		}

		
	}

}