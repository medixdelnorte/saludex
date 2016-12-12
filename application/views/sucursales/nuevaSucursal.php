<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Sucursales</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Sucursales</a></li>
                <li><a href="<?php echo base_url('sucursales/sucursales') ?>">Control de Sucursales</a></li>
                <li class="active"><a href="<?php echo base_url('sucursales/nuevaSUcursal/') ?>">Nueva Sucursal</a></li>
            </ul>
        </nav>
    </div>
    
    <!-- Boton para mostrar panel derecho -->
    <!--<div class="pull-right toggle-right-sidebar">
        <span class="fa fa-outdent fa-2x title-open-right-sidebar"></span>
    </div>-->

</div>
<!--======== Page Title and Breadcrumbs End ========-->


<!--======== START sucursal DETAILS FORM ========-->
<div class="c_panel">

    <div class="c_panel c_panel_info">
    <div class="c_title">
        <h2>Informacion de la Sucursal</h2>
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
        
       <form id="formNuevaSucursal" class="form-horizontal formularios" action="<?php echo base_url("crearSucursal")?>" method="post" titulo="La Sucursal" accion="insert">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nombre*</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre Sucursal" name="sucursal_nombre" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Empresa*</label>
                <div class="col-sm-5">
                    <select class="form-control" id="empresa" name="empresa_id" required>
                        <option></option>
                        <?php 
                            if ($empresas != false):
                                foreach ($empresas as $key => $empresa):
                         ?>
                        <option value="<?php echo $empresa->empresa_id ?>"><?php echo $empresa->empresa_razon ?></option>
                        <?php 
                                endforeach;
                            endif;
                         ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Direccion</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="direccion" name="sucursal_direccion">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Numero Externo</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="nexterno" name="sucursal_num_externo">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Numero Interno</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="ninterno" name="sucursal_num_interno">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">C.P.</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="cp" name="sucursal_cp">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Colonia</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="colonia" name="sucursal_colonia">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Ciudad</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="ciudad" name="sucursal_ciudad">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="estado" name="sucursal_estado">
                </div>
            </div> 
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat">Crear Sucursal</button>
                </div>
            </div>
        </form>

         <div id="container-error">
             
         </div>
        
    </div><!--/.c_content-->

</div><!--/.c_panels-->
<!--======== END sucursal DETAILS FORM ========-->