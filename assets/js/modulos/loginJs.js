
//funcion para iniciar sesion
function iniciarSesion(paramCallback,respuesta)
{
	if (respuesta == "no-pasa") {

		$("#container-error").html('<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button><strong>Error !</strong> Credenciales invalidas.');

	}else{

		window.location.href = "http://localhost/saludex/";

	}
}