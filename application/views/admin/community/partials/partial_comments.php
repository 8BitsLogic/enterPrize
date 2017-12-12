<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <h3>Comments</h3>
        <hr>
    </div>
    <?php
    if (is_array($commentList)) {
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="10%">Agent</th>
                    <th width="70%">Comment</th>
                    <th width="20%" class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($commentList as $commentKey) {
                    ?>

                    <tr>
                        <td><a target="_blank" href="<?php echo base_url('admin/agent/detail/' . $commentKey['fk_agent_id']) ?>"><?php echo $commentKey['agent_username']; ?></a></td>
                        <td><?php echo $commentKey['comment_descp']; ?></td>
                        <td class="text-right">
                            <?php
                            if (!in_array($commentKey['comment_status'], array('publish'))) {
                                ?>
                                <a title="Publish" href="<?php echo base_url('admin/community/queries/'.$commentKey['fk_post_id'].'/comment/'.$commentKey['pk_comment_id'].'/status/publish'); ?>"><i class="fa fa-2x fa-check-square-o"></i></a>
                                <?php
                            }
                            if (!in_array($commentKey['comment_status'], array('blocked'))) {
                                ?>
                                <a title="Block" href="<?php echo base_url('admin/community/queries/'.$commentKey['fk_post_id'].'/comment/'.$commentKey['pk_comment_id'].'/status/blocked'); ?>"><i class="fa fa-2x fa-hand-stop-o"></i></a>
                                <?php
                            }
                            ?>
                            <a title="Delete" href="<?php echo base_url('admin/community/queries/'.$commentKey['fk_post_id'].'/comment/'.$commentKey['pk_comment_id'].'/delete'); ?>"><i class="fa fa-2x fa-close"></i></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
        <?php
    } else {
        ?>
        <h4 class="col-md-12 alert alert-warning">No Comments</h4>
        <?php
    }
    ?>
</div>