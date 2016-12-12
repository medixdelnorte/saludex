<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Clientes</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Clientes</a></li>
                <li><a href="<?php echo base_url('clientes/controlClientes') ?>">Control de Clientes</a></li>
                <li class="active"><a href="<?php echo base_url('clientes/verCliente/'.$clienteID) ?>">Detalles del Cliente</a></li>
            </ul>
        </nav>
    </div>
    
    <!-- Boton para mostrar panel derecho -->
    <!--<div class="pull-right toggle-right-sidebar">
        <span class="fa fa-outdent fa-2x title-open-right-sidebar"></span>
    </div>-->

</div>
<!--======== Page Title and Breadcrumbs End ========-->


<!--======== START CLIENT DETAILS FORM ========-->
<div class="c_panel">

    <div class="c_panel c_panel_info">
        <div class="c_title">
            <h2>Detalles del Cliente</h2>
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
            
           <form id="formEditaCliente" class="form-horizontal formularios" action="<?php echo base_url("editarCliente/".$clienteID)?>" method="post" titulo="El Cliente" accion="update">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Razon Social*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="razon" placeholder="Razon Social" value="<?php echo $infoCliente->cliente_razon ?>" name="cliente_razon" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nombre Comercial</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ncomercial" placeholder="Nombre Comercial" value="<?php echo $infoCliente->cliente_nombre_comercial ?>" name="cliente_nombre_comercial">
                    </div> 
                </div>
                <div class="form-group">
                    <label for="rfc" class="col-sm-2 control-label">R.F.C.*</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="rfc" placeholder="RFC" value="<?php echo $infoCliente->cliente_rfc ?>" name="cliente_rfc" required>
                    </div> 
                </div>               
                <div class="form-group">
                    <label class="col-sm-2 control-label">Numero de Cliente</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="ncliente" placeholder="Numero de Cliente" value="<?php echo $infoCliente->cliente_numero_cliente ?>" name="cliente_numero_cliente">
                    </div>  
                </div>                  
                <div class="form-group">
                    <label class="col-sm-2 control-label">Direccion*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direccion" placeholder="Direccion" value="<?php echo $infoCliente->cliente_direccion ?>" name="cliente_direccion" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Numero Externo</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nexterno" placeholder="Numero Externo" value="<?php echo $infoCliente->cliente_num_externo ?>" name="cliente_num_externo">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Numero Interno</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="ninterno" placeholder="Numero Interno" value="<?php echo $infoCliente->cliente_num_interno ?>" name="cliente_num_interno">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">C.P.*</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="cp" placeholder="Codigo Postal" value="<?php echo $infoCliente->cliente_cp ?>" name="cliente_cp" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Colonia*</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="colonia" placeholder="Colonia" value="<?php echo $infoCliente->cliente_colonia ?>" name="cliente_colonia" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ciudad*</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="ciudad" placeholder="Ciudad" value="<?php echo $infoCliente->cliente_ciudad ?>" name="cliente_ciudad" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Estado*</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="estado" placeholder="Estado" value="<?php echo $infoCliente->cliente_estado ?>" name="cliente_estado" required>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="correo" placeholder="Correo Electronico" value="<?php echo $infoCliente->cliente_correo ?>" name="cliente_correo">    
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telefono</label>
                    <div class="col-sm-3">
                        <input type="text" id="telefono" placeholder="Telefono" class="form-control" data-mask="(999) 999-9999" value="<?php echo $infoCliente->cliente_telefono ?>" name="cliente_telefono">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Celular</label>
                    <div class="col-sm-3">
                        <input type="text" id="celular" placeholder="Celular" class="form-control" data-mask="(999) 999-9999" value="<?php echo $infoCliente->cliente_celular ?>" name="cliente_celular">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-sm-2 control-label">Dias Credito</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="dias" placeholder="Dias de Credito" value="<?php echo $infoCliente->cliente_dias_credito ?>" name="cliente_dias_credito">     
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Limite Credito</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="limitec" placeholder="Limite de Credito" value="<?php echo $infoCliente->cliente_limite_credito ?>" name="cliente_limite_credito">     
                    </div>
                </div>
                <div class="form-group">
                    <label for="additional-information" class="col-sm-2 control-label">Observaciones</label>
                    <div class="col-sm-10">
                        <textarea class="form-control autosize-animated" id="additional-information" name="cliente_observaciones"><?php echo $infoCliente->cliente_observaciones ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                     <label for="status" class="col-sm-2 control-label">Status</label>
                     <div class="col-sm-3">
                        <select id="status" class="form-control" name="cliente_status_id">
                        <?php 
                            if ($listaStatusCliente != false):
                                foreach ($listaStatusCliente as $key => $statusC):
                         ?>

                            <option value="<?php echo $statusC->cliente_status_id ?>" <?php echo ($statusC->cliente_status_id == $infoCliente->cliente_status_id)? "selected" : "" ?>>
                                <?php echo $statusC->cliente_status_nombre ?>
                            </option>

                        <?php 
                                endforeach;
                            endif;
                         ?>
                        </select>             
                     </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info btn-flat">Actualizar</button>
                    </div>
                </div>
            </form>
            
        </div><!--/.c_content-->

    </div><!--/.c_panels-->
</div>
<!--======== END CLIENT DETAILS FORM ========-->

