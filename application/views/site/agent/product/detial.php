<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php echo $this->session->flashdata($flashKey); ?>
            <div class="col-md-12 col-sm-12">
                <div class="product">
                    <h3 class="text-primary text-uppercase"><?php echo $productDetail['product_title']; ?></h3>
                    <hr>
                    <div class="product-left col-md-5">
                        <?php
                        if ($productGallery) {
                            foreach ($productGallery as $photo) {
                                ?>
                                <div class="col-md-6">
                                    <img src="<?php echo $this->themeUrl . '/images/products/' . $productDetail['pk_product_id'] . '/' . $photo; ?>" alt="..." class="img-responsive center-block">
                                </div>
                                <?php
                            }
                        }
                        ?>

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