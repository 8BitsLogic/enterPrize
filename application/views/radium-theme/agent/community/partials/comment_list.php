<div class="row">
    <?php
    if ($postDetail['post_status'] == 'publish') {
        ?>
        <div class="col-md-12">
            <?php $this->load->view($view . 'partials/comment_form'); ?>
        </div>
        <?php
    }
    
    if ($postComments) {
        ?>
        <span class="col-md-12 h4 text-primary">Comments</span>
        <div class="col-md-7">
            <?php
            if ($postComments) {
                foreach ($postComments as $keyC => $valC) {
                    ?>
                    <h5 class="text-primary"><?php echo $valC['agent_username']; ?></h5>
                    <p class="italic"><?php echo $valC['comment_create_date']; ?></p>
                    <p><?php echo $valC['comment_descp']; ?></p>
                    <hr>
                    <?php
                }
            }
            ?>
        </div>
        <?php
    }
    ?>
        <div class="col-md-5">
            <span class="col-md-12 h4 text-primary">Recent Posts</span>
            <?php $this->load->view($view.'partials/post_list'); ?>
        </div>
</div>