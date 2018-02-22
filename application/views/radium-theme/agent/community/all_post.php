<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                    <a href="<?php echo base_url('community/new_post') ?>" class="btn btn-primary pull-right">New Post</a>
                </div>
                </div>
                <?php $this->load->view($view.'partials/post_list');?>
            </div>
        </div>
    </div>
</div>
</section>