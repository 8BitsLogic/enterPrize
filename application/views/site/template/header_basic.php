<header id="header" class="nospace">
    <div class="holder">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <!-- mobile logo -->
                    <div class="logo main-bg-color text-uppercase pull-left visible-xs"><a href="<?php echo base_url(); ?>"><img src="images/logo.png" alt="img" class="img-responsive"></a></div>
                    <a href="<?php echo base_url(); ?>" class="nav-opener pull-right visible-xs"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    <!-- page navigation start here -->
                    <nav id="nav">
<!--                        <ul class="nav-list list-inline text-center">
                            <li><a href="<?php echo base_url('training') ?>" class="smooth">Training</a></li>
                            <li><a href="<?php echo base_url('product') ?>" class="smooth">Product</a></li>
                            <li><a href="#" class="smooth">Community</a></li>
                            <li><a href="<?php echo base_url('test') ?>" class="smooth">tests</a></li>
                        </ul>-->
<!--                        <ul class="nav-list list-inline text-center">
                            <li><a href="#" class="smooth">messages</a></li>
                            <li><a href="<?php echo base_url('dashboard/ewallet') ?>" class="smooth">e-Wallet</a></li>
                            <li><a href="<?php echo base_url('dashboard/profile') ?>" class="smooth">profile</a></li>
                            <li><a href="<?php echo base_url('dashboard/profile') ?>" class="smooth"><img src="<?php echo $agentPic ? $agentPic : $this->themeUrl.'/images/img04.jpg'; ?>" alt="img" class="img-responsive main-border-color img" style="display:inline">&nbsp;
                                    <span style="display:inline;color:#ef4136"><?php echo number_format($availableFunds, 2, '.', ','); ?></span></a></li>
                        </ul>-->
                        <!-- desktop logo -->
                        <div class="logo hidden-xs" style="width: 0%;"><a href="<?php echo base_url(); ?>"><img src="<?php echo $this->themeUrl; ?>/images/logo.png" alt="img" class="img-responsive"></a></div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>