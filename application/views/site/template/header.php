<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>" style="color: red">BYOB<small style="color: #cccccc">LTD</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="<?php echo base_url('logout')?>" class="btn btn-default pull-right"> Signout </a>
        <a href="<?php echo base_url('dashboard')?>" class="btn btn-default pull-right"> Dashboard </a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="btn btn-info">
                    <a class="nav-link" href="<?php echo base_url(); ?>">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="btn btn-info">
                    <a class="nav-link" href="<?php echo base_url('info/disclaimer-of-warranties')?>">Disclaimer of Warranties</a>
                </li>
                <li class="btn btn-info">
                    <a class="nav-link" href="<?php echo base_url('info/terms-of-service')?>">Terms of Service </a>
                </li>
                <li class="btn btn-info">
                    <a class="nav-link" href="<?php echo base_url('info/privacy-policy')?>">Privacy Policy</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header>
    
</header>