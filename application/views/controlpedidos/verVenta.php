<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!-- obtenemos el status de la venta -->
<script type="text/javascript">
    
    statusVenta = "<?php echo $infoVenta->statusNombre ?>";

</script>

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
                                    <input type="text" class="form-control" disabled value="<?php echo $infoVenta->op ?>" id="op">
                                </div>
                            </div>              
                        </div>
                            
                        <div class="col-sm-4">                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">Empresa</label>
                                <div class="col-sm-9">
                                    <?php 
                                        if (in_array($infoVenta->statusNombre, $editarInfoVenta)):
                                    ?>
                                    <select class="form-control traerSucursalesVenta" required action="<?php echo base_url("traerSucursalesVenta/".$ventaID) ?>" target="sucursales-venta" id="empresa-venta">
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
                                    <?php 
                                        else:
                                    ?>
                                        <input type="text" class="form-control" value="<?php echo $infoVenta->empresa ?>" disabled>
                                    <?php
                                        endif;
                                     ?>
                                </div>
                            </div>                                         
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Sucursal</label>
                                <div class="col-sm-9">
                                <?php 
                                    if (in_array($infoVenta->statusNombre, $editarInfoVenta)):
                                ?>
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
                                <?php 
                                    else:
                                 ?>
                                    <input type="text" class="form-control" value="<?php echo $infoVenta->sucursal ?>" disabled>
                                <?php 
                                    endif;
                                 ?>
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
                            <?php 
                                if (in_array($infoVenta->statusNombre, $editarInfoVenta)):
                            ?>
                                <div class="input-group margin-bottom-15">
                                    <span class="input-group-btn" data-toggle="tooltip" title="Buscar Cliente">
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal-pull-top" id="b-clientev"><i class="fa fa-search"></i></button>
                                    </span>
                                    <input type="text" class="form-control" disabled placeholder="Buscar Cliente" id="buscar-cliente-venta" value="<?php echo $infoVenta->cliente ?>">
                                </div>
                            <?php 
                                else:                                    
                             ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $infoVenta->cliente ?>" disabled>
                                </div>
                            <?php 
                                endif;
                             ?>
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
                        <?php 
                            if (in_array($infoVenta->statusNombre, $editarPartidas)):
                        ?>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-success btn-raised rippler rippler-inverse" data-toggle="modal" data-target="#busca-producto-venta" id="b-productov">
                                <i class="fa fa-plus"></i> Agregar Producto
                            </button>
                        </div>
                        <?php 
                            endif;
                         ?>      

                    </div>

                </div>

                <small><b>Lista de Productos</b></small>
                <hr style="margin-top:1px"><!-- /separador -->

                <div class="row">
                    
                    <div class="col-sm-12">

                       <!-- <section id="flip-scroll">-->

                        <table class="table table-bordered table-striped table-condensed table-hover cf" style="border-spacing:0px; width:100%">
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
                                    <td class="text-center">
                                        <img onclick="infoAdvancePvta(this)" src="<?php echo base_url("/assets/images/details_open.png") ?>" val="0" data-toggle="tooltip" title="Mas Informacion" p="<?php echo $partida->partidaID ?>">
                                    </td>
                                    <td class="text-center"><?php echo $partida->codigob ?></td>
                                    <td class="text-center"><?php echo $partida->descripcion ?></td>
                                    <td class="text-center">
                                        <?php 
                                            if (in_array($infoVenta->statusNombre, $editarPartidas)):
                                        ?>
                                        <input type="text" class="caja text-center" size="8" value="<?php echo $partida->cantidad ?>" id="cantidadPartida<?php echo $partida->partidaID ?>" onBlur="actualizaPartidaVenta(<?php echo $partida->partidaID.",".$ventaID ?>)">
                                        <?php 
                                            else:
                                                echo $partida->cantidad;
                                            endif;
                                         ?>

                                    </td>
                                    <td class="text-center">
                                        <?php 
                                             if (in_array($infoVenta->statusNombre, $editarPartidas)):
                                         ?>
                                        <input type="text" class="caja text-center" size="8" value="<?php echo number_format($partida->precio,2) ?>" id="precioPartida<?php echo $partida->partidaID ?>" onBlur="actualizaPartidaVenta(<?php echo $partida->partidaID.",".$ventaID ?>)">
                                        <?php 
                                            else:
                                                 echo "$ ".number_format($partida->precio,2);
                                             endif;
                                         ?>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                             if (in_array($infoVenta->statusNombre, $editarPartidas)):
                                         ?>
                                        <input type="text" class="caja text-center" size="8" value="<?php echo $partida->descuento ?>" id="descuentoPartida<?php echo $partida->partidaID ?>" onBlur="actualizaPartidaVenta(<?php echo $partida->partidaID.",".$ventaID ?>)">
                                        <?php 
                                            else:
                                                 echo $partida->descuento;
                                             endif;
                                         ?>
                                    </td>
                                    <td class="text-center">$ <?php echo number_format($partida->iva,2) ?></td>
                                    <td class="text-center" id="importePartida<?php echo $partida->partidaID ?>">$ <?php echo number_format($partida->importe,2); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group" data-toggle="tooltip" title="Detalles Partida">
                                            <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#detalles-partida" onClick="abreDetallesPartida(<?php echo $partida->partidaID ?>)">&nbsp;<i class="fa fa-info"></i>&nbsp;</button>
                                        </div>
                                        <?php 
                                             if (in_array($infoVenta->statusNombre, $editarPartidas)):
                                         ?>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-xs" data-toggle="tooltip" title="Eliminar Partida" onClick="eliminaPartidaVenta(this,<?php echo $partida->partidaID ?>)"><i class="fa fa-minus"></i></button>
                                        </div>
                                         <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="9" style="display: none" id="advance_<?php echo $partida->partidaID ?>"></td>
                                </tr>
                                <?php 
                                        endforeach;
                                    endif;
                                 ?>
                                 <tr>
                                     <td colspan="6"></td>
                                     <td class="text-center">Subtotal</td>
                                     <td class="text-center" id="ventaSubtotal"><b>$ <?php echo number_format($infoVenta->ventaSubtotal,2) ?></b></td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <td colspan="6"></td>
                                     <td class="text-center">I.V.A.</td>
                                     <td class="text-center" id="ventaIVA"><b>$ <?php echo number_format($infoVenta->ventaIVA,2) ?></b></td>
                                     <td></td>
                                 </tr>
                                 <tr>
                                     <td colspan="6"></td>
                                     <td class="text-center">Total</td>
                                     <td class="text-center" id="ventaTotal"><b>$ <?php echo number_format($infoVenta->ventaTotal,2) ?></b></td>
                                     <td></td>
                                 </tr>
                            </tbody>                      
                        </table>

                        <!--</section>-->
                        
                    </div>

                </div>

                <small><b>Opciones</b></small>
                <hr style="margin-top:1px"><!-- /separador -->

                <div class="row">

                    <div class="col-sm-2">

                        <button class="btn btn-info btn-sm btn-raised col-xs-12 margin-top-10">Imprimir</button>
                        
                    </div>
                    
                    <div class="col-sm-2">

                        <button class="btn btn-primary btn-sm btn-raised col-xs-12 margin-top-10" data-toggle="modal" data-target="" id="btn-primario-venta"></button>
                        
                    </div>

                    <div class="col-sm-2">

                        <button class="btn btn-danger btn-sm btn-raised col-xs-12 margin-top-10" data-toggle="modal" data-target="" id="btn-cancelar-venta"></button>
                        
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



<!--****** Start Basic Modal ******-->
<div class="modal" id="cerrar-cot" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
      <h4 class="modal-title"><strong>Cerrar Cotizacion</strong></h4>
    </div>
    <div class="modal-body">

        <div class="row">

            <div class="col-sm-12">
                ¿ Al cerrar la cotizacion, no podras cambiar el cliente, realmente deseas cerrar la cotizacion ?
            </div>

        </div>

        <div class="row">

            <div class="col-sm-12 text-center margin-top-15">

                <button class="btn btn-primary btn-raised" onClick="cambiaStatusVenta(<?php echo $ventaID ?>,2)">Aceptar</button>
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
<div class="modal" id="genera-pedido" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
      <h4 class="modal-title"><strong>Generar Pedido</strong></h4>
    </div>
    <div class="modal-body">

        <div class="row">

            <div class="col-sm-12">
                ¿ Al generar el Pedido no podras realizar ningun cambio en la operacion, realmente deseas generar el Pedido ?
            </div>

        </div>

        <div class="row">

            <div class="col-sm-12 text-center margin-top-15">

                <button class="btn btn-primary btn-raised" onClick="cambiaStatusVenta(<?php echo $ventaID ?>,4)">Aceptar</button>
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
<div class="modal" id="cancelar-pedido" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
      <h4 class="modal-title"><strong>Cancelar Pedido</strong></h4>
    </div>
    <div class="modal-body">

        <div class="row">

            <div class="col-sm-12">
                ¿ Realmente deseas Cancelar el Pedido ?
            </div>

        </div>

        <div class="row">

            <div class="col-sm-12 text-center margin-top-15">

                <button class="btn btn-primary btn-raised" onClick="cambiaStatusVenta(<?php echo $ventaID ?>,5)">Aceptar</button>
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


<!--****** Start Large Modal ******-->
<div class="modal" id="detalles-partida" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
      <h4 class="modal-title"><strong>Detalles de Partida</strong></h4>
    </div>
    <div class="modal-body">

        <div class="row">
    
            <div class="col-sm-12">
                <form class="form-horizontal">
                
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Descripcion</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="dtll-descripcion">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success" data-toggle="tooltip" title="Reestablecer Descripcion"><i class="fa fa-refresh"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="control-label col-md-2">I.V.A.</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" id="dtll-iva">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="control-label col-md-2">Comentarios</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="dtll-comentario"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="partida-venta" value="0">

                </form>
            </div>

        </div>
      
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success btn-raised rippler rippler-default" id="btn-guarda-dtlls">Guardar Cambios</button>
        <button type="button" class="btn btn-default btn-raised rippler rippler-default" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>
<!--****** End Large Modal ******-->