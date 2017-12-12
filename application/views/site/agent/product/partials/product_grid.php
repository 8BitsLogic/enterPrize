<?php
foreach ($productList as $product) {
    ?>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <?php
            $prdImage = isset($product['product_image']) ? 'products/' . $product['pk_product_id'] . '/' . $product['product_image'] : 'download.svg';
            ?>
            <?php echo $product['prd_unlock'] ? '' : '<div class="overlay"><i class="fa fa-3x fa-lock"></i></div>'; ?>
            
            <img src="<?php echo $this->themeUrl . '/images/' . $prdImage; ?>" alt="..." class="img-responsive center-block">

            <div class="caption">
                <h4 class="text-primary"><b><?php echo substr($product['product_title'], 0, 40); ?></b></h4>
                <p class="text-justify"><?php echo substr($product['product_descp'], 0, 135); ?></p>
                <!--<p class="text-center bg-warning text-info"><?php echo $product['prd_unlock'] ? '' : 'Locked'; ?></p>-->
                <p><a href="<?php echo base_url('product/detail/' . $product['pk_product_id']); ?>" class="btn btn-default" role="button">View More</a></p>
            </div>
        </div>
    </div>
    <?php
}
?>