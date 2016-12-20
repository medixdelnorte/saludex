

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
	info.buscar = $("#caja-buscar-c").val();

	var ventaID = objeto.attr("ref");
	var ruta = objeto.attr("action");

	ejecutaProceso(ruta,info,"",rBuscaClienteVenta,ventaID);	

});


//funcion para mostrar informacion avanzada de la partida de venta
function infoAdvancePvta(boton)
{
	var objeto = $(boton);
	var valor = objeto.attr("val");
	var partida = objeto.attr("p");

	var trAdvance = $("#advance_" + partida);

	if (valor == 0) {

		objeto.attr("src",baseUrl + 'assets/images/details_close.png');
		objeto.attr("val",1);
		trAdvance.show();

		var ruta =  baseUrl + "infoAdvancePvta/" + partida;

		ejecutaProceso(ruta,"","",muestraAdvance,trAdvance);

	}else{

		objeto.attr("src",baseUrl + 'assets/images/details_open.png');		
		objeto.attr("val",0);
		trAdvance.hide();

	}
}


function muestraAdvance(paramCallback,respuesta)
{
	var contenedor = paramCallback;

	contenedor.html(respuesta);
}



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
// == /buscar cliente


// == funcion para seleccionar un cliente para la venta posterior a la busqueda realizada
function seleccionaClienteVenta(elementoTr,ventaID)
{
	var objeto = $(elementoTr);

	var ruta = baseUrl + "setClienteVenta"

	var clienteRazon = objeto.attr("cliente");

	var datos = new Object();

	datos.clienteID = objeto.attr("val");
	datos.ventaID = ventaID;


	ejecutaProceso(ruta,datos,"",asignaClienteVenta,clienteRazon);

}
//retorna la razon social del cliente al input principal
function asignaClienteVenta(paramCallback,respuesta)
{
	//pasamos la razon social del cliente al input de buscar cliente
	$("#buscar-cliente-venta").val(paramCallback);
	//cerramos modal
	cerrarModal();
}



// == funcion para buscar producto [esta funcionara para muchos modulos solo hayq ue buscar como hacer callback desde aqui]
$(".bProductoVenta").on("submit",function(form){

	form.preventDefault();

	var objeto = $(this);

	var info = new Object();

	info.tabla = objeto.attr("target");
	info.campos = objeto.attr("buscar");
	info.buscar = $("#caja-buscar-p").val();

	var ventaID = objeto.attr("ref");
	var ruta = objeto.attr("action");

	ejecutaProceso(ruta,info,"",rBuscaProductoVenta,ventaID);

});


function rBuscaProductoVenta(paramCallback,respuesta)
{
	if (respuesta != false) {

		var ventaID = paramCallback;
		var contenedor = $("#resultado-buscar-producto");
		var tabla = '';
		var datos = JSON.parse(respuesta);

		$.each(datos,function(key,val){

			tabla = tabla + '<tr onClick="insertaProductoVenta(this,' + ventaID + ')" val="' + val.producto_id + '">';
			tabla = tabla + '<td>' + val.producto_codigob + '</td>';
			tabla = tabla + '<td>' + val.producto_descripcion + '</td>';
			tabla = tabla + '<td>' + val.producto_sustancia + '</td>';
			tabla = tabla + '<td>$ ' + parseFloat(val.producto_ppublico).toFixed(2) + '</td>';
			tabla = tabla + '<td>$ ' + parseFloat(val.producto_pfarm).toFixed(2) + '</td>';
			tabla = tabla + '<td>$ ' + parseFloat(val.producto_pref).toFixed(2) + '</td>';
			tabla = tabla + '<td>' + val.producto_limitado + '</td>';
			tabla = tabla + '</tr>';

		});

		contenedor.html(tabla);

	}
}
// == /buscar producto


// funcion para seleccionar el producto para insertarlo en la venta
function insertaProductoVenta(elementoTr,ventaID)
{
	var objeto = $(elementoTr);

	var info = new Object();

	var ruta = baseUrl + "insertaPartidavt";

	info.productoID = objeto.attr("val");
	info.ventaID = ventaID;

	ejecutaProceso(ruta,info,"",construyePartidaVt,ventaID);

}

function construyePartidaVt(paramCallback,respuesta)
{
	var contenedor = $("#partidas-venta");
	var partida = JSON.parse(respuesta);
	var ventaID = paramCallback;

	var tabla = '';	

	//creamos el codigo html
	tabla = tabla + '<tr>';
		tabla = tabla + '<td class="text-center"><img src="' + baseUrl + '/assets/images/details_open.png" data-toggle="tooltip"  onclick="infoAdvancePvta(this)" val="0"  p="' + partida.partidaID + '" title="Mas Informacion"></td>';
		tabla = tabla + '<td class="text-center">' + partida.codigo + '</td>';
		tabla = tabla + '<td class="text-center">' + partida.descripcion + '</td>';
		tabla = tabla + '<td class="text-center">';
			tabla = tabla + '<input type="text" class="caja text-center" size="8" value="' + partida.cantidad + '" id="cantidadPartida' + partida.partidaID + '" onBlur="actualizaPartidaVenta(' + partida.partidaID + ',' + ventaID + ')">';
		tabla = tabla + '</td>';
		tabla = tabla + '<td class="text-center">';
			tabla = tabla + '<input type="text" class="caja text-center" size="8" value="' + parseFloat(partida.precio).toFixed(2) + '" id="precioPartida' + partida.partidaID + '" onBlur="actualizaPartidaVenta(' + partida.partidaID + ',' + ventaID + ')">';
		tabla = tabla + '</td>';
		tabla = tabla + '<td class="text-center">';
			tabla = tabla + '<input type="text" class="caja text-center" size="8" value="' + partida.descuento + '" id="descuentoPartida' + partida.partidaID + '" onBlur="actualizaPartidaVenta(' + partida.partidaID + ',' + ventaID + ')">';
		tabla = tabla + '</td>';
		tabla = tabla + '<td class="text-center">' + partida.iva + '</td>';
		tabla = tabla + '<td class="text-center" id="importePartida' + partida.partidaID + '">$ ' + parseFloat(partida.importe).toFixed(2) + '</td>';
		tabla = tabla + '<td class="text-center">';
			tabla = tabla + '<div class="btn-group">';
				tabla = tabla + '<button class="btn btn-info btn-xs" data-toggle="tooltip" title="Detalles Partida">&nbsp;<i class="fa fa-info"></i>&nbsp;</button>';
			tabla = tabla + '</div>';
			tabla = tabla + ' <div class="btn-group">';
				tabla = tabla + '<button class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Partida" onClick="eliminaPartidaVenta(this,' + partida.partidaID + ')"><i class="fa fa-minus"></i></button>';
			tabla = tabla + '</div>';
		tabla = tabla + '</td>';
	tabla = tabla + '</tr>';
	tabla = tabla + '<tr><td colspan="9" style="display: none" id="advance_' + partida.partidaID + '"></td></tr>';


	//insertamos al final el row en la tabla
	contenedor.prepend(tabla);

	actualizaTotalesVenta(ventaID,"");

}



// === funcion para borrar partida de venta ===

function eliminaPartidaVenta(eTr,partida)
{
	var ruta = baseUrl + "quitarPartidaVt";
	var info = new Object();

	info.partidaID = partida;

	ejecutaProceso(ruta,info,"",quitarPartidaVt,eTr);	
}

function quitarPartidaVt(paramCallback,respuesta)
{
	if (respuesta == 1) {

		var objeto = $(paramCallback);

		eliminarTrPadre(objeto);

		var ventaID = $("#op").val();

		actualizaTotalesVenta(ventaID,"");

	}
}

// === /eliminaPartidaVenta



// == funcion para actualizar partida de venta
function actualizaPartidaVenta(partida,ventaID)
{
	//obtenemos los valores de la partida de venta
	var cantidadPartida = parseFloat($("#cantidadPartida" + partida).val());

	var precioPartida = $("#precioPartida" + partida).val().replace(",","");
	precioPartida = parseFloat(precioPartida);

	var descuentoPartida = parseFloat($("#descuentoPartida" + partida)	.val());
	var importePartida = $("#importePartida" + partida);

	//calculamos el importe para mostrarlo en la IU
	var importe = (cantidadPartida * precioPartida) - ( (cantidadPartida * precioPartida) * (descuentoPartida/100) );
	//escribir el importe en la tabla
	importePartida.html("$ " + importe.toFixed(2));

	var ruta = baseUrl + "actualizaPartidaVenta/" + partida;

	var info = new Object();

	info.cantidad = cantidadPartida;
	info.precio = precioPartida;
	info.descuento = descuentoPartida;

	ejecutaProceso(ruta,info,"",actualizaTotalesVenta,ventaID);
}
// == /actualizaPartidaVenta


// ejecutarla cuando se realice algun cambio en las partidas de venta que influya el cambio del subtota, iva y total de la venta
function actualizaTotalesVenta(paramCallback,respuesta)
{
	var ruta = baseUrl + "actualizarTotalesVenta";

	var info = new Object();

	info.ventaID = paramCallback;

	ejecutaProceso(ruta,info,"",escribeTotales,"");
}


//muestra en la IU el cambio del subtotal, iva y el total de la venta
function escribeTotales(paramCallback,respuesta)
{
	console.log(respuesta);
	if (respuesta != 0) {

		//obetenemos los datos del controlador en formato json
		var datos = JSON.parse(respuesta);

		$("#ventaSubtotal").html('<b>$ ' + parseFloat(datos.ventaSubtotal).toFixed(2) + '</b>');
		$("#ventaIVA").html('<b>$ ' + parseFloat(datos.ventaIVA).toFixed(2) + '</b>');
		$("#ventaTotal").html('<b>$ ' + parseFloat(datos.ventaTotal).toFixed(2) + '</b>');

	}
}
