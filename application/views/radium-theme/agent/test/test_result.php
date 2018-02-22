<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>Test Result</h3>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">

                                        <h4 class="text-primary">Congratulations! You have successfully cleared <b><?php echo $testDetail['test_title']; ?></b></h4>
                                        <img src="<?php echo $this->themeUrl.'/uploads/user/'.$agentDetail['pk_agent_id'].'/certificate/'.$certificate; ?>" alt="<?php echo $testDetail['test_title']; ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>