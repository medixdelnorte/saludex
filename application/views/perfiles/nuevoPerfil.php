<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Perfiles de Usuario</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Perfiles de Usuario</a></li>
                <li><a href="<?php echo base_url('perfiles/perfiles') ?>">Control de Perfiles</a></li>
                <li class="active"><a href="<?php echo base_url('perfiles/nuevoPerfil/') ?>">Nuevo Perfil</a></li>
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
<div class="row">

    <div class="col-sm-8">
        <div class="c_panel">

            <div class="c_panel c_panel_info">
            <div class="c_title">
                <h2>Informacion del Perfil</h2>
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
                
               <form id="formNuevoPerfil" class="form-horizontal formularios" action="<?php echo base_url("crearPerfil")?>" method="post" titulo="El Perfil" accion="insert">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre" name="usuario_perfil_nombre" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary btn-flat">Crear Perfil</button>
                        </div>
                    </div>
                </form>

                 <div id="container-error">
                     
                 </div>
                
            </div><!--/.c_content-->

        </div><!--/.c_panels-->
    </div>

</div>
<!--======== END sucursal DETAILS FORM ========-->