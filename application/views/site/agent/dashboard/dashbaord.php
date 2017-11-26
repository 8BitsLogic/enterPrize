<!--<div class="x_panel">
    <div class="x_title">
        <h2><?php echo $page['title']; ?></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">

        <a href="<?php echo base_url('dashboard/profile') ?>" class="btn btn-primary"> Profile </a>
        <a href="" class="btn btn-primary"> Expenses </a>
        <a href="<?php echo base_url('dashboard/ewallet') ?>" class="btn btn-primary"> E-wallet</a>
        <a href="<?php echo base_url('product') ?>" class="btn btn-primary"> Products </a>
        <a href="<?php echo base_url('training') ?>" class="btn btn-primary"> Training </a>
        <a href="<?php echo base_url('test') ?>" class="btn btn-primary"> Tests </a>

    </div>
</div>-->

<ul class="als-wrapper">
    <?php
    foreach ($slides as $slide) {
        ?>
        <li>
            <div class="main-banner bg-img-full section text-center" style="background-image: url(<?php echo $slide['slide_link']; ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="heading text-uppercase">Introducing<br /> <span class="main-color">byob</span> pro.</h1>
                            <span class="divider main-bg-color"></span>
                            <p>learn, Earn , Grow</p>
                            <div id="imaginary_container">
                                <div class="input-group stylish-input-group">
                                    <!--<input type="text" class="form-control" placeholder="Search Here">-->
    <!--                                    <span class="input-group-addon">
                                        <button type="submit">
                                            <span class="fa fa-search"></span>
                                        </button>
                                    </span>-->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </li>
        <?php
    }
    ?>
</ul>
<!-- end of main-banner -->

<section class="pad-top-lg">
    <div class="container">                    
        <div class="row">
            <div class="col-xs-6 col-sm-4">
                <!-- start of steps-box -->
                <a href="<?php echo base_url('revenue') ?>">
                    <div class="steps-box text-center mar-bottom-md pad-top-xs">
                        <div class="icon-box main-color">
                            <img src="<?php echo $this->themeUrl; ?>/images/revenue.png" alt="img" class="img-responsive">
                        </div>

                        <div class="content">
                            <h3 class="heading">REVENUE</h3>
                            <span class="border main-bg-color"></span>
                            <p class="block">Unlock products and start generating revenue.</p>
                        </div>

                    </div>
                </a>
                <!-- end of steps-box -->
            </div>
            <div class="col-xs-6 col-sm-4">
                <!-- start of steps-box -->
                <a href="<?php echo base_url('opportunity') ?>">
                    <div class="steps-box text-center mar-bottom-md pad-top-xs">
                        <div class="icon-box main-color"><img src="<?php echo $this->themeUrl; ?>/images/opportunity.png" alt="img" class="img-responsive"></div>

                        <div class="content">
                            <h3 class="heading">Opportunity</h3>
                            <span class="border main-bg-color"></span>
                            <p class="block">Unlock products and start generating revenue.</p>
                        </div>

                    </div>
                </a>
                <!-- end of steps-box -->
            </div>
            <div class="col-xs-6 col-sm-4">
                <!-- start of steps-box -->
                <a href="<?php echo base_url('test') ?>">
                    <div class="steps-box text-center mar-bottom-md pad-top-xs">
                        <div class="icon-box main-color"><img src="<?php echo $this->themeUrl; ?>/images/performance.png" alt="img" class="img-responsive"></div>

                        <div class="content">
                            <h3 class="heading">performance</h3>
                            <span class="border main-bg-color"></span>
                            <p class="block">Unlock products and start generating revenue.</p>
                        </div>

                    </div>
                </a>
                <!-- end of steps-box -->
            </div>

            <div class="col-xs-6 col-sm-4">
                <!-- start of steps-box -->
                <a href="<?php echo base_url('training') ?>">
                    <div class="steps-box text-center mar-bottom-md pad-top-xs">
                        <div class="icon-box main-color"><img src="<?php echo $this->themeUrl; ?>/images/development.png" alt="img" class="img-responsive"></div>

                        <div class="content">
                            <h3 class="heading">development</h3>
                            <span class="border main-bg-color"></span>
                            <p class="block">Unlock products and start generating revenue.</p>
                        </div>

                    </div>
                </a>
                <!-- end of steps-box -->
            </div>
            <div class="col-xs-6 col-sm-4">
                <!-- start of steps-box -->
                <a href="">
                    <div class="steps-box text-center mar-bottom-md pad-top-xs">
                        <div class="icon-box main-color"><img src="<?php echo $this->themeUrl; ?>/images/permote.png" alt="img" class="img-responsive"></div>

                        <div class="content">
                            <h3 class="heading">permote</h3>
                            <span class="border main-bg-color"></span>
                            <p class="block">Unlock products and start generating revenue.</p>
                        </div>

                    </div>
                </a>
                <!-- end of steps-box -->
            </div>
            <div class="col-xs-6 col-sm-4">
                <!-- start of steps-box -->
                <a href="<?php echo base_url('dashboard/ewallet') ?>">
                    <div class="steps-box text-center mar-bottom-md pad-top-xs">
                        <div class="icon-box main-color"><img src="<?php echo $this->themeUrl; ?>/images/expense.png" alt="img" class="img-responsive"></div>

                        <div class="content">
                            <h3 class="heading">Expenses</h3>
                            <span class="border main-bg-color"></span>
                            <p class="block">Unlock products and start generating revenue.</p>
                        </div>

                    </div>
                </a>
                <!-- end of steps-box -->
            </div>

        </div>
    </div>
</section>

<!-- start of test-section -->
<?php
if ($postList) {
    ?>
    <div class="bg-img-full section test-section" data-scroll-index="3" style="background-image: url(<?php echo $this->themeUrl; ?>/images/img02.jpg);" >
        <div class="container">
            <div class="row">
                <div class="pad-top-xs"></div>
                <?php
                foreach ($postList as $keyP => $valP) {
                    ?>
                    <div class="col-xs-12 col-sm-4 pad-bottom-xs">
                        <img src="<?php echo $agentPic; ?>" alt="img" class="img-responsive center-block main-border-color img">
                        <p class="text-center"><i><?php echo substr($valP['post_title'], 0, 90)?></i></p>
                        <p style="padding: 0 25px;">
                            <span class="text-left"><?php echo date_format(date_create($valP['post_create_date']), 'M d, Y'); ?></span>
                            <a href="<?php echo base_url('community/post/'.$valP['pk_post_id']); ?>" class="pull-right"><u>Read More</u></a></p>

                    </div>
                    <?php
                }
                ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php
}
?>
<!-- end of test-section -->