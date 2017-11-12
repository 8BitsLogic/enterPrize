<?php
foreach ($productList as $product) {
    ?>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="images/download.svg" alt="..." class="img-responsive center-block">
            <div class="caption">
                <h4 class="text-default"><b><?php echo substr($product['product_title'], 0, 40); ?></b></h4>
                <p><?php echo substr($product['product_descp'], 0, 135); ?></p>
                <p><?php echo $product['prd_unlock'] ? 'Unlocked' : 'Locked'; ?></p>
                <p><a href="<?php echo base_url('product/detail/' . $product['pk_product_id']); ?>" class="btn btn-default" role="button">View More</a></p>
            </div>
        </div>
    </div>
    <?php
}
?>