<div class="row">
    <?php
    echo $this->session->flashdata($flashKey);
    ?>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h3><?php echo $page['title']; ?></h3>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-7">
                        Load picture gallery here
                    </div>
                    <div class="col-md-5">
                        <h3><?php echo $productDetail['product_title']; ?></h3>
                        <div class="product_price">
                          <h1 class="price">Reward Points: <?php echo $productDetail['product_agent_reward']; ?></h1>
                          <br>
                        </div>
                        
                        <p>
                            <?php echo $productDetail['product_descp']; ?>
                        </p>
                        <?php
                        if (is_array($leadForm) && $productDetail['prd_unlock']) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel text-center">
                                    <h3><a href="<?php echo base_url('product/' . $productDetail['pk_product_id'] . '/lead'); ?>">Generate a Lead </a></h3>
                                </div>

                            </div>
                        </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view($view . 'partials/product_detail_resources');
?>