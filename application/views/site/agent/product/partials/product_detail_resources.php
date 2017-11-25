<div class="container">
    <div class="row">
        <?php
        if (isset($trainingList) && is_array($trainingList)) {
            ?>
            <div class="col-sm-12 col-md-12">
                <h4 class="text-primary">Product Training</h4>
                <hr>
                <div class="table-responsive">
                    <?php $this->load->view($trainingView . 'partials/training_grid'); ?>
                </div>
            </div>
            <?php
        }
        if (isset($testList) && is_array($testList)) {
            ?>
            <div class="col-sm-12 col-md-12">
                <h4 class="text-primary">Product Test</h4>
                <hr>
                <div class="table-responsive">
                    <?php $this->load->view($testView . 'partials/test_grid'); ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>