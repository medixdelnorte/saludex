<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Usuarios</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Usuarios</a></li>
                <li><a href="<?php echo base_url('usuarios/usuarios') ?>">Control de Usuarios</a></li>
                <li class="active"><a href="<?php echo base_url('usuarios/nuevoUsuario/') ?>">Nuevo Usuario</a></li>
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
        <h2>Informacion del Usuario</h2>
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
        
       <form id="formNuevoUsuario" class="form-horizontal formularios" action="<?php echo base_url("crearUsuario")?>" method="post" titulo="El usuario" accion="insert">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nombre*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nombre" name="usuario_nombre" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Apellido*</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="apellido" name="usuario_apellido" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="telefono" name="usuario_telefono">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Correo*</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="correo" name="usuario_correo" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Departamento*</label>
                <div class="col-sm-4">
                    <select class="form-control" id="departamento" name="usuario_departamento_id" required>
                    <option></option>
                    <?php
                        if ($departamentos != false):
                            foreach ($departamentos as $key => $departamento):
                    ?>
                        <option value="<?php echo $departamento->usuario_departamento_id ?>"><?php echo $departamento->usuario_departamento_nombre ?></option>
                    <?php 
                            endforeach;
                        endif;
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Perfil*</label>
                <div class="col-sm-4">
                    <select class="form-control" id="perfil" name="usuario_perfil_id" required>
                    <option></option>
                    <?php
                        if ($perfiles != false):
                            foreach ($perfiles as $key => $perfil):
                    ?>
                        <option value="<?php echo $perfil->usuario_perfil_id ?>"><?php echo $perfil->usuario_perfil_nombre ?></option>
                    <?php 
                            endforeach;
                        endif;
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Usuario*</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="user" name="usuario_user" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Contraseña*</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" id="contrasena" name="usuario_pwd" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat">Crear Usuario</button>
                </div>
            </div>
        </form>

         <div id="container-error">
             
         </div>
        
    </div><!--/.c_content-->

</div><!--/.c_panels-->
<!--======== END sucursal DETAILS FORM ========-->