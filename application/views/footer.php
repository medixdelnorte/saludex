<?php
defined('BASEPATH') OR exit('No se puede acceder al archivo directamente.');
?>          

             <!-- ============ Fin modulos =============== -->



            </section>
            
        </section>
        <!--======== Main Content End ========-->


        <!--===== Right sidebar nofications start ========-->
        <aside>
            <div id="right-sidebar" class="right-sidebar-notifcations nav-collapse hide-right-bar-notifications">
                <div class="bs-example bs-example-tabs right-sidebar-tab-notification" data-example-id="togglable-tabs">
                    <ul id="right-sidebar-tabs" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#activities" id="activities-tab" role="tab" data-toggle="tab" aria-controls="activities" aria-expanded="true">Activities</a>
                        </li>
                        <li role="presentation">
                            <a href="#tasks" role="tab" id="tasks-tab" data-toggle="tab" aria-controls="tasks">Tasks</a>
                        </li>
                        <li role="presentation">
                            <a href="#settings" role="tab" id="settings-tab" data-toggle="tab" aria-controls="settings">Settings</a>
                        </li>
                        
                    </ul>
                    <div id="right-sidebar-tab-content" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="activities" aria-labelledBy="activities-tab">
                            <div class="right-sidebar-panel-content-heading">
                                <h4><span class="icon-user"></span> Latest user activities</h4>
                                <small>10 Latest Activities</small>
                            </div>
                            <div class="right-sidebar-panel-content animated fadeInRight">
                                
                                <ul class="right-sidebar-list">
                                    <li>
                                        <div class="pull-left thumbnail-hover">
                                            <div class="overflow-hidden">
                                                <img src="<?php echo base_url("assets/images/profile.jpg") ?>" width="80" alt="image" />
                                            </div>
                                        </div>
                                        <div>
                                            <h5>John Doe - User Login...</h5>
                                            <p>Accessing the system...</p>
                                        </div>
                                    </li>                                    
                                </ul>    

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tasks" aria-labelledBy="tasks-tab">
                            <div class="right-sidebar-panel-content-heading">
                                <h4><span class="icon-list"></span> Recent tasks</h4>
                                <small>15 Ongoing tasks</small>
                            </div>
                            <div class="right-sidebar-panel-content animated fadeInRight">
                                
                                <ul class="right-sidebar-list">
                                    <li>
                                        <div class="pull-left thumbnail-hover">
                                            <div class="overflow-hidden">
                                                <img src="<?php echo base_url("assets/images/profile.jpg"); ?>" width="80" alt="image"/>
                                            </div>
                                        </div>
                                        <div>
                                            <h5><a href="#">John Doe - Creating Tasks</a></h5>
                                            <p>To update the sidebar...</p>
                                        </div>
                                    </li>                                    
                                </ul>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="settings" aria-labelledBy="settings-tab">
                            <div class="right-sidebar-panel-content-heading">
                                <h4><span class="icon-list"></span> System Settins</h4>
                                <small>80% Completed Settings</small>
                            </div>
                            <div class="right-sidebar-panel-content animated fadeInRight">
                                <ul class="right-sidebar-list">
                                    <li>
                                        <label class="switch-input success">
                                            <input type="checkbox" name="switch-checkbox" checked="">
                                            <i data-on="YES" data-off="NO"></i> Email Notifications
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- /example -->
                <div class="btn-bottom-right-sidebar-close">
                    <span class="fa fa-times"></span>
                </div>
                    
            </div>
        </aside>    
        <!--===== Right sidebar nofications end ========-->

    </section><!--/.container-->

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
    <script src="<?php echo base_url("assets/js/global-plugins.js"); ?>"></script>


    <!--##################################################################################
    #
    # DASHBOARD AND WIDGET PAGE PLUGINS
    #
    ##################################################################################-->
    <!-- Chart JS -->
    <script src="<?php echo base_url("assets/vendors/chartjs/chart.min.js"); ?>"></script>
    <!--jQuery Flot Chart-->
    <script src="<?php echo base_url("assets/vendors/flot/jquery.flot.full.min.js"); ?>" type="text/javascript"></script>
    <!--jQuery Ricksaw Chart-->
    <script src="<?php echo base_url("assets/vendors/jquery-ricksaw-chart/js/rickshaw.min.js"); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url("assets/vendors/jquery-ricksaw-chart/js/d3.v2.js"); ?>" type="text/javascript" ></script>
    <!-- Easy Pie JS -->
    <script src="<?php echo base_url("assets/vendors/easypie/jquery.easypiechart.min.js"); ?>"></script>
    <!--Sparkline JS-->
    <script src="<?php echo base_url("assets/vendors/sparkline/index.js"); ?>"></script>
    <!--Morris Chart-->
    <script src="<?php echo base_url("assets/vendors/morris-chart/morris.min.js"); ?>"></script>
    <!--Skycons JS-->
    <script src="<?php echo base_url("assets/vendors/skycons/skycons.js"); ?>"></script>
    <!-- World Map JS -->
    <script src="<?php echo base_url("assets/vendors/maps/js/jquery-jvectormap-2.0.1.min.js"); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url("assets/vendors/maps/js/gdp-data.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/vendors/maps/js/jquery-jvectormap-world-mill-en.js"); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url("assets/vendors/maps/js/jquery-jvectormap-us-aea-en.js"); ?>" type="text/javascript" ></script>



    <!--##################################################################################
    #
    # COMMON SCRIPT FOR THIS PAGE
    #
    ##################################################################################-->
    <!--common script init for all pages-->
    <script src="<?php echo base_url("assets/js/theme.js"); ?>" type="text/javascript" ></script>

    <!-- For the page has tooltipslter only -->
    <script src="<?php echo base_url("assets/js/tooltipster.js") ?>" type="text/javascript" ></script>    


    <!--sweet alerts-->
    <script src="<?php echo base_url("assets/js/sweetalert.js"); ?>"></script>


    <!-- ===== Scripts de los modulos ====== -->
    <script src="<?php echo base_url("assets/js/modulos/helpersJs.js") ?>"></script>

    <!-- cargamos los scripts solicitados -->
    <?php 
        if (isset($archivosjs)):
            foreach ($archivosjs as $key => $archivo):
     ?>
        <script src="<?php echo base_url("assets/js/modulos/".$archivo.".js") ?>"></script>   
    <?php 
            endforeach;
        endif;
     ?>


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
            App.initEmail();
            App.initSummernote();
            App.initAccordion();
            App.initModal();
            App.initPopover();
            App.initOwlCarousel();
            App.initSkyCons();
            App.initWidgets();



        });
    </script>


</body>

</html>

<!--===== Footer End ========-->