<?php
if (isset($trainingList) && is_array($trainingList)) {
    ?>
    <div class="col-sm-12 col-md-12">
        <h3>Product Training</h3>
        <div class="table-responsive">
            <?php $this->load->view($trainingView . 'partials/training_grid'); ?>
        </div>
    </div>
    <?php
}
if (isset($testList) && is_array($testList)) {
    ?>
    <div class="col-sm-12 col-md-12">
        <h3>Product Test</h3>
        <div class="table-responsive">
            <?php $this->load->view($testView . 'partials/test_grid'); ?>
        </div>
    </div>
    <?php
}
?>