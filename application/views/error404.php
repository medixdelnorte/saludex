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
    <link href="<?php echo base_url('assets/css/global-plugins.css'); ?>" rel="stylesheet">
    <!-- End Global plugin css -->


    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/theme.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/class-helpers.css') ?>" rel="stylesheet"/>

    <!--Color schemes-->
    <link href="<?php echo base_url("assets/css/colors/blue.css"); ?>" rel="stylesheet">

    <!--Fonts-->
    <link href="<?php echo base_url('assets/fonts/Indie-Flower/indie-flower.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/fonts/Open-Sans/open-sans.css?family=Open+Sans:300,400,700') ?>" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body id="blue-scheme">

    <!--main content start-->
    <section class="page-error">

        <div class="row">
            <div class="col-md-12">
               <div class="error_page">
        
                    <strong>404</strong>
                    <br>
                    <b>¡ Pagina no encontrada !</b>
                    
                    <em>Lo siento, la pagina a la que intentas acceder no existe !</em>

                    <p>Da clic en el boton para volver a la pagina principal.</p>
                    
                    <div class="clearfix margin_top3"></div>
                    
                    <a href="<?php echo base_url() ?>" class="btn btn-green btn-raised btn-flat"><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; Volver</a>
                    
                </div>
            </div>
            
        </div>

    </section>

    <!--======== Main Content End ========-->


    <!-- Placed js at the end of the document so the pages load faster -->

    <!--===== Footer Start ========-->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!--##################################################################################
    #
    # Thema GLOBAL JS PLUGINS
    # 
    # NOTE: These libraries are neccessary to run the template so don't remove one of these libraries. 
    # You can uncomment the following libraries commented and comment the global-plugins.js but it will may cause slow performance of the template because of many links should be load from the server.
    #
    ##################################################################################-->
    <script src="<?php echo base_url('assets/js/global-plugins.js'); ?>"></script>


    <!--##################################################################################
    #
    # COMMON SCRIPT FOR THIS PAGE
    #
    ##################################################################################-->

    <!--common script init for all pages-->
    <script src="<?php echo base_url('assets/js/theme.js'); ?>" type="text/javascript" ></script>

    <script type="text/javascript">


        $(document).ready(function(){
            new WOW().init();

            App.initPage();
            App.initLeftSideBar();
            App.initCounter();
            App.initNiceScroll();
            App.initPanels();
            App.initProgressBar();
            App.initSlimScroll();
            App.initNotific8();
            App.initTooltipster();
            App.initStyleSwitcher();
            App.initMenuSelected();
            App.initRightSideBar();
            App.initSummernote();
            App.initAccordion();
            App.initModal();
            App.initPopover();

        });
    </script>


</body>

</html>

<!--===== Footer End ========-->