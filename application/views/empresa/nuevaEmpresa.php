<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Empresas</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Empresas</a></li>
                <li><a href="<?php echo base_url('empresas/empresas') ?>">Control de Empresas</a></li>
                <li class="active"><a href="<?php echo base_url('empresas/nuevaEmpresa/') ?>">Nueva Empresa</a></li>
            </ul>
        </nav>
    </div>
    
    <!-- Boton para mostrar panel derecho -->
    <!--<div class="pull-right toggle-right-sidebar">
        <span class="fa fa-outdent fa-2x title-open-right-sidebar"></span>
    </div>-->

</div>
<!--======== Page Title and Breadcrumbs End ========-->


<!--======== START EMPRESA DETAILS FORM ========-->
<div class="c_panel">

    <div class="c_panel c_panel_info">
    <div class="c_title">
        <h2>Informacion de la Empresa</h2>
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
        
       <form id="formNuevaEmpresa" class="form-horizontal formularios" action="<?php echo base_url("crearEmpresa")?>" method="post" titulo="La Empresa" accion="insert">
            <div class="form-group">
                    <label class="col-sm-2 control-label">Razon Social*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="razon" placeholder="Razon Social" name="empresa_razon" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nombre Comercial</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ncomercial" placeholder="Nombre Comercial" name="empresa_nombre_comercial">
                    </div> 
                </div>
                <div class="form-group">
                    <label for="rfc" class="col-sm-2 control-label">R.F.C.*</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="rfc" placeholder="RFC" name="empresa_rfc" required>
                    </div> 
                </div>                                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Direccion*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direccion" placeholder="Direccion" name="empresa_direccion" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Numero Externo*</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nexterno" placeholder="Numero Externo" name="empresa_num_externo" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Numero Interno</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="ninterno" placeholder="Numero Interno" name="empresa_num_interno">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">C.P.*</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="cp" placeholder="Codigo Postal" name="empresa_cp" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Colonia*</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="colonia" placeholder="Colonia" name="empresa_colonia" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ciudad*</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="ciudad" placeholder="Ciudad" name="empresa_ciudad" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Estado*</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="estado" placeholder="Estado" name="empresa_estado" required>
                    </div>
                </div> 
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat">Crear Empresa</button>
                </div>
            </div>
        </form>

         <div id="container-error">
             
         </div>
        
    </div><!--/.c_content-->

</div><!--/.c_panels-->
<!--======== END EMPRESA DETAILS FORM ========-->