<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Leads List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$leadList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="10%">Lead#</th>
                                <th width="30%">Product Title</th>
                                <th width="30%">Agent</th>
                                <th width="20%">Status</th>
                                <th width="10%">Create Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($leadList as $lead) {
                                ?>
                                <tr>
                                    <td><?php echo $lead['pk_lead_id']; ?></td>
                                    <td><a href="<?php echo base_url('admin/product/detail/'.$lead['pk_product_id']); ?>" target="_blank"><?php echo $lead['product_title']; ?></a></td>
                                    <td><a href="<?php echo base_url('admin/agent/detail/'.$lead['pk_agent_id']); ?>" target="_blank"><?php echo $lead['agent_username']; ?></a></td>
                                    <td><?php echo $lead['lead_status']; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($lead['create_date'])); ?></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/lead/detail/' . $lead['pk_lead_id']); ?>"><i class="fa fa-file-o"></i></a>
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