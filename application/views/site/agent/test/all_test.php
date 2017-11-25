<?php $this->load->view($view.'../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
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
            </div>
        </div>
    </div>

</section>