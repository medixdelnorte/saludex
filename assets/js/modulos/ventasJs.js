



// === funcion para traer las sucursales de una empresa 
$(".traerSucursalesVenta").on("change",function(){
	
	//obtenemos los datos del select
	var objeto = $(this);

	var ruta = objeto.attr("action");
	var empresa = objeto.val();
	var contenedorSucursales = objeto.attr("target");

	//preparamos datos para enviar
	var datos = empresa;

	ejecutaProceso(ruta,datos,"",rellenaSucursales,contenedorSucursales);

});

function rellenaSucursales(paramCallback,respuesta)
{
	var contenedorSucursales = $("#" + paramCallback);

	//limpiamos el select de las sucursales
	contenedorSucursales.html("");
	//creamos el primer option en blanco
	contenedorSucursales.html("<option></option>");

	if (respuesta != false) {

		var sucursales = JSON.parse(respuesta);

		//creamos los option de cada sucursal de la empresa
		$.each(sucursales,function(key,val){
			
			contenedorSucursales.append('<option value="' + val.sucursal_id + '">' + val.sucursal_nombre + '</option>');

		});

	}
}

// === /.traerSucursales


$("#sucursales-venta").change(function(){

	var objeto = $(this);

	var ruta = objeto.attr("action");
	var sucursal = objeto.val();

	//preparamos los datos para enviar
	var datos = sucursal;

	ejecutaProceso(ruta,datos,"","","");	

});


// == funcion para buscar cliente [esta funcionara para muchos modulos solo hayq ue buscar como hacer callback desde aqui]
$(".bClienteVenta").on("submit",function(form){

	form.preventDefault();

	var objeto = $(this);

	var info = new Object();

	info.tabla = objeto.attr("target");
	info.campos = objeto.attr("buscar");
	info.buscar = $("#caja-buscar").val();

	var ventaID = objeto.attr("ref");
	var ruta = objeto.attr("action");

	ejecutaProceso(ruta,info,"",rBuscaClienteVenta,ventaID);	

});


function rBuscaClienteVenta(paramCallback,respuesta)
{
	if (respuesta != false) {

		var ventaID = paramCallback;
		var contenedor = $("#resultado-buscar-cliente");
		var tabla = '';
		var datos = JSON.parse(respuesta);

		$.each(datos,function(key,val){

			tabla = tabla + '<tr onClick="seleccionaClienteVenta(this,' + ventaID + ')" cliente="' + val.cliente_razon + '" val="' + val.cliente_id + '" >';
			tabla = tabla + '<td>' + val.cliente_razon + '</td>';
			tabla = tabla + '<td>' + val.cliente_rfc + '</td>';
			tabla = tabla + '<td>' + val.cliente_numero_cliente + '</td>';
			tabla = tabla + '<td>' + val.cliente_telefono + '</td>';
			tabla = tabla + '<td>' + val.cliente_direccion + '</td>';
			tabla = tabla + '</tr>';

		});

		contenedor.html(tabla);

	}
}
// /buscar cliente


function seleccionaClienteVenta(elementoTr,ventaID)
{
	var objeto = $(elementoTr);

	var ruta = baseUrl + "/setClienteVenta"

	var clienteRazon = objeto.attr("cliente");

	var datos = new Object();

	datos.clienteID = objeto.attr("val");
	datos.ventaID = ventaID;


	ejecutaProceso(ruta,datos,"",asignaClienteVenta,clienteRazon);

}

function asignaClienteVenta(paramCallback,respuesta)
{
	//pasamos la razon social del cliente al input de buscar cliente
	$("#buscar-cliente-venta").val(paramCallback);
	//cerramos modal
	cerrarModal();
}

