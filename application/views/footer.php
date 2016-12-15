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
    <!-- <script src="assets/js/jquery.js"></script> -->
    <!-- <script src="assets/js/jquery-migrate-1.2.1.min.js"></script> -->
    <!-- <script src="assets/vendors/jquery.cookie/jquery.cookie.js"></script> -->
    <!-- <script src="assets/vendors/jquery-ui/jquery-ui.min.js"></script> -->
    <!-- <script src="assets/vendors/jquery-easing/jquery.easing.1.3.js"></script> -->
    <!-- <script src="assets/vendors/bootstrap/js/bootstrap.js"></script> -->
    <!-- <script src="assets/vendors/jquery/dcjqaccordion.2.7.js"></script> -->
    <!-- <script src="assets/vendors/jquery/scrollTo.min.js"></script> -->
    <!-- <script src="assets/vendors/jquery/slimscroll.js"></script> -->
    <!-- <script src="assets/vendors/jquery/nicescroll.js"></script> -->
    <!-- <script src="assets/vendors/progressbar/bootstrap-progressbar.min.js"></script> -->
    <!-- <script src="assets/vendors/counter/waypoints.min.js" type="text/javascript" ></script> -->
    <!-- <script src="assets/vendors/counter/jquery.counterup.min.js" type="text/javascript" ></script> -->
    <!-- <script src="assets/vendors/jquery-icheck/icheck.min.js"></script> -->
    <!-- <script src="assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->
    <!-- <script src="assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script> -->
    <!-- <script src="assets/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> -->
    <!-- <script src="assets/vendors/bootstrap-tagsinput/bootstrap-tagsinput.js"></script> -->
    <!-- <script src="assets/vendors/summernote/summernote.min.js"></script> -->
    <!-- <script src="assets/vendors/jquery.autosize/jquery.autosize.js"></script> -->
    <!-- <script src="assets/vendors/jquery.multi-select/js/jquery.multi-select.js"></script> -->
    <!-- <script src="assets/vendors/jquery.multi-select/js/jquery.quicksearch.js"></script> -->
    <!-- <script src="assets/vendors/typeahead/js/typeahead.bundle.js"></script> -->
    <!-- <script src="assets/vendors/typeahead/js/handlebars.min.js"></script> -->
    <!-- <script src="assets/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script> -->
    <!-- <script src="assets/vendors/select2/select2.min.js"></script> -->
    <!-- <script src="assets/vendors/bootstrap-star-rating/js/star-rating.min.js"></script> -->
    <!-- <script src="assets/vendors/bootstrap-fileupload/js/bootstrap-fileupload.js"></script> -->
    <!-- <script src="assets/vendors/bootstrap-inputmask/bootstrap-inputmask.min.js"></script> -->
    <!-- <script src="assets/vendors/jquery.validate/jquery.validate.min.js"></script> -->
    <!-- <script src="assets/vendors/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script> -->
    <!-- <script src="assets/vendors/dropzone/dropzone.min.js"></script> -->
    <!-- <script src="assets/vendors/plupload/js/plupload.full.min.js"></script> -->
    <!-- <script src="assets/vendors/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js"></script> -->
    <!-- <script src="assets/vendors/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script> -->
    <!-- <script src="assets/vendors/x-editable/inputs-ext/address/address.js"></script> -->
    <!-- <script src="assets/vendors/x-editable/inputs-ext/typeaheadjs/typeaheadjs.js"></script> -->
    <!-- <script src="assets/vendors/owl-carousel/owl.carousel.js"></script> -->
    <!-- <script src="assets/vendors/magnific-popup/js/jquery.magnific-popup.js"></script> -->
    <!-- <script src="assets/vendors/masonry/masonry.pkgd.min.js"></script> -->
    <!-- <script src="assets/vendors/moment.min.js"></script> -->
    <!-- <script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script> -->
    <!-- <script src="assets/vendors/raphael-min.js" charset="utf-8" ></script> -->
    <!-- <script src="assets/vendors/sweetalert/sweetalert.min.js"></script> -->
    <!-- <script src="assets/vendors/word-rotator/jquery.wordrotator.min.js"></script> -->
    <!-- <script src="assets/vendors/wow-animations/js/wow.min.js"></script> -->
    <!-- <script src="assets/vendors/rwd-table/js/rwd-table.min.js?v=5.0.3"></script> -->
    <!-- <script src="assets/vendors/jqueryui.sortable.animation/jquery.ui.sortable-animation.js"></script> -->
    <!-- <script src="assets/vendors/tooltipster/js/jquery.tooltipster.js" type="text/javascript" ></script> -->
    <!-- <script src="assets/vendors/dropdowns-enhancement/js/dropdowns-enhancement.min.js" type="text/javascript"></script> -->
    <!-- <script src="assets/vendors/jquery-notific8/jquery.notific8.js" type="text/javascript"></script> -->
    <!-- <script src="assets/vendors/date.js"></script> -->
    <!-- <script src="assets/vendors/pogo-slider/js/jquery.pogo-slider.min.js" type="text/javascript" ></script> -->
    <!-- <script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript" ></script> -->
    <!-- <script src="vendors/nestable/jquery.nestable.js" type="text/javascript" ></script> -->
    <!-- <script src="assets/vendors/bstooltip/bstooltip.js"></script> -->

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
    <script src="<?php echo base_url("assets/vendors/video-js/video.js"); ?>"></script>
    <script>
        videojs.options.flash.swf = "<?php echo base_url("assets/vendors/video-js/video-js.swf"); ?>";
    </script>


    <!--##################################################################################
    #
    # COMMON SCRIPT FOR THIS PAGE
    #
    ##################################################################################-->
    <!--common script init for all pages-->
    <script src="<?php echo base_url("assets/js/theme.js"); ?>" type="text/javascript" ></script>

    <!-- For the page has tooltipslter only -->
    <script src="<?php echo base_url("assets/js/tooltipster.js") ?>" type="text/javascript" ></script>    


    <!-- For this page only --><!-- esto es para cargar tablas -->
    <script src="<?php echo base_url("assets/js/table_editable.js"); ?>"></script>


    <!--sweet alerts-->
    <script src="<?php echo base_url("assets/js/sweetalert.js"); ?>"></script>


    <!-- ===== Scripts de los modulos ====== -->
    <script src="<?php echo base_url("assets/js/modulos/helpersJs.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/modulos/clientesJs.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/modulos/usuariosJs.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/modulos/perfilesJs.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/modulos/ventasJs.js") ?>"></script>





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

            DashboardGreen.initRickShawGraph();
            DashboardGreen.initFlotGraph();
            DashboardGreen.initChartGraph();
            DashboardGreen.initSparklineGraph();
            DashboardGreen.initDateRange();
            DashboardGreen.initWorldMap();
            DashboardGreen.initEasyPieChart();
            DashboardGreen.initMorrisChart();
            DashboardGreen.initTodoList();

        });
    </script>


</body>

</html>

<!--===== Footer End ========-->