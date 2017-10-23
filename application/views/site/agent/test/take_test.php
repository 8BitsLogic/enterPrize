<div class="row">
    <?php
    echo $this->session->flashdata($flashKey);
    ?>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h3><?php echo $page['title']; ?></h3>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h4><?php echo $testDetail['test_title']; ?></h4>
                            </div>
                            <div class="x_content">
                                <?php echo $testDetail['test_descp']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view($view . 'partials/test_form'); ?>
            </div>
        </div>
    </div>
</div>