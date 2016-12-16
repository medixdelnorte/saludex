
/* =================== VARIABLES GLOABLES =================== */

baseUrl = "http://localhost/saludex/";

/* ========================================================== */


$(document).ready(function(){

	//datatable global
	$("#tablaBoot").dataTable({
		"lengthMenu": [[50,100,300,1000,-1],[50,100,300,1000,"TODOS"]]
	});

	//datatable para las partidas de una venta
	$("#tablaPartidasVt").dataTable({
		"paging":false,
		"order":[[1,"desc"]]
	});

});




function mensajeSuccess(titulo,mensaje)
{
	swal(titulo, mensaje, "success");
}

function mensajeWarning(titulo,mensaje)
{
	swal(titulo, mensaje, "warning");
}


//funcion para enviar los datos de un formulario insert o update
$(".formularios").on("submit", function(form){

    form.preventDefault();

    var formulario = $(this);
    var formID = formulario.attr("id");
    var destino = formulario.attr("action");
    var metodo = formulario.attr("method");
    var titulo = formulario.attr("titulo");
    var accion = formulario.attr("accion");
    
    $.ajax({
		url: destino,
		type: metodo,
		data: formulario.serialize(),
		beforeSend:function(){
			//$(".loader").show();
		},
        success:function(respuesta){

    		if (respuesta === "update") {

	    		//enviamos mensaje al usuario
	    		mensajeSuccess("",titulo + " se actualizo correctamente.");

        	}else if(respuesta == "error"){

        		$("#container-error").html('<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button><strong>Error !</strong> Debes completar los campos requeridos.</div>');

        	}else if(respuesta == "no-update"){
				//enviamos mensaje al usuario
        		mensajeWarning("",titulo + " no se actualizo.");
        	}else if (respuesta === "correcto") {

	    		//nos colocamos en el campo de razon social
	    		$("#razon").focus();
	    		//reseteamos el formulario
	    		$("#" + formID)[0].reset();
	    		//enviamos mensaje al usuario
	    		mensajeSuccess("",titulo + " se añadio correctamente.");

        	}else if(respuesta == "error"){

        		$("#container-error").html('<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button><strong>Error !</strong> Debes completar los campos requeridos.</div>');

        	}else if(respuesta == "existe"){

				mensajeWarning("",titulo + " ya existe.")
        	}

        }
	});

});


//funcion para ejecutar varios procesos, ejecutando una funcion al terminar el proceso
function ejecutaFormulario(objeto,contenedorID,fnCallback,paramCallback)
{
	var formulario = $(objeto);
    
    var destino = formulario.attr("action");
    var metodo = formulario.attr("method");

    $.ajax({
		url: destino,
		type: metodo,
		data: formulario.serialize(),
		beforeSend:function(){
			//$(".loader").show();
		},
        success:function(respuesta){

        	fnCallback(paramCallback,respuesta);

        }

    });
}

//funcion para ejecutar diferentes procesos ejecutando una funcion al terminar de ejecutarse
function ejecutaProceso(ruta,datos,contenedorID,fnCallback,paramCallback)
{
	$.ajax({
		url: ruta,
		type: "POST",
		data:{ datos },
		beforeSend:function(){
			//$(".loader").show();
		},
        success:function(respuesta){

        	if (fnCallback != '') {
        		fnCallback(paramCallback,respuesta);
        	}

        }

    });
}

//funcion para pasarle algun parametro de un elemento a otro
$(".btnPasaValor").click(function(){
	
	var objeto = $(this);

	var valor = objeto.attr("valor");
	var objetivo = objeto.attr("objetivo");

	$("#" + objetivo).val(valor);

});

//funcion para cerrar las ventanas modales
function cerrarModal()
{
	$("#btn-dismiss-modal").click();
}

