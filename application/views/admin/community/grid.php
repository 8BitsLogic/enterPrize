<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Queries</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$queryList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="75%">Query</th>
                                <th width="10%" class="text-right">Agent</th>
                                <th width="15%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($queryList as $query) {
                                ?>
                                <tr>
                                    <td><?php echo substr($query['post_title'], 0, 110).'...'; ?></td>
                                    <td class="text-right"><a target="_blank" href="<?php echo base_url('admin/agent/detail/'.$query['fk_agent_id'])?>"><?php echo $query['agent_username']; ?></a></td>

                                    <td class="text-center">
                                        <ul>
                                            <a href="<?php echo base_url('admin/community/queries/' . $query['pk_post_id'] . '/detail'); ?>"><i class="fa fa-clipboard"></i></a>
        <!--                                            <a href="<?php echo base_url('admin/community/queries/' . $query['pk_post_id'] . '/status/(:any)'); ?>"><i class="fa fa-eye"></i></a>-->
                                            <a href="<?php echo base_url('admin/community/queries/' . $query['pk_post_id'] . '/delete'); ?>"><i class="fa fa-close"></i></a>
                                            <?php
                                            if ($query['comment_count'] > 0) {
                                                ?>
                                                <span class="badge bg-orange"><?php echo $query['comment_count'] ?></span>
                                                <?php
                                            }
                                            ?>
                                        </ul>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</div>