<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <?php $this->load->view($view . 'partials/training_detail'); ?>
        </div>
    </div>
</section>
<hr>
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <?php $this->load->view($view . 'partials/training_resources'); ?>
        </div>
    </div>
</section>