<?php
if (!$productList) {
    ?>
    <h4 class="col-md-12 alert alert-warning">No unique product available</h4>
    <?php
} else {
    $attributes = array('class' => "form-horizontal form-label-left", 'id' => "training_add_product");
    ?>


    <div class="x_content">

        <?php
        echo form_open(base_url('admin/training/' . $trainingDetail['pk_training_id'] . '/product/add'), $attributes);
        foreach ($productList as $product) {
            ?>
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <div class="checkbox">
                    <label> <input name="prd-list[]" value="<?php echo $product['pk_product_id']; ?> " type="checkbox"> <?php echo $product['product_title']; ?> </label>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="submit" value="submit" class="btn btn-success">Add</button>
            </div>
        </div>
        <?php echo form_close(); ?>

        <div class="clearfix"></div>
    </div>

    <?php
}
?>
<div class="clearfix"></div>