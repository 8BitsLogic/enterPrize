<div class="row clearfix">
    <?php
    foreach ($productList as $product) {
        $prdImage = isset($product['product_image']) ? 'products/' . $product['pk_product_id'] . '/' . $product['product_image'] : 'download.svg';
        ?>
        <!--Column-->
        <div class="col-md-4 col-sm-6 col-xs-12 column">
            <article class="inner-box">
                <figure class="image-box">
                   <a href="<?php echo base_url('product/detail/' . $product['pk_product_id']); ?>"><img src="<?php echo $this->themeUrl . '/images/' . $prdImage; ?>" alt="<?php echo $product['product_title']; ?>" title="<?php echo $product['product_title']; ?>"></a>
                </figure>
                <div class="content">
                    <?php if(isset($product['prd_unlock'])) {echo $product['prd_unlock'] ? '' : '<div class="author-thumb red_trasnperancy_02"><i class="fa fa-3x fa-lock lock"></i></div>';} ?>
                    <h3><a href="<?php echo base_url('product/detail/' . $product['pk_product_id']); ?>"><?php echo substr($product['product_title'], 0, 45); ?></a></h3>
                    <div class="text"><p><?php echo substr($product['product_descp'], 0, 175); ?></p></div>
                </div>
            </article>
        </div>
        <?php
    }
    ?>
</div>