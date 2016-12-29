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
                <li><a href="<?php echo base_url('almacen/controlpedidos') ?>">Control de Pedidos</a></li>
                <li class="active"><a href="<?php echo base_url('almacen/verRemision/'.$remisionID) ?>">Detalles de la Remision</a></li>
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

        <div class="c_panel c_panel_info">

            <div class="c_title">
                <h2>Informacion del Pedido</h2>
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
                <form class="form-horizontal">

                    <small><b>Detalles del Pedido</b></small>
                    <hr style="margin-top:1px"><!-- /separador -->

                    <div class="row">

                        <div class="col-sm-3">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Pedido</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $infoRemision->pedidoID ?>" id="pd">
                                </div>
                            </div>              
                        </div>
                            
                        <div class="col-sm-4">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Empresa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo $infoRemision->empresa ?>" disabled>
                                </div>
                            </div>                                         
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Sucursal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo $infoRemision->sucursal ?>" disabled>
                                </div>
                            </div>
                        </div>

                    </div><!--  /.row-->

                    <div class="row">

                        <div class="col-sm-3">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $infoRemision->pedidoStatus ?>">
                                </div>
                            </div>                           
                        </div>

                        <div class="col-sm-4">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Fecha</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $infoRemision->pedidoFecha ?>" />
                                </div>
                            </div>                                         
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Usuario</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $infoRemision->pedidoUsuario; ?>" />
                                </div>
                            </div>
                        </div>

                    </div><!--  /.row--> 

                    <small><b>Cliente</b></small>
                    <hr style="margin-top:1px"><!-- /separador -->

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $infoRemision->cliente ?>" disabled>
                                </div>
                            </div>
                        </div>
                        
                    </div><!-- /.row -->

                    <small><b>Detalles de la Remision</b></small>
                    <hr style="margin-top:1px"><!-- /separador -->

                    <div class="row">

                        <div class="col-sm-3">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Remision</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $remisionID ?>">
                                </div>
                            </div>              
                        </div>
                            
                        <div class="col-sm-4">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Fecha</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo $infoRemision->empresa ?>" disabled>
                                </div>
                            </div>                                         
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Usuario</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo $infoRemision->sucursal ?>" disabled>
                                </div>
                            </div>
                        </div>

                    </div><!--  /.row-->

                    <div class="row">

                        <div class="col-sm-3">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $infoRemision->pedidoStatus ?>">
                                </div>
                            </div>                           
                        </div>

                    </div><!--  /.row--> 

                </form>
            </div><!--/.c_content-->
        </div><!--/.c_panels-->
    </div><!--/col-md-12-->
</div><!--/row-->

