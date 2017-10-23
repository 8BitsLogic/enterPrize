<?php
if (!is_null($productDetail['fk_form_id'])) {
    ?>
    <div class="">
        <h4>Product Lead Form</h4>        
        <div class="ln_solid"></div>
        <ul class="to_do">
            <li> <strong> <?php echo $productForm['form_title']; ?>  </strong>
                <a href="<?php echo base_url('admin/product/' . $productDetail['pk_product_id'] . '/remove_form'); ?> ">
                    <i class="fa fa-close pull-right"></i>
                </a>
            </li>
        </ul>
    </div>
    <?php
    if ($productFormFields) {
        ?>
        <div class="">
            <h4>Form Fields</h4>        
            <div class="ln_solid"></div>

            <ul class="to_do">
                <?php
                foreach ($productFormFields as $pfKey => $pfVal) {

                    echo '<li>' . $pfVal['field_label'] . '</li>';
                }
                ?>

            </ul>
        </div>
        <?php
    } else {
        ?>
        <span class="col-md-12 alert alert-warning">No fields attached to form.</span>
        <?php
    }
} elseif ($formList) {
    ?>
    <div class="">
        <ul class="to_do">
            <?php
            foreach ($formList as $flKey => $flVal) {
                ?>
                <li> <?php echo $flVal['form_title']; ?>  <a href="<?php echo base_url('admin/product/' . $productDetail['pk_product_id'] . '/add_form/' . $flVal['pk_form_id']); ?> "><i class="fa fa-plus pull-right"></i></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
} else {
    ?>
    <h4 class = "col-md-12 alert alert-warning">Form data not available.</h4>
    <?php
}