<?php $this->load->view('admin/partials/content_title');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Query Detail</h2>
                <?php
                if (is_array($queryDetail)) {
                    ?>
                    <a title="Delete" href="<?php echo base_url('admin/community/queries/' . $queryDetail['pk_post_id'] . '/delete') ?>" class="btn btn-default pull-right"><i class="fa fa-close"></i></a>
                    <?php
                    $slug = $queryDetail['post_featured'] ? 'set' : 'unset';
                    $class = $queryDetail['post_featured'] ? 'fa-arrow-circle-o-down' : 'fa-arrow-circle-o-up';
                    $fTitle = $queryDetail['post_featured'] ? 'Unset Featured' : 'Set Featured';
                    ?>
                    <a title="<?php echo $fTitle?>" href="<?php echo base_url('admin/community/queries/' . $queryDetail['pk_post_id'] . '/featured/'.$slug) ?>" class="btn btn-default pull-right"><i class="fa <?php echo $class?>"></i></a>
                    <?php
                    if (!in_array($queryDetail['post_status'], array('block'))) {
                        ?>
                        <a title="Block" href="<?php echo base_url('admin/community/queries/' . $queryDetail['pk_post_id'] . '/status/block') ?>" class="btn btn-default pull-right"><i class="fa fa-hand-stop-o"></i></a>
                        <?php
                    }
                    ?>
                    <?php
                    if (!in_array($queryDetail['post_status'], array('publish'))) {
                        ?>
                        <a title="Publish" href="<?php echo base_url('admin/community/queries/' . $queryDetail['pk_post_id'] . '/status/publish') ?>" class="btn btn-default pull-right"><i class="fa fa-check-square-o"></i></a>
                        <?php
                    }
                    ?>
                    <?php
                }
                ?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$queryDetail) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="row text-justify">
                                <h3 class="text-primary"><?php echo $queryDetail['post_title']; ?></h3>
                                <p class="italic"><?php echo $queryDetail['post_descp']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    $this->load->view($view . 'partials/partial_comments', array('commentList' => $commentList));
                }
                ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</div>