<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>


            <?php
            if (!$testList) {
                ?>
                <h4 class="col-md-12 alert alert-warning">No data found</h4>
                <?php
            } else {
                $this->load->view($view . 'partials/test_grid');
            }
            ?>

        </div>
    </div>

</section>