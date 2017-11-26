<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-md-2 text-center">
                <img class="image img-circle img-thumbnail" style="width: 100px" src="<?php echo $agentPic; ?>"/>
                <p>
                    <?php echo $postDetail['agent_username']; ?><br> 
                    <?php echo date_format(date_create($postDetail['post_create_date']), 'd-m-Y') ?>
                </p>
            </div>
            <div class="col-md-10 text-justify">
                <h3 class="text-primary"><?php echo $postDetail['post_title']; ?></h3>
                <p><?php echo $postDetail['post_descp']; ?></p>
            </div>
        </div>
        <?php
        $this->load->view($view . 'partials/comment_list');
        ?>
    </div>
</section>