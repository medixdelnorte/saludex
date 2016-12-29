
//funcion para iniciar una remision
$(".ini-rem").click(function(){

	var pedidoID = $("#pd").val();

	var info = new Object();

	info.pedidoID = pedidoID;

	var ruta = baseUrl + "iniciarRemision";

	ejecutaProceso(ruta,info,"",nuevaRemision,"");

});

function nuevaRemision(paramCallback,respuesta)
{
	if (respuesta != 0) {

		window.location.href = baseUrl + "almacen/verRemision/" + respuesta;

	}else{

		mensajeWarning("Error", "No se pudo iniciar la Remision.")

	}
}


$(".show-rem").click(function(){

	var objeto = $(this);

	var pedidoID = objeto.attr("p");
	var info = new Object();

	info.pedidoID = pedidoID;

	var ruta = baseUrl + "getRemisiones";

	ejecutaProceso(ruta,info,"",muestraRemisiones,"");

});


function muestraRemisiones(paramCallback,respuesta)
{
	if (respuesta != 0) {

		var contenedor = $("#contenedor-remisiones");

		var remisiones = JSON.parse(respuesta);

		var tabla = '';

		$.each(remisiones,function(key,val){

			tabla = tabla + "<tr>";
			tabla = tabla + "<td class='text-center'>" + val.remisionID + "</td>";
			tabla = tabla + "<td class='text-center'>" + val.remisionFecha + "</td>";
			tabla = tabla + "<td class='text-center'>" + val.remisionStatus + "</td>";
			tabla = tabla + "<td class='text-center'>" + val.usuario + "</td>";
			tabla = tabla + "<td class='text-center'><a href='" + baseUrl + "almacen/verRemision/" + val.remisionID + "'><button class='btn btn-info btn-xs'><i class='fa fa-pencil-square-o'></i></button></a></td>";
			tabla = tabla + "</tr>";

		});

		contenedor.html(tabla);

	}
}