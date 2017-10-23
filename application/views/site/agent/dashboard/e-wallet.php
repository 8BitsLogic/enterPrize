<div class="row">
    <?php
    echo $this->session->flashdata($flashKey);
    if (isset($totalFunds) && $totalFunds > 0) {
        ?>
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Request Payment</h3>
                </div>
                <div class="x_content">

                    <?php
                    $attributes = array('class' => "form-horizontal form-label-left", 'id' => "payment_request_form");
                    echo form_open(base_url('dashboard/request_payment'), $attributes);
                    ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Payout Amount<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                            <input id="amount" required="" class="form-control col-md-3 col-xs-12" name="amount" type="number" value="<?php echo $totalFunds - $totalPRpending; ?>" >
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="reset"class="btn btn-success">Reset</button>
                            <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>E-Wallet Detail</h3>
            </div>
            <div class="x_content">
                <div class="col-md-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="3" >Amount into account</th>
                            </tr>
                            <tr>
                                <th>Timestamp</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($transIn)) {
                                foreach ($transIn as $inKey) {
                                    ?>
                                    <tr>
                                        <td><?php echo $inKey['transaction_create_date']; ?></td>
                                        <td><?php echo $inKey['transaction_descp']; ?></td>
                                        <td><?php echo $inKey['transaction_amount']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="3" class="alert alert-warning">No data found.</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="3" >Amount Outof account</th>
                            </tr>
                            <tr>
                                <th>Timestamp</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($transOut)) {
                                foreach ($transOut as $outKey) {
                                    ?>
                                    <tr>
                                        <td><?php echo $outKey['transaction_create_date']; ?></td>
                                        <td><?php echo $outKey['transaction_descp']; ?></td>
                                        <td><?php echo $outKey['transaction_amount']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="3" class="alert alert-warning">No data found.</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
                <div class="col-md-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="3" >Pending Payout Requests</th>
                            </tr>
                            <tr>
                                <th>Request #</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($PRpendingList)) {
                                foreach ($PRpendingList as $prKey) {
                                    ?>

                                    <tr>
                                        <td>
                                            <a href="<?php echo base_url('dashboard/ewallet/payment_requst/' . $prKey['pk_payment_request_id']); ?>">
                                                <?php echo $prKey['pk_payment_request_id']; ?>
                                            </a>
                                        </td>
                                        <td><?php echo $prKey['create_date']; ?></td>
                                        <td><?php echo $prKey['payment_request_amount']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="3" class="alert alert-warning">No Payout requests pending.</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>