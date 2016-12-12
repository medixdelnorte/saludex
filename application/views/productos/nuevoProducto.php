<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Productos</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Productos</a></li>
                <li><a href="<?php echo base_url('productos/controlProductos') ?>">Control de Productos</a></li>
                <li class="active"><a href="<?php echo base_url('productos/nuevoProducto/') ?>">Nuevo Producto</a></li>
            </ul>
        </nav>
    </div>
    
    <!-- Boton para mostrar panel derecho -->
    <!--<div class="pull-right toggle-right-sidebar">
        <span class="fa fa-outdent fa-2x title-open-right-sidebar"></span>
    </div>-->

</div>
<!--======== Page Title and Breadcrumbs End ========-->



<!--======== START PRODUCT DETAILS FORM ========-->
<div class="c_panel">

    <div class="c_panel c_panel_info">
    <div class="c_title">
        <h2>Informacion del Producto</h2>
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
        
       <form id="formNuevoProducto" class="form-horizontal formularios" action="<?php echo base_url("crearProducto")?>" method="post" titulo="El Producto" accion="insert">
            <div class="form-group">
                <label class="col-sm-2 control-label">Codigo de Barras*</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="codigo" placeholder="Codigo de Barras" required name="producto_codigob">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Descripcion*</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="descripcion" placeholder="Descripcion" required name="producto_descripcion">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Sustancia Activa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="sustancia" placeholder="Sustancia Activa" name="producto_sustancia">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Precio Publico*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="ppublico" placeholder="Precio Publico" required name="producto_ppublico">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Precio Farmacia*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="pfarmcia" placeholder="Precio Farmacia" required name="producto_pfarm">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Precio Referencia*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="preferencia" placeholder="Precio Referencia" required name="producto_pref">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Limitado</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="limitado" placeholder="Descuento Limitado" name="producto_limitado">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">IVA</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="iva" placeholder="Impuesto I.V.A." name="producto_iva">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">IEPS</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="ieps" placeholder="Impuesto I.E.P.S." name="producto_ieps">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tipo*</label>
                <div class="col-sm-3">
                    <select class="form-control" id="tipo" name="producto_tipo_id" required>
                    <?php 
                        if ($tipoProducto != false):
                            foreach ($tipoProducto as $key => $tipo):
                     ?>
                        <option value="<?php echo $tipo->producto_tipo_id ?>"><?php echo $tipo->producto_tipo_nombre ?></option>
                    <?php 
                            endforeach;
                        endif;
                     ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat">Crear Producto</button>
                </div>
            </div>
        </form>

         <div id="container-error">
             
         </div>
        
    </div><!--/.c_content-->

</div><!--/.c_panels-->
<!--======== END PRODUCT DETAILS FORM ========-->

