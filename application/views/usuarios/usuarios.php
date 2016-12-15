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
                <li class="active"><a href="<?php echo base_url('usuarios/usuarios') ?>">Control de Usuarios</a></li>
            </ul>
        </nav>
    </div>
    
    <!-- Boton para mostrar panel derecho -->
    <!--<div class="pull-right toggle-right-sidebar">
        <span class="fa fa-outdent fa-2x title-open-right-sidebar"></span>
    </div>-->

</div>
<!--======== Page Title and Breadcrumbs End ========-->


<div class="row">

    <div class="col-md-12">

        <div class="c_panel">

            <div class="c_title">
                <h2></h2>
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

                <div class="margin-bottom-20">
                    <div class="btn-group">
                      <a href="<?php echo base_url('usuarios/nuevoUsuario') ?>"><button class="btn btn-sm btn-success btn-raised rippler rippler-inverse"><i class="fa fa-plus"></i> Nuevo Usuario</button></a>
                    </div>
                 </div>
                
                <section id="flip-scroll">

                <table id="tablaBoot" class="table table-bordered table-striped table-condensed cf" style="border-spacing:0px; width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Departamento</th>
                            <th>Perfil</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>             
                    <tbody>
                    <?php 
                        if ($usuarios != false):
                            foreach ($usuarios as $key => $usuario):
                     ?>
                        <tr>
                            <td><?php echo $usuario->usuarioNombre ?></td>
                            <td><?php echo $usuario->usuario_user ?></td>
                            <td><?php echo $usuario->usuario_departamento_nombre ?></td>
                            <td><?php echo $usuario->usuario_perfil_nombre ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url("usuarios/verUsuario/".$usuario->usuario_id) ?>"><button type="button" class="btn btn-default btn-flat btn-sm" data-toggle="tooltip" title="Editar Usuario"><i class="fa fa-pencil-square-o"></i></button></a>
                                <button type="button" class="btn btn-success btn-flat btn-sm btnPasaValor" objetivo="cmUsPwd" valor="<?php echo $usuario->usuario_id; ?>" data-toggle="modal" data-target="#cambia-contra"><i class="fa fa-lock"></i></button>
                            </td>
                        </tr>
                    <?php 
                            endforeach;
                        endif;
                     ?>
                    </tbody>
                </table>

                </section><!--/no-more-tables-->
                
            </div><!--/.c_content-->

        </div><!--/.c_panels-->


    </div><!--/col-md-12-->

</div><!--/row-->


<!--****** Start Basic Modal ******-->
<div class="modal" id="cambia-contra" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
      <h4 class="modal-title"><strong>Cambiar Contraseña</strong></h4>
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" method="post" action="<?php echo base_url("cambiaPwd") ?>" onsubmit="ejecutaFormulario(this,'',cambioContrasena,''); return false;" >
                    <input type="hidden" name="valor" id="cmUsPwd" value="0">
                    <div class="form-group">
                        <label for="contra" class="col-sm-3 control-label">Nueva Contraseña:</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="password" id="contra" name="contra" class="form-control" required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default btn-raised rippler rippler-default" id="btn-dismiss-modal" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>
<!--****** End Basic Modal ******-->