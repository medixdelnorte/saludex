

$(".check-permiso").on("click",function(){

	var objeto = $(this);

	var valorPermiso = objeto.attr("valor");
	var perfil = objeto.attr("p");
	var ruta = objeto.attr("action");

	var datos = perfil + "@" + valorPermiso;

	ejecutaProceso(ruta,datos,"","","");

});