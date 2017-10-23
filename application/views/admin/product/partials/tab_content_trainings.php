<div class="row">
    <h2>Available Training List</h2>
    <?php
    if (!$trainingList) {
        ?>
        <span class="col-md-12 alert alert-warning">No unique Training available.</span>
        <?php
    } else {
        ?>
        <ul class="to_do">
            <?php
            foreach ($trainingList as $training) {
                ?>
                <li><?php echo $training['training_title']; ?>
                    <a class="pull-right" href="<?php echo base_url('admin/product/'.$productDetail['pk_product_id'].'/add/training/'.$training['pk_training_id']) ?>"><i class="fa fa-plus"></i></a></li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
    ?>

</div>