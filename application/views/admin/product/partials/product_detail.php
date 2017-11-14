<div class="x_panel">
    <div class="x_content">

        <div class="row">
            <div class="col-md-7 col-sm-7 col-xs-12" style="border:0px solid #e5e5e5;">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#product_detail" id="product_detail-tab" role="tab" data-toggle="tab" aria-expanded="true">Detail</a></li>
                        <li role="presentation" class=""><a href="#product_gallery" id="product_gallery-tab" role="tab" data-toggle="tab" aria-expanded="false">Gallery</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="product_detail" aria-labelledby="product_detail-tab">
                            <h3 class="prod_title"><?php echo $productDetail['product_title']; ?></h3>
                            <p class="text-justify"><?php echo $productDetail['product_descp']; ?></p>
                            <br>

                            <div class="">
                                <div class="product_price">
                                    <h1 class="price">Agent Share: <?php echo $productDetail['product_agent_reward']; ?></h1>
                                    <span class="price-tax">Reward: <?php echo $productDetail['product_total_reward']; ?></span>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="product_gallery" aria-labelledby="product_gallery-tab">
                            <?php
                            if ($productGallery) {
                                foreach ($productGallery as $photo) {
                                    ?>
                                    <div class="col-md-55">
                                        <div class="thumbnail">
                                            <div class="image view view-first">
                                                <img style="width: 100%; display: block;" src="<?php echo $this->themeUrl . '/images/products/' . $productDetail['pk_product_id'] . '/' . $photo; ?>" alt="image">
                                                <div class="mask">
                                                    <!--<p>Your Text</p>-->
                                                    <div class="tools tools-bottom">
                                                        <a href="<?php echo base_url('admin/product/' . $productDetail['pk_product_id'] . '/delete/' . $photo) ?>"><i class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>                 
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <?php
                if (is_array($productTrainings)) {
                    ?>
                    <div class="row">
                        <h2>Training List</h2>
                        <ul class="to_do">
                            <?php
                            foreach ($productTrainings as $pTraining) {
                                ?>
                                <li>
                                    <?php echo $pTraining['training_title']; ?>
                                    <a class="pull-right" href="<?php echo base_url('admin/product/' . $productDetail['pk_product_id'] . '/remove/training/' . $pTraining['pk_training_id']) ?>"><i class="fa fa-remove"></i></a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (is_array($productTests)) {
                    ?>
                    <div class="row">
                        <h2>Test List</h2>
                        <ul class="to_do">
                            <?php
                            foreach ($productTests as $pTest) {
                                ?>
                                <li>
                                    <?php echo $pTest['test_title']; ?>
                                    <a class="pull-right" href="<?php echo base_url('admin/product/' . $productDetail['pk_product_id'] . '/remove/test/' . $pTest['pk_test_id']) ?>"><i class="fa fa-remove"></i></a>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>

</div>