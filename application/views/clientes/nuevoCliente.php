<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Clientes</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Clientes</a></li>
                <li><a href="<?php echo base_url('clientes/controlClientes') ?>">Control de Clientes</a></li>
                <li class="active"><a href="<?php echo base_url('clientes/nuevoCliente/') ?>">Nuevo Cliente</a></li>
            </ul>
        </nav>
    </div>
    
    <!-- Boton para mostrar panel derecho -->
    <!--<div class="pull-right toggle-right-sidebar">
        <span class="fa fa-outdent fa-2x title-open-right-sidebar"></span>
    </div>-->

</div>
<!--======== Page Title and Breadcrumbs End ========-->


<!--======== START CLIENT DETAILS FORM ========-->
<div class="c_panel">

    <div class="c_panel c_panel_info">
    <div class="c_title">
        <h2>Informacion del Cliente</h2>
        <ul class="nav navbar-right panel_options">
            <li>
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div><!--/.c_title-->

    <div class="c_content">
        
       <form id="formNuevoCliente" class="form-horizontal formularios" action="<?php echo base_url("crearCliente")?>" method="post" titulo="El Cliente" accion="insert">
            <div class="form-group">
                    <label class="col-sm-2 control-label">Razon Social*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="razon" name="cliente_razon" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nombre Comercial</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ncomercial" name="cliente_nombre_comercial">
                    </div> 
                </div>
                <div class="form-group">
                    <label for="rfc" class="col-sm-2 control-label">R.F.C.*</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="rfc" name="cliente_rfc" required>
                    </div> 
                </div>               
                <div class="form-group">
                    <label class="col-sm-2 control-label">Numero de Cliente</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="ncliente" name="cliente_numero_cliente">
                    </div>  
                </div>                  
                <div class="form-group">
                    <label class="col-sm-2 control-label">Direccion*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direccion" name="cliente_direccion" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Numero Externo</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nexterno" name="cliente_num_externo">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Numero Interno</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="ninterno" name="cliente_num_interno">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">C.P.*</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="cp" name="cliente_cp" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Colonia*</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="colonia" name="cliente_colonia" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ciudad*</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="ciudad" name="cliente_ciudad" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Estado*</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="estado" name="cliente_estado" required>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="correo" name="cliente_correo">    
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telefono</label>
                    <div class="col-sm-3">
                        <input type="text" id="telefono" class="form-control" data-mask="(999) 999-9999" name="cliente_telefono">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Celular</label>
                    <div class="col-sm-3">
                        <input type="text" id="celular" class="form-control" data-mask="(999) 999-9999" name="cliente_celular">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-2 control-label">Dias Credito</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="dias" name="cliente_dias_credito">     
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Limite Credito</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="limitec" name="cliente_limite_credito">     
                    </div>
                </div>
                <div class="form-group">
                    <label for="additional-information" class="col-sm-2 control-label">Observaciones</label>
                    <div class="col-sm-10">
                        <textarea class="form-control autosize-animated" id="additional-information" name="cliente_observaciones"></textarea>
                    </div>
                </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat">Crear Cliente</button>
                </div>
            </div>
        </form>

         <div id="container-error">
             
         </div>
        
    </div><!--/.c_content-->

</div><!--/.c_panels-->
<!--======== END CLIENT DETAILS FORM ========-->


