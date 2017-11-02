<?php
if (is_array($trainingList) || is_array($testList)) {
    ?>
    <div class="row">
        <?php
        if (isset($trainingList) && is_array($trainingList)) {
            ?>

            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        Product Training
                    </div>
                    <div class="x_content">
                        <?php $this->load->view($trainingView . 'partials/training_grid'); ?>
                    </div>
                </div>
            </div>
            <?php
        }

        if (isset($testList) && is_array($testList)) {
            ?>
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        Clear below test to unlock this product
                    </div>
                    <div class="x_content">
                        <?php $this->load->view($testView . 'partials/test_grid'); ?>
                    </div>
                </div>
            </div>
            <?Php
        }
        ?>
    </div>
    <?php
}
?>