<?php
$this->load->view($view . 'partials/slider.php', array('slides' => $slides));
?>


<!--Default Section-->
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!--Column-->
            <div class="column icon-column center-icon-column col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box text-center">
                    <div class="icon img-circle bg_purple wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms"><span class="flaticon-lightbulb23"></span></div>
                    <a href="<?php echo base_url('revenue') ?>"><h3 class="montserrat-font text-uppercase">Revenue</h3></a>
                    <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</div>
                </div>
            </div>

            <!--Column-->
            <div class="column icon-column center-icon-column col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box text-center">
                    <div class="icon img-circle bg_orange wow zoomIn" data-wow-delay="600ms" data-wow-duration="1500ms"><span class="flaticon-flying16"></span></div>
                    <a href="<?php echo base_url('opportunity') ?>"><h3 class="montserrat-font text-uppercase">Opportunity</h3></a>
                    <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</div>
                </div>
            </div>

            <!--Column-->
            <div class="column icon-column center-icon-column col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box text-center">
                    <div class="icon img-circle bg_red wow zoomIn" data-wow-delay="900ms" data-wow-duration="1500ms"><span class="flaticon-network3"></span></div>
                    <a href="<?php echo base_url('test') ?>"><h3 class="montserrat-font text-uppercase">Performance</h3></a>
                    <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</div>
                </div>
            </div>

        </div>
        <div class="row clearfix">

            <!--Column-->
            <div class="column icon-column center-icon-column col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box text-center">
                    <div class="icon img-circle bg_purple wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms"><span class="flaticon-lightbulb23"></span></div>
                    <a href="<?php echo base_url('dashboard/ewallet') ?>"><h3 class="montserrat-font text-uppercase">E-Wallet</h3></a>
                    <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</div>
                </div>
            </div>

            <!--Column-->
            <div class="column icon-column center-icon-column col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box text-center">
                    <div class="icon img-circle bg_orange wow zoomIn" data-wow-delay="600ms" data-wow-duration="1500ms"><span class="flaticon-flying16"></span></div>
                    <a><h3 class="montserrat-font text-uppercase">Promote</h3></a>
                    <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</div>
                </div>
            </div>

            <!--Column-->
            <div class="column icon-column center-icon-column col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box text-center">
                    <div class="icon img-circle bg_red wow zoomIn" data-wow-delay="900ms" data-wow-duration="1500ms"><span class="flaticon-network3"></span></div>
                    <a href="<?php echo base_url('dashboard/ewallet') ?>"><h3 class="montserrat-font text-uppercase">Expenses</h3></a>
                    <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
$this->load->view($view.'partials/testimonials', array('postList', $postList));
?>