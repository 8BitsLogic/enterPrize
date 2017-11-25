<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            $this->load->view($view.'partials/test_detail')
            ?>
        </div>
        <?php $this->load->view($view . 'partials/test_form'); ?>
    </div>
</section>
