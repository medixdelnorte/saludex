<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="">
    <meta name="keywords" content="">

    <meta name="author" content="LanceCoder">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="">
    <title>Saludex</title>

    <!-- Start Global plugin css -->
    <link href="<?php echo base_url("assets/css/global-plugins.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/vendors/jquery-icheck/skins/all.css"); ?>" rel="stylesheet" />
    <link href="assets/vendors/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- End Global plugin css -->

    <!-- IOS SWITCH -->
    <link href="<?php echo base_url("assets/vendors/ios-switch/css/switch.css"); ?>" rel="stylesheet" />


    <!--este es solamente para cargar tablas-->
    <link href="<?php echo base_url("assets/css/table-responsive.css"); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url("assets/vendors/datatable/bootstrap/dataTables.bootstrap.css") ?>" rel="stylesheet">

    <!-- sweetalert -->
    <link href="<?php echo base_url("assets/vendors/sweetalert/sweetalert.css"); ?>" rel="stylesheet" type="text/css">
    

    <!-- This page plugin css start -->
    <link href="<?php echo base_url("assets/vendors/maps/css/jquery-jvectormap-2.0.1.css"); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url("assets/vendors/morris-chart/morris.css"); ?>" rel="stylesheet" >
    <link href="<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/vendors/jquery-ricksaw-chart/css/rickshaw.css"); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url("assets/css/flot-chart.css"); ?>" rel="stylesheet"/>
    <!-- This page plugin css end -->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets/css/theme.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/style-responsive.css"); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url("assets/css/class-helpers.css"); ?>" rel="stylesheet"/>

    <!--Color schemes-->
    <!--<link href="<?php echo base_url("assets/css/colors/green.css"); ?>" rel="stylesheet">-->
    <!--<link href="<?php echo base_url("assets/css/colors/turquoise.css"); ?>" rel="stylesheet">-->
    <link href="<?php echo base_url("assets/css/colors/blue.css"); ?>" rel="stylesheet">
    <!--<link href="<?php echo base_url("assets/css/colors/amethyst.css"); ?>" rel="stylesheet">-->
    <!--<link href="<?php echo base_url("assets/css/colors/cloud.css"); ?>" rel="stylesheet">-->
    <!--<link href="<?php echo base_url("assets/css/colors/sun-flower.css"); ?>" rel="stylesheet">-->
    <!--<link href="<?php echo base_url("assets/css/colors/carrot.css"); ?>" rel="stylesheet">-->
    <!--<link href="<?php echo base_url("assets/css/colors/alizarin.css"); ?>" rel="stylesheet">-->
    <!--<link href="<?php echo base_url("assets/css/colors/concrete.css"); ?>" rel="stylesheet">-->
    <!--<link href="<?php echo base_url("assets/css/colors/wet-asphalt.css"); ?>" rel="stylesheet">-->

    <!--Fonts-->
    <link href="<?php echo base_url("assets/fonts/Indie-Flower/indie-flower.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/fonts/Open-Sans/open-sans.css?family=Open+Sans:300,400,700"); ?>" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<!--
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Thema Color Schemes
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

* Just add the attribute value to the attribute ID in <body> element
* List of color scheme values that supported to this theme
    - default-scheme - the default is green color
    - alizarin-scheme
    - amethyst-scheme
    - blue-scheme
    - carrot-scheme
    - cloud-scheme
    - concrete-scheme
    - sun-flower-scheme
    - turquoise-scheme
    - wet-asphalt-scheme

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-->


<!--
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Thema Layout Options
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

* Lists of layout options just follow the instructions if you want to use this feature
    > Boxed Page
        - Just add class "fixed-width-unfixed-header" in <body> element 
        - and add class "unfixed-header" also in  <div class="leftside-navigation"> just search "leftside-navigation"
        - and add class also "unfixed-header" to the <section id="main-content"> element just search it
        
    > Boxed Page + Fixed Header
        - Just add class "fixed-width" in <body> element
        - and add class also "boxed-page-fixed-header" to the <section id="main-content"> element just search it

    > Boxed Page + No sidebar
        - Just add class "fixed-width-unfixed-header no-sidebar" in <body> element 
        - and add class also "unfixed-header merge-left" to the <section id="main-content"> element just search it
    
    > Boxed Page + No sidebar + Fixed header
        - Just add class "fixed-width no-sidebar" in <body> element
        - and add class also "merge-left" to the <section id="main-content"> element just search it

    > Full width + Unfixed header
        - Just add class "full-content-unfixed-header" in <body> element
        - and add class also "merge-left" to the <section id="main-content"> element just search it 
    
    > Right Sidebar
        - Just follow the sample page
        - the important to do is replace "<section id="main-content">" to "<section id="main-content-right">"

+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-->
<body id="blue-scheme">

    <!--======== Start Style Switcher ========-->    
    <!--
    <i class="style-switcher-btn fa fa-cogs hidden-xs"></i>
    <div class="style-switcher">
        <div class="style-swticher-header">
            <div class="style-switcher-heading fg-white">Color Switcher</div>            
            <div class="theme-close"><i class="icon-close"></i></div>
        </div>
        
        <div class="style-swticher-body">
            <ul class="list-unstyled">
                <li class="theme-default theme-active" data-style="default"></li>
                <li class="theme-turquoise" data-style="turquoise"></li>
                <li class="theme-blue" data-style="blue"></li>
                <li class="theme-amethyst" data-style="amethyst"></li>
                <li class="theme-cloud" data-style="cloud"></li>
                <li class="theme-sun-flower" data-style="sun-flower"></li>
                <li class="theme-carrot" data-style="carrot"></li>
                <li class="theme-alizarin" data-style="alizarin"></li>
                <li class="theme-concrete" data-style="concrete"></li>
                <li class="theme-wet-ashphalt" data-style="wet-ashphalt"></li>
            </ul>         
        </div>
    </div>--><!--/style-switcher-->
    <!--======== End Style Switcher ========-->

    <section id="container">

        <!--header start-->
        <header class="header fixed-top clearfix">

            <!--logo start-->
            <div class="brand">

                <a href="#" class="logo">
                    Saludex
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <!-- 
                *****************************
                ** Start of top navigation **
                *****************************
             -->
            <div class="top-nav">

                <ul class="nav navbar-nav navbar-left" style="margin-left:30px;">
                    <!--<li>
                        <a href="javascript:void(0)" class="btn-menu-grid" title="Menu Grid">
                            <span class="icon-grid"></span>
                        </a>
                    </li>-->
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Opciones
                            <span class=" fa fa-angle-down" style="font-size:12px;"></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInUp pull-right">
                            <li>
                                <a href="javascript:void(0);" class="hvr-bounce-to-right">  Submenu 1</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="hvr-bounce-to-right">Submenu 3</a>
                            </li>
                            <li><a href="login.html" class="hvr-bounce-to-right">Submenu 4</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="search-box">
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <li role="presentation" class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                            <span class="pe-7s-mail" style="font-size:22.9px;"></span>
                            <span class="badge bg-color label-danger">0</span>
                        </a>
                        <ul id="menu" class="dropdown-menu list-unstyled msg_list animated fadeInUp" role="menu">
                            <li>
                                <a class="hvr-bounce-to-right">
                                    <span class="image">
                                        <img src="<?php echo base_url("assets/images/profile.jpg") ?>" alt="Profile Image" />
                                    </span>
                                    <span>
                                        <span>Administrador</span>
                                        <span class="time">0 mins ago</span>
                                    </span>
                                    <span class="message">
                                        Funcion en desarrollo
                                    </span>
                                </a>
                            </li>                           
                            <li class='top-nav-li-see-all-alerts'>
                                <div class="text-center">
                                    <a href="inbox.html">
                                        <strong>Mostrar todo</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:void(0);" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo base_url("assets/images/profile.jpg") ?>" alt="image"><?php echo $this->session->userdata("nombre") ?>
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu animated fadeInUp pull-right">
                            <li>
                                <a href="app-pages/page-profile-dashboard.html" class="hvr-bounce-to-right">  Perfil</a>
                            </li>
                            <li>
                                <a href="app-pages/page-profile-settings.html" class="hvr-bounce-to-right">
                                    <span>Configuracion</span>
                                </a>
                            </li>
                            <li><a href="<?php echo base_url("login/salir") ?>" class="hvr-bounce-to-right"><i class=" icon-login pull-right"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>

            <!-- 
                *****************************
                *** End of top navigation ***
                *****************************
             -->

        </header>    <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse md-box-shadowed">
                <!-- sidebar menu start-->
                <div class="leftside-navigation leftside-navigation-scroll">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li class="sidebar-profile">

                            <div class="profile-options-container">
                                <p class="text-right profile-options"><span class="profile-options-close pe-7s-close fa-2x font-bold"></span></p>

                                <div class="profile-options-list animated zoomIn">
                                    <p><a href="app-pages/page-profile-dashboard.html">Perfil</a></p>
                                    <p><a href="app-pages/page-profile-settings.html">Configuracion</a></p>
                                    <p><a href="<?php echo base_url("login/salir") ?>">Log Out</a></p>
                                </div>
                                
                            </div>
                            
                            <div class="profile-main">
                                <p class="text-right profile-options"><i class="profile-options-open icon-options-vertical fa-2x"></i></p>
                                <p class="image">
                                    <img alt="image" src="<?php echo base_url("assets/images/profile.jpg") ?>" width="80">
                                    <span class="status"><i class="fa fa-circle text-success"></i></span>
                                </p>
                                <p>
                                    <span class="name"><?php echo $this->session->userdata("nombre") ?></span><br>
                                    <span class="position" style="font-family: monospace;">&nbsp;</span>
                                </p>
                            </div>
                            
                        </li>
                        <li class=''><a href="<?php echo base_url("dashboard"); ?>" class="hvr-bounce-to-right-sidebar-parent <?php echo ($menu == "dashboard")?"active":"" ?>"><span class='icon-sidebar icon-home fa-2x'></span><span>Dashboard</span></a>
                        </li>

                        <li class=''><a href="<?php echo base_url("clientes/controlClientes"); ?>" class="hvr-bounce-to-right-sidebar-parent <?php echo ($menu == "clientes")?"active":"" ?>"><span class='icon-sidebar fa fa-briefcase fa-2x'></span><span>Clientes</span></a></li>

                        <li class=''><a href="<?php echo base_url("proveedores/proveedores"); ?>" class="hvr-bounce-to-right-sidebar-parent <?php echo ($menu == "proveedores")?"active":"" ?>"><span class='icon-sidebar pe-7s-id fa-2x'></span><span>Proveedores</span></a></li>

                        <li class='sub-menu '><a href="#" class="hvr-bounce-to-right-sidebar-parent <?php echo ($menu == "controlpedidos")?"active":"" ?>"><span class='icon-sidebar fa fa-usd fa-2x'></span><span>Ventas</span></a>
                            <ul class='sub'>
                                <li><a href="<?php echo base_url("controlpedidos/pedidos"); ?>">Control de Pedidos</a>
                                </li>
                            </ul>
                        </li>

                        <li class='sub-menu '><a href="#" class="hvr-bounce-to-right-sidebar-parent <?php echo ($menu == "productos")?"active":"" ?>"><span class='icon-sidebar fa fa-cubes fa-2x'></span><span>Productos</span></a>
                            <ul class='sub'>
                                <li><a href="<?php echo base_url("productos/controlProductos"); ?>">Control de Productos</a>
                                </li>
                            </ul>
                        </li>

                        <li class='sub-menu '><a href="#" class="hvr-bounce-to-right-sidebar-parent <?php echo ($menu == "almacen")?"active":"" ?>"><span class='icon-sidebar pe-7s-box1 fa-2x'></span><span>Almacen</span></a>
                            <ul class='sub'>
                                <li><a href="<?php echo base_url("almacen/existencias"); ?>">Existencias</a>
                                </li>
                            </ul>
                        </li>

                        <li class='sub-menu '><a href="#" class="hvr-bounce-to-right-sidebar-parent <?php echo ($menu == "empresas" || $menu == "sucursales" || $menu == "almacenes" || $menu == "usuarios" || $menu == "perfiles" || $menu == "departamentos")?"active":"" ?>"><span class='icon-sidebar pe-7s-config fa-2x'></span><span>Configuracion</span></a>
                            <ul class='sub'>
                                <li class="sub-menu"><a href="javascript:void(0);" class="<?php echo ($menu == "usuarios" || $menu == "perfiles" || $menu == "departamentos")?"active":"" ?>">Control de Usuarios</a>
                                    <ul class="sub">
                                        <li>
                                            <a href="<?php echo base_url("usuarios/usuarios"); ?>">Usuarios</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url("perfiles/perfiles"); ?>">Perfiles de Usuario</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url("departamentos/departamentos"); ?>">Departamentos</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sub-menu"><a href="javascript:void(0);" class="<?php echo ($menu == "empresas" || $menu == "sucursales" || $menu == "almacenes")?"active":"" ?>">Control de Empresa</a>
                                    <ul class="sub">
                                        <li>
                                            <a href="<?php echo base_url("empresas/empresas"); ?>">Empresa</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url("sucursales/sucursales"); ?>">Sucursal</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url("almacenes/almacenes"); ?>">Almacen</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <!--
                        <li class='sub-menu '><a href="1" class="hvr-bounce-to-right-sidebar-parent"><span class='icon-sidebar icon-screen-desktop fa-2x'></span><span>Menu</span></a>
                            <ul class='sub'>
                                <li class="sub-menu"><a href="javascript:void(0);">Submenu</a>
                                    <ul class='sub'>
                                        <li><a href='layouts/boxed_page.html'>Item 1</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href='layouts/full_width_content.html'>Item 1</a>
                                </li>
                            </ul>
                        </li>
                        --> 
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>    <!--sidebar end-->

        <!-- /menu footer buttons -->
        
        <!--<div class="sidebar-footer hidden-small">
            <a class="tooltip-settings" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a class="tooltip-fullscreen" title="Full Screen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a class="tooltip-resize-fullscreen" title="Resize Screen" style='display:none'>
                <span class="glyphicon glyphicon-resize-full" aria-hidden="true"></span>
            </a>
            <a class="tooltip-lock" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a class="tooltip-logout" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>-->    <!-- /menu footer buttons -->

        <!--main content start-->
        <section id="main-content">

                
            <section class="wrapper">

                    
                <!--======== Grid Menu Start ========-->
                <div id="grid-menu">
                    <div class="color-overlay grid-menu-overlay">
                        <div class="grid-icon-wrap grid-icon-effect-8">
                            <a href="#" class="grid-icon icon-envelope font-size-50 turquoise"></a>
                            <a href="#" class="grid-icon icon-user font-size-50 teal"></a>
                            <a href="#" class="grid-icon icon-support font-size-50 peter-river"></a>
                            <a href="#" class="grid-icon icon-settings font-size-50 light-blue"></a>
                            <a href="#" class="grid-icon icon-picture font-size-50 orange"></a>
                            <a href="#" class="grid-icon icon-camrecorder font-size-50 light-orange"></a>
                        </div>
                    </div>
                </div>                
                <!--======== Grid Menu End ========-->


                <!-- ============ Aqui van los modulos =============== -->


              


               