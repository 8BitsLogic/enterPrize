<!DOCTYPE html>
<html lang="en">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $page['title']; ?></title>


        <!--         Bootstrap 
                <link href="<?php echo $this->themeUrl; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
                 Font Awesome 
                <link href="<?php echo $this->themeUrl; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                 NProgress 
                <link href="<?php echo $this->themeUrl; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
                 iCheck 
                <link href="<?php echo $this->themeUrl; ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
                 bootstrap-progressbar 
                <link href="<?php echo $this->themeUrl; ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
                 JQVMap 
                <link href="<?php echo $this->themeUrl; ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
                 bootstrap-daterangepicker 
                <link href="<?php echo $this->themeUrl; ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

        <!-- Custom Theme Style -->
        <link href="<?php echo $this->themeUrlSite; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/css/color.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/css/responsive.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/css/style.css" rel="stylesheet">

        <link href="<?php echo $this->themeUrlSite; ?>/fonts/OpenSans.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/fonts/Montserrat.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/fonts/font-awesome.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/fonts/font-awesome.min.css" rel="stylesheet">

    </head>

    <body>
        <div id="wrapper">
            <div class="loader-container" id="loader">
                <div class="holder">
                    <div class="spinner">
                        <div class="double-bounce1 main-bg-color"></div>
                        <div class="double-bounce2 main-bg-color"></div>
                    </div>
                </div>
            </div>
            <?php
            echo $header;
            ?>
            <!-- main content wrapping section start here -->
            <main id="main">
                <?php
                echo $content
                ?>
            </main>
            <!-- main content wrapping section end here -->
            <?php
            echo $footer;
            ?>
            <!-- Back Top of the page -->
            <span id="back-top" class="fa fa-angle-up main-bg-color"></span>
        </div>
        <script src="<?php echo $this->themeUrlSite; ?>/js/jquery.js"></script>
        <script src="<?php echo $this->themeUrlSite; ?>/js/plugins.js" defer></script>
        <script src="<?php echo $this->themeUrlSite; ?>/js/jquery.main.js" defer></script>

        <!--
                 jQuery 
                <script src="<?php echo $this->themeSite; ?>/vendors/jquery/dist/jquery.min.js"></script>
                 Bootstrap 
                <script src="<?php echo $this->themeSite; ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                 FastClick 
                <script src="<?php echo $this->themeSite; ?>/vendors/fastclick/lib/fastclick.js"></script>
                 NProgress 
                <script src="<?php echo $this->themeSite; ?>/vendors/nprogress/nprogress.js"></script>
                 Chart.js 
                <script src="<?php echo $this->themeSite; ?>/vendors/Chart.js/dist/Chart.min.js"></script>
                 gauge.js 
                <script src="<?php echo $this->themeSite; ?>/vendors/gauge.js/dist/gauge.min.js"></script>
                 bootstrap-progressbar 
                <script src="<?php echo $this->themeSite; ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
                 iCheck 
                <script src="<?php echo $this->themeSite; ?>/vendors/iCheck/icheck.min.js"></script>
                 Skycons 
                <script src="<?php echo $this->themeSite; ?>/vendors/skycons/skycons.js"></script>
                 Flot 
                <script src="<?php echo $this->themeSite; ?>/vendors/Flot/jquery.flot.js"></script>
                <script src="<?php echo $this->themeSite; ?>/vendors/Flot/jquery.flot.pie.js"></script>
                <script src="<?php echo $this->themeSite; ?>/vendors/Flot/jquery.flot.time.js"></script>
                <script src="<?php echo $this->themeSite; ?>/vendors/Flot/jquery.flot.stack.js"></script>
                <script src="<?php echo $this->themeSite; ?>/vendors/Flot/jquery.flot.resize.js"></script>
                 Flot plugins 
                <script src="<?php echo $this->themeSite; ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
                <script src="<?php echo $this->themeSite; ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
                <script src="<?php echo $this->themeSite; ?>/vendors/flot.curvedlines/curvedLines.js"></script>
                 DateJS 
                <script src="<?php echo $this->themeSite; ?>/vendors/DateJS/build/date.js"></script>
                 JQVMap 
                <script src="<?php echo $this->themeSite; ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
                <script src="<?php echo $this->themeSite; ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
                <script src="<?php echo $this->themeSite; ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
                 bootstrap-daterangepicker 
                <script src="<?php echo $this->themeSite; ?>/vendors/moment/min/moment.min.js"></script>
                <script src="<?php echo $this->themeSite; ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        
                 TinyMCE Editor
                <script type="text/javascript" src="<?php echo $this->themeSite; ?>/../tinymce/tinymce.min.js"></script>
                <script type="text/javascript" src="<?php echo $this->themeSite; ?>/../tinymce/jquery.tinymce.min.js"></script>
        
        
                 Custom Theme Scripts 
                <script src="<?php echo $this->themeSite; ?>/js/custom.min.js"></script>-->

    </body>

</html>
