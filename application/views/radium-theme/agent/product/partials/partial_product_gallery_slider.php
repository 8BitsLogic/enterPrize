<?php
if ($productGallery) {
    ?>
    <!--Column-->
    <div class="column col-md-7 col-sm-12 col-xs-12">
        <div class="image-box">
            <?php if (count($productGallery) > 1) {
                ?>
                <ul class="image-slider">
                    <?php
                    foreach ($productGallery as $photo) {
                        ?>
                        <li>
                            <img src="<?php echo $this->themeUrl . '/images/products/' . $productDetail['pk_product_id'] . '/' . $photo; ?>" alt="">
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <?php
            } else {
                ?>
            <img class="image-slider" src="<?php echo $this->themeUrl . '/images/products/' . $productDetail['pk_product_id'] . '/' . $productGallery[0]; ?>" alt="">
                <?php
            }
            ?>

        </div>
    </div>
    <?php
}
?>