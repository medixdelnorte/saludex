<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="">
    <meta name="keywords" content="thema bootstrap template, thema admin, bootstrap, admin template, bootstrap admin">

    <meta name="author" content="LanceCoder">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="">
    <title>Saludex</title>

    <!-- Start Global plugin css -->
    <link href="<?php echo base_url("assets/css/global-plugins.css") ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/vendors/jquery-icheck/skins/all.css") ?>" rel="stylesheet" />

    <!-- End Global plugin css -->


    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets/css/theme.css") ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/style-responsive.css") ?>" rel="stylesheet"/>
    <link href="<?php echo base_url("assets/css/class-helpers.css") ?>" rel="stylesheet"/>

    <!--Color schemes-->
    <link href="<?php echo base_url("assets/css/colors/green.css") ?>" rel="stylesheet">

    <!--Fonts-->
    <link href="<?php echo base_url("assets/fonts/Indie-Flower/indie-flower.css") ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/fonts/Open-Sans/open-sans.css?family=Open+Sans:300,400,700") ?>" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body id="default-scheme" class="form-background">

    <!--main content start-->
    <div class="bg-overlay"></div>
    <section class="registration-login-wrapper">

        <!--======== START LOGIN ========-->
        <div class="row page-login">

            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-2"> 

                <div class="form-body bg-white padding-20">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">

                            <div class="form-header bg-white padding-10 text-center">
                                <h2><strong>Iniciar Sesion</strong></h2>
                                <p>Introduce tus credenciales.</p>                    
                            </div>

                            <form action="<?php echo base_url("iniciarSesion") ?>" method="post" onsubmit="ejecutaFormulario(this,'',iniciarSesion,''); return false;" >
                                <div class="inner-addon right-addon margin-bottom-15">
                                    <i class="fa fa-envelope"></i>
                                    <input type="text" class="form-control" name="usuario" placeholder="Usuario" required />
                                </div>

                                <div class="inner-addon right-addon margin-bottom-15">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required />
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-green btn-raised btn-flat">Acceder</button>
                                    </div>
                                </div>                               
                                
                            </form>

                        </div><!--/col-md-6-->

                    </div><!--/row-->   

                    <div class="row">
                        <div id="container-error" class="col-sm-12 margin-top-10">
                            
                        </div> 
                    </div>

                    <hr/>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4>¿ Olvidaste tu contraseña ?</h4>
                            <p><a href="#">Click Aqui para recupar tu contraseña</a></p>
                        </div>
                    </div>

                </div><!--/form-body-->
                
            </div><!--/col-md-12-->

        </div><!--/row-->
        <!--======== END LOGIN ========-->

    </section>
    <!--======== Main Content End ========-->


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
    <script src="<?php echo base_url("assets/js/global-plugins.js") ?>"></script>


    <!--##################################################################################
    #
    # COMMON SCRIPT FOR THIS PAGE
    #
    ##################################################################################-->

    <!--common script init for all pages-->
    <script src="<?php echo base_url("assets/js/theme.js") ?>" type="text/javascript" ></script>

    <!-- For Form Elements Page Only -->
    <script src="<?php echo base_url("assets/js/forms.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/form-validation.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/form-wizard.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/form-plupload.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/form-x-editable.js") ?>"></script>

    <!-- For Login and registration page Only -->
    <script src="<?php echo base_url("assets/vendors/backstretch/jquery.backstretch.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/registration-login.js") ?>"></script>


    <!-- script para el modulo login -->
    <script src="<?php echo base_url("assets/js/modulos/helpersJs.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/modulos/loginJs.js") ?>"></script>



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