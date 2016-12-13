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
                <li class="active"><a href="<?php echo base_url('perfiles/verPerfil/'.$perfilID) ?>">Detalles del Perfil</a></li>
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
                <h2>Permisos del Perfil <?php echo $infoPerfil->usuario_perfil_nombre; ?></h2>
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
                
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" role="form">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Modulo</th>
                                                <th>Descripcion del Permiso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if ($permisos != false):
                                                    foreach ($permisos as $key => $permiso):
                                             ?>
                                             <tr>
                                                <td><?php echo $permiso->permiso_modulo ?></td>
                                                <td>
                                                    <label class="switch-input success">
                                                        <input class="check-permiso" action="<?php echo base_url("permisoPerfil") ?>" p="<?php echo $perfilID; ?>" type="checkbox" name="switch-checkbox" <?php echo (in_array($permiso->permiso_valor, $permisosPerfil))?" checked ":"" ?> valor="<?php echo $permiso->permiso_valor; ?>">
                                                        <i data-on="ON" data-off="OFF"></i> <?php echo $permiso->permiso_descripcion ?>
                                                    </label>
                                                </td>
                                            </tr>
                                            <?php 
                                                    endforeach;
                                                endif;                                            
                                             ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                
            </div><!--/.c_content-->

        </div><!--/.c_panels-->
    </div>

</div>
<!--======== END sucursal DETAILS FORM ========-->