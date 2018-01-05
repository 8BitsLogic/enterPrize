<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin enterPrize</title>

        <!-- Bootstrap -->
        <link href="<?php echo $this->themeUrl; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo $this->themeUrl; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo $this->themeUrl; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo $this->themeUrl; ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="<?php echo $this->themeUrl; ?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?php echo $this->themeUrl; ?>/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="<?php echo $this->themeUrl; ?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?php echo $this->themeUrl; ?>/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                <?php
                echo $sidebar;
                echo $header;
                ?>
                <!-- page content -->
                <div class="right_col" role="main">
                    <?php
                    echo $content;
                    ?>
                </div>
                <!-- /page content -->

                <?php
                echo $footer;
                ?>

            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/Flot/jquery.flot.js"></script>
        <script src="<?php echo $this->themeUrl; ?>/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="<?php echo $this->themeUrl; ?>/vendors/Flot/jquery.flot.time.js"></script>
        <script src="<?php echo $this->themeUrl; ?>/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="<?php echo $this->themeUrl; ?>/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="<?php echo $this->themeUrl; ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="<?php echo $this->themeUrl; ?>/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="<?php echo $this->themeUrl; ?>/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="<?php echo $this->themeUrl; ?>/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="<?php echo $this->themeUrl; ?>/vendors/moment/min/moment.min.js"></script>
        <script src="<?php echo $this->themeUrl; ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- TinyMCE Editor-->
        <script type="text/javascript" src="<?php echo $this->themeUrl; ?>/../tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->themeUrl; ?>/../tinymce/jquery.tinymce.min.js"></script>


        <!-- Custom Theme Scripts -->
        <script src="<?php echo $this->themeUrl; ?>/js/custom.min.js"></script>

        <!-- Flot -->
        <script>
            $(document).ready(function () {
                var data1 = [
                    [gd(2017, 1, 1), 50],
                    [gd(2017, 2, 1), 174],
                    [gd(2017, 3, 1), 60],
                    [gd(2017, 4, 1), 239],
                    [gd(2017, 5, 1), 120],
                    [gd(2017, 6, 1), 85],
                    [gd(2017, 7, 1), 70],
                    [gd(2017, 8, 1), 0],
                    [gd(2017, 9, 1), 0],
                    [gd(2017, 10, 1), 0],
                    [gd(2017, 11, 1), 0],
                    [gd(2017, 12, 1), 0]
                ];

                var data2 = [
                    [gd(2017, 1, 1), 17],
                    [gd(2017, 2, 1), 74],
                    [gd(2017, 3, 1), 6],
                    [gd(2017, 4, 1), 39],
                    [gd(2017, 5, 1), 20],
                    [gd(2017, 6, 1), 85],
                    [gd(2017, 7, 1), 7],
                    [gd(2017, 8, 1), 0],
                    [gd(2017, 9, 1), 0],
                    [gd(2017, 10, 1), 0],
                    [gd(2017, 11, 1), 0],
                    [gd(2017, 12, 1), 0]
                ];

                $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
                    data1, data2
                ], {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 2,
                            show: true
                        },
                        shadowSize: 3
                    },
                    grid: {
                        verticalLines: true,
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: '#fff'
                    },
                    colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
                    xaxis: {
                        tickColor: "rgba(51, 51, 51, 0.06)",
                        mode: "time",
                        tickSize: [1, "month"],
                        //tickLength: 10,
                        axisLabel: "Date",
                        axisLabelUseCanvas: true,
                        axisLabelFontSizePixels: 12,
                        axisLabelFontFamily: 'Verdana, Arial',
                        axisLabelPadding: 10
                    },
                    yaxis: {
                        ticks: 8,
                        tickColor: "rgba(51, 51, 51, 0.06)",
                    },
                    tooltip: false
                });

                function gd(year, month, day) {
                    return new Date(year, month - 1, day).getTime();
                }
            });
        </script>
        <!-- /Flot -->

        <!-- Doughnut Chart -->
<!--        <script>
            $(document).ready(function () {
                var options = {
                    legend: false,
                    responsive: false
                };

                new Chart(document.getElementById("canvas1"), {
                    type: 'doughnut',
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                    data: {
                        labels: [
                            "prd1",
                            "prd2",
                            "prd3",
                            "prd4",
                            "prd5"
                        ],
                        datasets: [{
                                data: [15, 20, 30, 10, 30],
                                backgroundColor: [
                                    "#BDC3C7",
                                    "#9B59B6",
                                    "#E74C3C",
                                    "#26B99A",
                                    "#3498DB"
                                ],
                                hoverBackgroundColor: [
                                    "#CFD4D8",
                                    "#B370CF",
                                    "#E95E4F",
                                    "#36CAAB",
                                    "#49A9EA"
                                ]
                            }]
                    },
                    options: options
                });
            });
        </script>-->
        <!-- /Doughnut Chart -->

        <script>
            $(document).ready(function () {
                var options = {
                    legend: false,
                    responsive: false
                };

                new Chart(document.getElementById("productPieChart"), {
                    type: 'doughnut',
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                    data: {
                        labels: <?php echo $productLeads['pie_chart_values']['labels']; ?>,
                        datasets: [{
                                data: <?php echo $productLeads['pie_chart_values']['percent']; ?>,
                                backgroundColor: <?php echo $productLeads['pie_chart_values']['colorCodes1']; ?>,
                                hoverBackgroundColor: <?php echo $productLeads['pie_chart_values']['colorCodes1']; ?>,
                            }]
                    },
                    options: options
                });
            });
        </script>



    </body>
</html>
