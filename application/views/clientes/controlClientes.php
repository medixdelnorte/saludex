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
                <li class="active"><a href="<?php echo base_url('clientes/controlClientes') ?>">Control de Clientes</a></li>
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
                      <a href="<?php echo base_url('clientes/nuevoCliente') ?>"><button class="btn btn-sm btn-success btn-raised rippler rippler-inverse"><i class="fa fa-plus"></i> Nuevo Cliente</button></a>
                    </div>
                 </div>
                
                <section id="flip-scroll">

                <table id="tablaBoot" class="table table-bordered table-striped table-condensed cf" style="border-spacing:0px; width:100%">
                    <thead>
                        <tr>
                            <th>Razon</th>
                            <th>RFC</th>
                            <th>Dias Credito</th>
                            <th>Telefono</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>             
                    <tbody>

                    <?php 
                        if ($clientes != false):
                            foreach ($clientes as $key => $value): 
                    ?>
                        <tr>
                            <td><?php echo $value->cliente_razon; ?></td>
                            <td><?php echo $value->cliente_rfc; ?></td>
                            <td><?php echo $value->cliente_dias_credito; ?></td>
                            <td><?php echo $value->cliente_telefono; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url("clientes/verCliente/".$value->cliente_id) ?>"><button type="button" class="btn btn-default btn-flat btn-xs" data-toggle="tooltip" title="Editar Cliente"><i class="fa fa-pencil-square-o"></i></button></a>
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