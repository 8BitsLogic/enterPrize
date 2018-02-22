<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- set the encoding of your site -->
        <meta charset="utf-8">
        <!-- set the viewport width and initial-scale on mobile devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Page Title -->
        <title>BYOB LTD</title>
        <!-- include the site stylesheet -->
        <link href="<?php echo $this->themeUrl; ?>front/css/fonts/OpenSans.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrl; ?>front/css/fonts/Montserrat.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrl; ?>front/css/fonts/font-awesome.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrl; ?>front/css/fonts/font-awesome.min.css" rel="stylesheet">
        <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7cRaleway:400,600,700" rel="stylesheet">-->
        <!--<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">-->
        <!--<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">-->
        <link type="text/css" media="all" href="<?php echo $this->themeUrl; ?>front/css/login.css" rel="stylesheet" />
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href="<?php echo $this->themeUrl; ?>front/css/bootstrap.css">
        <!-- include the site stylesheet -->
        <link rel="stylesheet" href="<?php echo $this->themeUrl; ?>front/css/style.css">

        <!--<link rel="stylesheet" href="<?php echo $this->themeUrl; ?>/css/responsive.css">-->
         <!--include the site stylesheet--> 
        <!--<link rel="stylesheet" href="<?php echo $this->themeUrl; ?>/css/color.css">-->
        <style class="color_css">
            /* don't delete this blank tag*/
        </style>

    </head>

    <body class="page-template-page-no-header-footer-php run layout--fullwidth">

        <?php
        echo $content
        ?>
    </body>

</html>
