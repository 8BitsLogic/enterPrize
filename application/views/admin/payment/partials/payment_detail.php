<div class="widget widget_tally_box">
    <h3 class="name"><a href="<?php echo base_url('admin/agent/detail/' . $prDetail['pk_agent_id']) ?>"><?php echo $prDetail['agent_username']; ?></a></h3>

    <div class="flex">
        <ul class="list-inline count2">
            <li>
                <h4>Amount</h4>
                <span><?php echo $prDetail['payment_request_amount']; ?></span>
            </li>
            <li>
                <h4>date</h4>
                <span><?php echo date("d-m-Y", strtotime($prDetail['payment_request_create_date'])); ?></span>
            </li>
            <li>
                <h4>Status</h4>
                <span><?php echo $prDetail['payment_request_status']; ?></span>
            </li>
        </ul>
    </div>
    <?php
    if (is_array($prTdetail)) {
        ?>
        <h4><a href="<?php echo base_url('admin/agent/detail/' . $prDetail['pk_agent_id']) ?>">Transaction details</a></h4>
        <div class="flex">
            <table width="100%" class="table table-striped">
                <thead>
                    <tr>
                        <th>T_id</th>
                        <th>T_amount</th>
                        <th>T_date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($prTdetail as $transactionD) {
                        ?>
                        <tr>
                            <td><?php echo $transactionD['pk_transaction_id']; ?></td>
                            <td><?php echo $transactionD['transaction_amount']; ?></td>
                            <td><?php echo date("d-m-Y", strtotime($transactionD['transaction_create_date'])); ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>

            </table>
        </div>
        <?php
    }
    ?>

</div>