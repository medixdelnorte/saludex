
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