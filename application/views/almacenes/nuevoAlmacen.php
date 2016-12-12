<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Almacenes</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Almacenes</a></li>
                <li><a href="<?php echo base_url('almacenes/almacenes') ?>">Control de Almacenes</a></li>
                <li class="active"><a href="<?php echo base_url('almacenes/nuevoAlmacen/') ?>">Nuevo Almacen</a></li>
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
        <h2>Informacion del Almacen</h2>
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
        
       <form id="formNuevoAlmacen" class="form-horizontal formularios" action="<?php echo base_url("crearAlmacen")?>" method="post" titulo="El Almacen" accion="insert">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nombre*</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nombre" name="almacen_nombre" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Sucursal*</label>
                <div class="col-sm-5">
                    <select class="form-control" id="sucursal" name="sucursal_id" required>
                        <option></option>
                        <?php 
                            if ($sucursales != false):
                                foreach ($sucursales as $key => $sucursal):
                         ?>
                        <option value="<?php echo $sucursal->sucursal_id ?>"><?php echo $sucursal->sucursal_nombre ?></option>
                        <?php 
                                endforeach;
                            endif;
                         ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat">Crear Almacen</button>
                </div>
            </div>
        </form>

         <div id="container-error">
             
         </div>
        
    </div><!--/.c_content-->

</div><!--/.c_panels-->
<!--======== END sucursal DETAILS FORM ========-->