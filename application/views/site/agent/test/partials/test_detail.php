<div class="row">
    <h2 class="text-primary"><?php echo $testDetail['test_title']; ?></h2>
    <hr>
    <div class="col-md-8">
        <div class="x_panel">
            <div class="x_content">
                <?php echo $testDetail['test_descp']; ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="x_panel">
            <div class="x_title">
                <h4 class="text-primary">This test is step towards unlocking below products.</h4>
                <hr>
            </div>
            <div class="x_content">
                <?php
                if (!$testProducts) {
                    ?>
                    <span class="col-md-12 alert alert-warning">Test link to products pending.</span>
                    <?php
                } else {
                    ?>
                    <ul class="to_do">
                        <?php
                        foreach ($testProducts as $product) {
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
<div class="col-xs-12"></div>