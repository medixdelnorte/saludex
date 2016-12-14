<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Ventas</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Ventas</a></li>
                <li><a href="<?php echo base_url('controlpedidos/pedidos') ?>">Control de Pedidos</a></li>
                <li class="active"><a href="<?php echo base_url('controlpedidos/verVenta/'.$ventaID) ?>">Detalles de Operacion</a></li>
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
                <h2>Informacion de la Operacion</h2>
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

                    <small><b>Detalles</b></small>
                    <hr style="margin-top:1px"><!-- /separador -->

                    <div class="row">

                        <div class="col-sm-3">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Op#</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $infoVenta->op ?>">
                                </div>
                            </div>              
                        </div>
                            
                        <div class="col-sm-4">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Empresa</label>
                                <div class="col-sm-9">
                                    <select class="form-control traerSucursalesVenta" required action="<?php echo base_url("traerSucursalesVenta/".$ventaID) ?>" target="sucursales-venta">
                                        <option></option>
                                        <?php 
                                            if ($empresas != false):
                                                foreach ($empresas as $key => $empresa):
                                         ?>
                                        <option value="<?php echo $empresa->empresa_id; ?>"<?php echo ($infoVenta->empresaID == $empresa->empresa_id) ? " selected >" : ">"; echo $empresa->empresa_razon; ?></option>
                                        <?php 
                                                endforeach;
                                            endif;
                                         ?>
                                    </select>
                                </div>
                            </div>                                         
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Sucursal</label>
                                <div class="col-sm-9">
                                    <select class="form-control" required id="sucursales-venta" action="<?php echo base_url("cambiaSucursalVenta/".$ventaID); ?>">
                                        <option></option>
                                        <?php 
                                            if($sucursales != false):
                                                foreach ($sucursales as $key => $sucursal):
                                         ?>
                                        <option value="<?php echo $sucursal->sucursal_id ?>"<?php echo ($infoVenta->sucursalID == $sucursal->sucursal_id) ? " selected >" : ">"; echo $sucursal->sucursal_nombre; ?></option>
                                        <?php 
                                                endforeach;
                                            endif;
                                         ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div><!--  /.row-->

                    <div class="row">

                        <div class="col-sm-3">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $infoVenta->statusNombre ?>">
                                </div>
                            </div>                           
                        </div>

                        <div class="col-sm-4">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Fecha</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $infoVenta->fechaOp ?>" />
                                </div>
                            </div>                                         
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Usuario</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $infoVenta->usuario ?>" />
                                </div>
                            </div>
                        </div>

                    </div><!--  /.row--> 

                    <small><b>Cliente</b></small>
                    <hr style="margin-top:1px"><!-- /separador -->

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <div class="input-group margin-bottom-15">
                                    <span class="input-group-btn" data-toggle="tooltip" title="Buscar Cliente">
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-pull-top"><i class="fa fa-search"></i></button>
                                    </span>
                                    <input type="text" class="form-control" disabled placeholder="Buscar Cliente">
                                </div>
                            </div>
                        </div>
                        
                    </div><!-- /.row -->

                </form>
            </div><!--/.c_content-->
        </div><!--/.c_panels-->
    </div><!--/col-md-12-->
</div><!--/row-->



<div class="row">

    <div class="col-md-12">

        <div class="c_panel c_panel_info">

            <div class="c_title">
                <h2>Informacion de los Productos</h2>
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
                
            </div><!--/.c_content-->
        </div><!--/.c_panels-->
    </div><!--/col-md-12-->
</div><!--/row-->



 <!--****** Start Pull Top Modal******-->
<div class="modal modal-pull-top" data-easein="fadeInDown" data-easeout="fadeOutUp" id="modal-pull-top" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-pull-top">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title"><strong>Buscar Cliente</strong></h4>
            </div>
            <div class="modal-body">
                 
            <div class="row">
                
                <div class="col-sm-12">
                    <div class="input-group margin-bottom-15">
                        <span class="input-group-btn" data-toggle="tooltip" title="Buscar Cliente">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-pull-top"><i class="fa fa-search"></i></button>
                        </span>
                        <input type="text" class="form-control" disabled placeholder="Buscar Cliente">
                    </div>
                </div>

            </div><!-- /.row -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-raised rippler rippler-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--****** End Pull Top Modal******-->