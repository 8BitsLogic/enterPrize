<?php $this->load->view($view . '../partials/page_title'); ?>

<!--Featured Three Column-->
<section class="default-section featured-three-col">
    <div class="auto-container">

        <!--Section Title-->
        <div class="sec-title main-title text-center">
            <h2 class="default-title text-uppercase"><?php echo $page['sub-title']; ?></h2>
            <!--<div class="theme-subtitle">Lorem ipsum dolor sit amet, consetetur sadipscing elitr</div>-->
        </div>
        <?php
        if (!$productList) {
            ?>
            <h4 class="col-md-12 alert alert-warning">No data found</h4>
            <?php
        } else {
            $this->load->view($view . 'partials/product_grid');
        }
        ?>
    </div>
</section>