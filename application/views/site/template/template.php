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

        <!-- Custom Theme Style -->
        <link href="<?php echo $this->themeUrlSite; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/css/color.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/css/responsive.css" rel="stylesheet">
        <link href="<?php echo $this->themeUrlSite; ?>/css/style.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="<?php echo $this->themeUrlSite; ?>/css/slick.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->themeUrlSite; ?>/css/slick-theme.css" />

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

        <script type="text/javascript" src="<?php echo $this->themeUrlSite; ?>/js/slick.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#slider .als-wrapper').slick(
                        {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            autoplay: false,
                            autoplaySpeed: 4000,
                            draggable: false,
                            vertical: false,
                            dots: true,
                            arrows: false,
                            responsive: [
                                {
                                    breakpoint: 1024,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                },
                                {
                                    breakpoint: 600,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                }
                            ]
                        });
                $('#main .als-wrapper').slick(
                        {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            autoplay: false,
                            autoplaySpeed: 4000,
                            draggable: false,
                            vertical: false,
                            dots: true,
                            arrows: false,
                            responsive: [
                                {
                                    breakpoint: 1024,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                },
                                {
                                    breakpoint: 600,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1
                                    }
                                }
                            ]
                        });
            });
        </script>

    </body>

</html>
