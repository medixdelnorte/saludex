<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Proveedores</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Proveedores</a></li>
                <li><a href="<?php echo base_url('proveedores/proveedores') ?>">Control de Proveedores</a></li>
                <li class="active"><a href="<?php echo base_url('proveedores/verProveedor/'.$proveedorID) ?>">Detalles del Proveedor</a></li>
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
            <h2>Detalles del Proveedor</h2>
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
            
           <form id="formEditaproveedor" class="form-horizontal formularios" action="<?php echo base_url("editarProveedor/".$proveedorID)?>" method="post" titulo="El Proveedor" accion="update">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Razon Social*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="razon" value="<?php echo $infoProveedor->proveedor_razon ?>" name="proveedor_razon" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nombre Comercial</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ncomercial" value="<?php echo $infoProveedor->proveedor_nombre_comercial ?>" name="proveedor_nombre_comercial">
                    </div> 
                </div>
                <div class="form-group">
                    <label for="rfc" class="col-sm-2 control-label">R.F.C.</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="rfc" value="<?php echo $infoProveedor->proveedor_rfc ?>" name="proveedor_rfc" >
                    </div> 
                </div>                            
                <div class="form-group">
                    <label class="col-sm-2 control-label">Direccion</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direccion" value="<?php echo $infoProveedor->proveedor_direccion ?>" name="proveedor_direccion" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="correo" value="<?php echo $infoProveedor->proveedor_correo ?>" name="proveedor_correo">    
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telefono</label>
                    <div class="col-sm-3">
                        <input type="text" id="telefono" class="form-control" data-mask="(999) 999-9999" value="<?php echo $infoProveedor->proveedor_telefono ?>" name="proveedor_telefono">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Dias Credito</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="dias" value="<?php echo $infoProveedor->proveedor_dias_credito ?>" name="proveedor_dias_credito">     
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Limite Credito</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="limitec" value="<?php echo $infoProveedor->proveedor_limite_credito ?>" name="proveedor_limite_credito">     
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info btn-flat">Actualizar</button>
                    </div>
                </div>
            </form>

            <div id="container-error">
             
            </div>
            
        </div><!--/.c_content-->

    </div><!--/.c_panels-->
</div>
<!--======== END CLIENT DETAILS FORM ========-->

