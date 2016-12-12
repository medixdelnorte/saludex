
//funcion que recibe la respuesta del proceso de cambiar la contraseña del usuario
function cambioContrasena(paramCallback,respuesta)
{
	if (respuesta == "update") {

		cerrarModal();
		mensajeSuccess("","La contraseña se ha cambiado.");

	}else{

		cerrarModal();
		mensajeWarning("","La contraseña no se cambio.");

	}
}