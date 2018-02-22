<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <title><?php echo $page['title']; ?></title>
        <!-- Stylesheets -->
        <link href="<?php echo $this->themeUrlSite; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/css/revolution-slider.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/css/style.css" rel="stylesheet">
        <!-- Responsive -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link href="<?php echo $this->themeUrlSite; ?>/css/responsive.css" rel="stylesheet">

        <link href="<?php echo $this->themeUrl; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    </head>

    <body>
        <div class="page-wrapper">
            <!-- Preloader -->
            <div class="preloader"></div>

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
            <!--<span id="back-top" class="fa fa-angle-up main-bg-color"></span>-->
        </div>

        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-arrow-up"></span></div>

        <script src="<?php echo $this->themeUrlSite; ?>/js/jquery.js"></script> 
        <script src="<?php echo $this->themeUrlSite; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo $this->themeUrlSite; ?>/js/revolution.min.js"></script>
        <script src="<?php echo $this->themeUrlSite; ?>/js/bxslider.js"></script>
        <script src="<?php echo $this->themeUrlSite; ?>/js/owl.js"></script>
        <script src="<?php echo $this->themeUrlSite; ?>/js/jquery.fancybox.pack.js"></script>
        <script src="<?php echo $this->themeUrlSite; ?>/js/jquery.fancybox-media.js"></script>
        <script src="<?php echo $this->themeUrlSite; ?>/js/wow.js"></script>
        <script src="<?php echo $this->themeUrlSite; ?>/js/script.js"></script>
    </body>

</html>