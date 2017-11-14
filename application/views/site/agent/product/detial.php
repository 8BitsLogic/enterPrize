<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php echo $this->session->flashdata($flashKey); ?>
            <div class="col-sm-12 col-md-12">
                <div class="bs-example" data-example-id="default-media">
                    <div class="col-sm-12 col-md-12">
                        <div class="product">
                            <?php
                            if ($productGallery) {
                                foreach ($productGallery as $photo) {
                                    ?>
                                    <div class="product-left">
                                        <img src="<?php echo $this->themeUrl . '/images/products/' . $productDetail['pk_product_id'] . '/' . $photo; ?>" alt="..." class="img-responsive center-block" style="width: 200px; height: 200px;">
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="product-body">
                                <h3 class="text-default text-uppercase"><b><?php echo $productDetail['product_title']; ?></b></h3>
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
                    <?php
                    $this->load->view($view . 'partials/product_detail_resources');
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>