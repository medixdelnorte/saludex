<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = FALSE;

// ==== rutas modulo Clientes ===
$route["crearCliente"] = "clientes/crearCliente";
$route["editarCliente/(:num)"] = "clientes/editarCliente/$1";


// ==== rutas modulo Productos ===
$route["crearProducto"] = "productos/crearProducto";
$route['editarProducto/(:num)'] = 'productos/editarProducto/$1';


// ==== rutas modulo Empresas ===
$route["crearEmpresa"] = "empresas/crearEmpresa";
$route['editarEmpresa/(:num)'] = 'empresas/editarEmpresa/$1';


// ==== rutas modulo Sucursales ===
$route["crearSucursal"] = "sucursales/crearSucursal";	
$route["editarSucursal/(:num)"] = "sucursales/editarSucursal/$1";


// ==== rutas modulo Almacenes ===
$route["crearAlmacen"] = "almacenes/crearAlmacen";	
$route["editarAlmacen/(:num)"] = "almacenes/editarAlmacen/$1";

// ==== rutas modulo Usuarios ===
$route["crearUsuario"] = "usuarios/crearUsuario";	
$route["editarUsuario/(:num)"] = "usuarios/editarUsuario/$1";
$route["cambiaPwd"] = "usuarios/cambiaPwd";


// ==== rutas modulo login ===
$route["iniciarSesion"] = "login/iniciarSesion";

// ==== rutas modulo Perfiles ===
$route["crearPerfil"] = "perfiles/crearPerfil";	
$route["editarPerfil/(:num)"] = "perfiles/editarPerfil/$1";
$route["permisoPerfil"] = "perfiles/permisoPerfil";

// ==== rutas modulo departamentos ===
$route["crearDepartamento"] = "departamentos/crearDepartamento";	


// ==== rutas modulo Proveedores ===
$route["crearProveedor"] = "proveedores/crearProveedor";
$route["editarProveedor/(:num)"] = "proveedores/editarProveedor/$1";


// == rutas modulo ventas == //
$route["traerSucursalesVenta/(:num)"] = "controlpedidos/traerSucursalesVenta/$1";
$route["cambiaSucursalVenta/(:num)"] = "controlpedidos/cambiaSucursalVenta/$1";
$route["setClienteVenta"] = "controlpedidos/setClienteVenta";
$route["insertaPartidavt"] = "controlpedidos/insertaPartidavt";
$route["quitarPartidaVt"] = "controlpedidos/quitarPartidaVt";
$route["actualizaPartidaVenta/(:num)"] = "controlpedidos/actualizaPartidaVenta/$1";
$route["actualizarTotalesVenta"] = "controlpedidos/actualizarTotalesVenta";
$route["infoAdvancePvta/(:num)"] = "controlpedidos/infoAdvancePvta/$1";
$route["cambiaStatusVenta"] = "controlpedidos/cambiaStatusVenta";
$route["detallesPartidaVenta"] = "controlpedidos/detallesPartidaVenta";
$route["guardaDtllsVenta"] = "controlpedidos/guardaDtllsVenta";
$route["reestableceDescPvt"] = "controlpedidos/reestableceDescPvt";


// == ruta de modulo almacen == //
$route["iniciarRemision"] = "almacen/iniciarRemision";
$route["getRemisiones"] = "almacen/getRemisiones";
$route["setAlmacenRemision"] = "almacen/setAlmacenRemision";


// == rutas para realizar busquedas == //
$route["buscar"] = "buscar/ejecutarBusqueda";
