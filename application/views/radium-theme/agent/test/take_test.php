<?php $this->load->view($view . '../partials/page_title'); ?>

<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <?php
            echo $this->session->flashdata($flashKey);
            $this->load->view($view . 'partials/test_detail')
            ?>
        </div>
    </div>
</section>
<hr>
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <?php $this->load->view($view . 'partials/test_form'); ?>
        </div>
    </div>
</section>
