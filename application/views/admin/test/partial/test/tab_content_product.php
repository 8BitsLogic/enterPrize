<?php
$id = isset($testDetail['pk_test_id']) ? '/' . $testDetail['pk_test_id'] : '';
?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Test assigned to products.</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                if (!$testProductList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found.</h4>  
                    <?php
                } else {
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'test_selected_product_form');
                    echo form_open(base_url('admin/test/choice' . $id . '/remove-product'), $attributes);
                    ?>
                    <div class = "form-group">
                        <div class = "col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php
                            foreach ($testProductList as $productTest) {
                                ?>
                                <div class="checkbox">
                                    <label>
                                        <input name="prd-list[]" value="<?php echo $productTest['fk_product_id']; ?>" type="checkbox"> <?php echo $productTest['product_title']; ?>
                                    </label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class = "form-group">
                        <div class = "col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type = "reset" class = "btn btn-primary">Cancel</button>
                            <button type = "submit" name = "submit" value = "submit" class = "btn btn-success">Remove</button>
                        </div>
                    </div>
                    <?php
                    echo form_close();
                }
                ?>
            </div>
        </div>
    </div>

</div>
