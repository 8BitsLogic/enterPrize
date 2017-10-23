<div class="x_panel">
    <div class="x_title">
        <h3 class="prod_title"><?php echo 'Product leads list'; ?></h3>
    </div>
    <div class="x_content">

        <div class="row">
           <?php
                echo $this->session->flashdata($flashKey);
                if (!$productLeads) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="10%">Lead#</th>
                                <th width="30%">Agent</th>
                                <th width="20%">Status</th>
                                <th width="10%">Create Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($productLeads as $lead) {
                                ?>
                                <tr>
                                    <td><?php echo $lead['pk_lead_id']; ?></td>
                                    <td><a href="<?php echo base_url('admin/agent/detail/'.$lead['fk_agent_id']); ?>" target="_blank"><?php echo $lead['agent_username']; ?></a></td>
                                    <td><?php echo $lead['lead_status']; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($lead['lead_craete_date'])); ?></td>
                                    <td>
                                        <ul>
                                            <a target="_blank" href="<?php echo base_url('admin/lead/detail/' . $lead['pk_lead_id']); ?>"><i class="fa fa-file-o"></i></a>
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