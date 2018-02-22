<?php $this->load->view($view.'../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="text-primary"><?php echo $trainingDetail['training_title']; ?></h2>
                        <hr>
                    </div>
                    <div class="x_content">
                        <?php $this->load->view($view . 'partials/training_detail'); ?>
                        <?php $this->load->view($view . 'partials/training_resources'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>