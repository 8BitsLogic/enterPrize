<?php
if (is_array($testProductList)) {
    ?>
    <div class="row">
        <div class="animated flipInY col-md-12 col-sm-12 col-xs-12">
            <div class="tile-stats">
                <h3><i class="icon-align-left fa fa-th"></i> Product List</h3>
                <?php
                foreach ($testProductList as $testProduct) {
                    ?>
                    <p><i class="icon-align-left fa fa-square"></i> <?php echo $testProduct['product_title']; ?></p>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    <?php
}
?>

