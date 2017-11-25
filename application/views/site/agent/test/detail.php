<?php $this->load->view($view.'../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <?php $this->load->view($view . 'partials/test_detail'); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <h4 class="text-primary">I'm ready take this test. <a href="<?php echo base_url('test/take_test/' . $testDetail['pk_test_id']); ?>"><span class="pull-right"><i class="fa fa-clipboard"></i></span></a></h4>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>