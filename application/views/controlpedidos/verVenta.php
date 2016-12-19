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
                                    <input type="text" class="form-control" disabled placeholder="Buscar Cliente" id="buscar-cliente-venta" value="<?php echo $infoVenta->cliente ?>">
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
                <h2>Partidas</h2>
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
                    
                    <div class="col-sm-12 margin-bottom-20">
                        
                        <div class="btn-group">
                            <button class="btn btn-sm btn-success btn-raised rippler rippler-inverse" data-toggle="modal" data-target="#busca-producto-venta">
                                <i class="fa fa-plus"></i> Agregar Producto
                            </button>
                        </div>                      

                    </div>

                </div>

                <small><b>Lista de Productos</b></small>
                <hr style="margin-top:1px"><!-- /separador -->

                <div class="row">
                    
                <div class="col-sm-12">

                   <!-- <section id="flip-scroll">-->

                    <table class="table table-bordered table-striped table-condensed cf" style="border-spacing:0px; width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">&nbsp;</th>
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Descripcion</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Precio U.</th>
                                <th class="text-center">Descuento</th>
                                <th class="text-center">I.V.A.</th>
                                <th class="text-center">Importe</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="partidas-venta">
                            <?php 
                                if ($partidas != false):
                                    foreach ($partidas as $key => $partida):
                             ?>
                            <tr>
                                <td class="text-center"><img src="<?php echo base_url("/assets/images/details_open.png") ?>"  data-toggle="tooltip" title="Mas Informacion"></td>
                                <td class="text-center"><?php echo $partida->codigob ?></td>
                                <td class="text-center"><?php echo $partida->descripcion ?></td>
                                <td class="text-center">
                                    <input type="text" class="caja text-center" size="8" value="<?php echo $partida->cantidad ?>" id="cantidadPartida<?php echo $partida->partidaID ?>" onBlur="actualizaPartidaVenta(<?php echo $partida->partidaID ?>)">
                                </td>
                                <td class="text-center">
                                    <input type="text" class="caja text-center" size="8" value="<?php echo number_format($partida->precio,2) ?>" id="precioPartida<?php echo $partida->partidaID ?>" onBlur="actualizaPartidaVenta(<?php echo $partida->partidaID ?>)">
                                </td>
                                <td class="text-center">
                                    <input type="text" class="caja text-center" size="8" value="<?php echo $partida->descuento ?>" id="descuentoPartida<?php echo $partida->partidaID ?>" onBlur="actualizaPartidaVenta(<?php echo $partida->partidaID ?>)">
                                </td>
                                <td class="text-center"><?php echo $partida->iva ?></td>
                                <td class="text-center" id="importePartida<?php echo $partida->partidaID ?>">0</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-info btn-xs" data-toggle="tooltip" title="Detalles Partida">&nbsp;<i class="fa fa-info"></i>&nbsp;</button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Partida" onClick="eliminaPartidaVenta(this,<?php echo $partida->partidaID ?>)"><i class="fa fa-minus"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                                    endforeach;
                                endif;
                             ?>
                        </tbody>                      
                    </table>

                    <!--</section>-->
                    
                </div>

                </div>
                
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
                    <form class="form-horizontal bClienteVenta" action="<?php echo base_url("buscar"); ?>" target="cliente" buscar="razon|rfc" ref="<?php echo $ventaID ?>">
                        <div class="input-group margin-bottom-15">
                            <input type="text" class="form-control" id="caja-buscar-c" placeholder="Buscar Cliente" required>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>

            </div><!-- /.row -->

            <div class="row">
                
                <div class="col-sm-12">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Razon Social</th>
                                <th>R.F.C.</th>
                                <th>Numero Cliente</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                            </tr>
                        </thead>
                        <tbody id="resultado-buscar-cliente">
                        </tbody>
                    </table>
                    
                </div>

            </div><!-- /.row -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-raised rippler rippler-default" id="btn-dismiss-modal" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--****** End Pull Top Modal******-->



 <!--****** Start Pull Top Modal******-->
<div class="modal modal-pull-top" data-easein="fadeInDown" data-easeout="fadeOutUp" id="busca-producto-venta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-pull-top">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title"><strong>Buscar Producto</strong></h4>
            </div>
            <div class="modal-body">
                 
            <div class="row">
                
                <div class="col-sm-12">
                    <form class="form-horizontal bProductoVenta" action="<?php echo base_url("buscar"); ?>" target="producto" buscar="descripcion|codigob|sustancia" ref="<?php echo $ventaID ?>">
                        <div class="input-group margin-bottom-15">
                            <input type="text" class="form-control" id="caja-buscar-p" placeholder="Buscar Producto" required>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>

            </div><!-- /.row -->

            <div class="row">
                
                <div class="col-sm-12">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Descripcion</th>
                                <th>Sustancia</th>
                                <th>Precio Publico</th>
                                <th>Precio Farmacia</th>
                                <th>Precio Referencia</th>
                                <th>Limitado</th>
                            </tr>
                        </thead>
                        <tbody id="resultado-buscar-producto">
                        </tbody>
                    </table>
                    
                </div>

            </div><!-- /.row -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-raised rippler rippler-default" id="btn-dismiss-modal" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--****** End Pull Top Modal******-->