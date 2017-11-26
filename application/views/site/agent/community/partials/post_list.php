<?php
if (!$postList) {
    ?>
    <h4 class="text-warning">No post found</h4>
    <?php
} else {
    foreach ($postList as $key => $val) {
        ?>
        <div class="row ">
            <div class="col-md-2 text-right">
                <img class="image img-circle img-thumbnail" style="width: 70px" src="<?php echo $agentPic; ?>"/>
                <p>
                    <?php echo $val['agent_username']; ?><br> 
                    <?php echo date_format(date_create($val['post_create_date']), 'd-m-Y') ?>
                </p>
            </div>
            <div class="col-md-10">
                <h4 class="text-primary"><a href="<?php echo base_url('community/post/' . $val['pk_post_id']); ?>"><?php echo substr($val['post_title'], 0, 85); ?></a></h4>
                <p class="text-justify"><?php echo substr($val['post_descp'], 0, 270); ?><a href="<?php echo base_url('community/post/' . $val['pk_post_id']); ?>" class="btn btn-info pull-right">Read more <i class="fa fa-arrow-right"></i></a></p>
            </div>
        </div>
        <?php
    }
}
?>