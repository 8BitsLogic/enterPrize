<div class="row">
    <div class="col-md-8">
        <div class="x_panel">
            <div class="x_title">
                <!--<h4><?php echo $trainingDetail['training_title']; ?></h4>-->
            </div>
            <div class="x_content">
                <p class="text-justify">
                    <?php echo $trainingDetail['training_descp']; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h4 class="text-primary">This training is for product listed below.</h4>
                <hr>
            </div>
            <div class="x_content">
                <?php
                if (!$trainingProducts) {
                    ?>
                    <span class="col-md-12 alert alert-warning">Training link to products pending.</span>
                    <?php
                } else {
                    ?>
                    <ul class="to_do">
                        <?php
                        foreach ($trainingProducts as $product) {
                            ?>
                            <li><a target="_blank" href="<?php echo base_url('product/detail/' . $product['pk_product_id']) ?>"><?php echo $product['product_title']; ?></a></li>        
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>