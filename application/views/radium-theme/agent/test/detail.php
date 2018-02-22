<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>

            <?php $this->load->view($view . 'partials/test_detail'); ?>
            <a class="theme-btn radial-btn bg_red pull-right" href="<?php echo base_url('test/take_test/' . $testDetail['pk_test_id']); ?>">
                <span class="txt">Take Test Now</span> <span class="img-circle fa fa-arrow-right"></span>
            </a>

        </div>
    </div>

</section>