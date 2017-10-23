<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Agents</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata('agent_message');
                if (!$agentList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($agentList as $agent) {
                                $status = $agent['agent_status'] == 'active' ? 'fa-eye' : 'fa-eye-slash'; 
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $agent['pk_agent_id'] ?></th>
                                    <td><?php echo $agent['agent_first_name'] ?></td>
                                    <td><?php echo $agent['agent_last_name'] ?></td>
                                    <td><?php echo $agent['agent_email'] ?></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/agent/status/'.$agent['pk_agent_id']); ?>"><i class="fa <?php echo $status; ?>"></i></a>
                                            <a href="<?php echo base_url('admin/agent/detail/'.$agent['pk_agent_id']); ?>"><i class="fa fa-file-o"></i></a>
                                            <a href="<?php echo base_url('admin/agent/delete/'.$agent['pk_agent_id']); ?>"><i class="fa fa-close"></i></a>
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