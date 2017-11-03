<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Payments List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata('message_payments');
                if (!$prList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30%">Agent</th>
                                <th width="30%">Amount</th>
                                <th width="30%">Request Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($prList as $pr) {
                                ?>
                                <tr>
                                    <td><?php echo $pr['agent_username']; ?></td>
                                    <td><?php echo $pr['payment_request_amount']; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($pr['create_date'])); ?></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/payment/detail/' . $pr['pk_payment_request_id']); ?>"><i class="fa fa-file-o"></i></a>
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