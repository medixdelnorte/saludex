<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>


<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Almacen</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Almacen</a></li>
                <li class="active"><a href="<?php echo base_url('almacen/controlpedidos') ?>">Control de Pedidos</a></li>
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
                
                <section id="flip-scroll">

                <table id="tablaBoot" class="table table-bordered table-condensed table-hover cf" style="border-spacing:0px; width:100%">
                    <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>Fecha</th>
                            <th>Status</th>
                            <th>Empresa</th>
                            <th>Cliente</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>             
                    <tbody>
                        <?php 
                            if ($pedidos != false):
                                foreach ($pedidos as $key => $pedido):
                         ?>
                        <tr class="text-center">
                            <td><?php echo $pedido->pedidoID; ?></td>
                            <td><?php echo $pedido->fecha; ?></td>
                            <td><span class="label label-<?php echo $pedido->statusColor ?> label-mini"><?php echo $pedido->statusNombre ?></span></td>
                            <td><?php echo $pedido->empresa; ?></td>
                            <td><?php echo $pedido->cliente; ?></td>
                            <td class="text-center">
                                <?php 
                                    if ($pedido->remisionAbierta == 0):
                                 ?>
                                <span data-toggle="tooltip" title="Iniciar Remision"><button type="button" class="btn btn-success btn-flat btn-xs btnPasaValor" objetivo="pd" valor="<?php echo $pedido->pedidoID; ?>" data-toggle="modal" data-target="#iniciar-remision"><i class="fa fa-share-square-o"></i></button></span>
                                <?php 
                                    endif;
                                    if ($pedido->remisiones > 0):
                                 ?>
                                <span data-toggle="tooltip" title="Ver Remisiones"><button type="button" class="btn btn-primary btn-flat btn-xs show-rem" data-toggle="modal" data-target="#ver-remisiones" p="<?php echo $pedido->pedidoID ?>"><i class="fa fa-file-text-o"></i></button></span>
                                <?php 
                                    endif;
                                 ?>
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
<div class="modal" id="iniciar-remision" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
      <h4 class="modal-title"><strong>Iniciar Remision</strong></h4>
    </div>
    <div class="modal-body">

        <div class="row">

            <div class="col-sm-12 text-center">
                ¿ Realmente deseas Iniciar la Remision ?
            </div>

        </div>

        <div class="row">

            <div class="col-sm-12 text-center margin-top-15">
                <input type="hidden" id="pd">
                <button class="btn btn-primary btn-raised ini-rem">Aceptar</button>
                <button class="btn btn-danger btn-raised" data-dismiss="modal">Cancelar</button>
            </div>

        </div>

    </div>
    <div class="modal-footer">
      &nbsp;
    </div>
  </div>
</div>
</div>
<!--****** End Basic Modal ******-->



<!--****** Start Basic Modal ******-->
<div class="modal" id="ver-remisiones" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
      <h4 class="modal-title"><strong>Remisiones</strong></h4>
    </div>
    <div class="modal-body">

        <div class="row">

            <div class="col-sm-12">
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Remision #</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="contenedor-remisiones">
                        
                    </tbody>
                </table>

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