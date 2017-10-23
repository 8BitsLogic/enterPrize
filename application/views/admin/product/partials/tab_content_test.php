<div class="row">
    <h2>Available Test List</h2>
    <?php
    if (!$testList) {
        ?>
        <span class="col-md-12 alert alert-warning">No unique Training available.</span>
        <?php
    } else {
        ?>
        <ul class="to_do">
            <?php
            foreach ($testList as $test) {
                ?>
                <li><?php echo $test['test_title']; ?>
                    <a class="pull-right" href="<?php echo base_url('admin/product/'.$productDetail['pk_product_id'].'/add/test/'.$test['pk_test_id']) ?>"><i class="fa fa-plus"></i></a></li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
    ?>

</div>