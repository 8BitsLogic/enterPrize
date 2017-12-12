<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php echo $this->session->flashdata($flashKey); ?>
            <div class="col-md-12 col-sm-12">
                <div class="product">
                    <h3 class="text-primary text-uppercase">
                        <?php echo $productDetail['product_title']; ?>
                        <?php echo $productDetail['prd_unlock'] ? '' : '<i class="fa fa-lock"></i>'; ?>
                    </h3>
                    <hr>
                    <div class="product-left col-md-5">
                        <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                            <?php
                            if ($productGallery) {
                                ?>
                                <div class='carousel-outer'>
                                    <!-- me art lab slider -->
                                    <div class='carousel-inner '>
                                        <?php
                                        $active = 'active';
                                        foreach ($productGallery as $photo) {
                                            ?>
                                            <div class="item <?php echo $active; ?>">
                                                <img src="<?php echo $this->themeUrl . '/images/products/' . $productDetail['pk_product_id'] . '/' . $photo; ?>" alt="..." class="img-responsive center-block">
                                            </div>
                                            <?php
                                            $active = '';
                                        }
                                        ?>
                                    </div>
                                </div>

                                <!-- thumb -->
                                <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                    <?php
                                    $slideNumber = 0;
                                    foreach ($productGallery as $photo) {
                                        ?>
                                        <li data-target = '#carousel-custom' data-slide-to = '<?php echo $slideNumber++; ?>' class = 'active'><img src = '<?php echo $this->themeUrl . '/images/products/' . $productDetail['pk_product_id'] . '/' . $photo; ?>' alt = '' /></li>
                                        <?php
                                    }
                                    ?>

                                </ol>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                    <div class="product-body text-justify col-md-7">
                        <h4 class="badge">REWARD: AED <?php echo $productDetail['product_agent_reward']; ?>
                            <?php
                            if (is_array($leadForm) && $productDetail['prd_unlock']) {
                                ?>
                                <a href="<?php echo base_url('product/' . $productDetail['pk_product_id'] . '/lead'); ?>" class="btn btn-primary pull-right">LEAD</a>
                                <?php
                            }
                            ?>
                        </h4>
                        <p class="pull-left"><?php echo $productDetail['product_descp']; ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>                                    
            </div>
        </div>
    </div>
</section>
<?php $this->load->view($view . 'partials/product_detail_resources'); ?>