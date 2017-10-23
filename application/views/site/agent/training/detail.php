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
                <?php $this->load->view($view.'partials/training_detail'); ?>
                <?php $this->load->view($view.'partials/training_resources'); ?>
            </div>
        </div>
    </div>
</div>