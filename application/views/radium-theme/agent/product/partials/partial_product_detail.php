<!--Column-->
<div class="column text-column col-md-5 col-sm-12 col-xs-12">
    <div class="inner-box">

        <br>
        <div class="sec-title">
            <h2 class="default-title text-uppercase"><?php echo ($productDetail['prd_unlock'] ? '' : '<i class="fa fa-lock"></i> ') . $productDetail['product_title']; ?></h2>
        </div>
        <br>

        <!-- Accordion Box -->
        <div class="accordion-box style-one">

            <!-- Accordion -->
            <article class="accordion">
                <div class="acc-btn"><div class="toggle-icon"><span class="flaticon-levels1"></span></div> REWARD: AED <?php echo $productDetail['product_agent_reward']; ?></div>
            </article>

            <!-- Accordion -->
            <article class="accordion">
                <div class="acc-btn active"><div class="toggle-icon"><span class="flaticon-location74"></span></div> Description</div>
                <div class="acc-content text-justify" style="display: block;">
                    <?php echo $productDetail['product_descp']; ?>
                </div>
            </article>
        </div>

        <br>
        <?php
        if (is_array($leadForm) && $productDetail['prd_unlock']) {
            ?>
            <a class="theme-btn radial-btn bg_green" href="<?php echo base_url('product/' . $productDetail['pk_product_id'] . '/lead'); ?>"><span class="txt">Get Started Now</span> <span class="img-circle fa fa-arrow-right"></span></a>
                <?php
            }
            ?>


    </div>
</div>