<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>

<!--======== Page Title and Breadcrumbs Start ========-->
<div class="top-page-header">
    
    <div class="page-title">
        <h2>Productos</h2>
        <small></small>
    </div>
    <div class="page-breadcrumb">
        <nav class="c_breadcrumbs">
            <ul>
                <li><a href="#">Productos</a></li>
                <li class="active"><a href="<?php echo base_url('productos/controlProductos') ?>">Control de Productos</a></li>
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
                      <a href="<?php echo base_url('productos/nuevoProducto') ?>"><button class="btn btn-sm btn-success btn-raised rippler rippler-inverse"><i class="fa fa-plus"></i> Nuevo Producto</button></a>
                    </div>
                 </div>
                
                <section id="flip-scroll">

                <table id="example2" class="table table-bordered table-striped table-condensed cf" style="border-spacing:0px; width:100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Sustancia Activa</th>
                            <th>Precio Publico</th>
                            <th>Existencia</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>             
                    <tbody>
                    <?php 
                        if ($productos != false):
                            foreach ($productos as $key => $producto):
                     ?>
                        <tr>
                            <td><?php echo $producto->producto_codigob ?></td>
                            <td><?php echo $producto->producto_descripcion ?></td>
                            <td><?php echo $producto->producto_sustancia ?></td>
                            <td>$ <?php echo number_format($producto->producto_ppublico,2) ?></td>
                            <td><?php echo $producto->existenciaGlobal ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url("productos/verProducto/".$producto->producto_id) ?>"><button type="button" class="btn btn-default btn-flat btn-sm" data-toggle="tooltip" title="Editar Producto"><i class="fa fa-pencil-square-o"></i></button></a>
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