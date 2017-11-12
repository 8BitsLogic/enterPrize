<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php
                echo $this->session->flashdata($flashKey);
                if (isset($totalFunds) && $totalFunds > 0) {
                    ?>
                    <div class="col-md-12">
                        <h3 class="text-primary">Request Payment</h3>
                        <div class="col-md-12 col-xs-12 col-md-offset-3">


                            <?php
                            $attributes = array('class' => "form-horizontal form-label-left", 'id' => "payment_request_form");
                            echo form_open(base_url('dashboard/request_payment'), $attributes);
                            ?>
                            <div class="col-sm-8 form-group">
                                <label class="control-label" for="amount">Payout Amount<span class="required">*</span></label>
                                <input id="amount" required="" class="form-control" name="amount" type="number" value="<?php echo $totalFunds - $totalPRpending; ?>" >
                            </div>

                            <div class="col-sm-8 form-group">
                                <button type="reset"class="btn btn-info next-step">Reset</button>
                                <button type="submit" name="submit" value="submit" class="btn btn-info next-step">Submit</button>
                            </div>
                            <?php echo form_close(); ?>

                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="3"><h3 class="text-primary">Account Statement</h3></th>
                            </tr>
                            <tr>
                                <th>Timestamp</th>
                                <th>Description</th>
                                <th>Amount In</th>
                                <th>Amount Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($transactions)) {
                                foreach ($transactions as $inKey) {
                                    ?>
                                    <tr>
                                        <td><?php echo $inKey['transaction_create_date']; ?></td>
                                        <td><?php echo $inKey['transaction_descp']; ?></td>
                                        <td><?php echo $inKey['transaction_type'] == 'deposit' ? $inKey['transaction_amount'] : ''; ?></td>
                                        <td><?php echo $inKey['transaction_type'] == 'withdraw' ? $inKey['transaction_amount'] : ''; ?></td>
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
            </div>
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="3"><h3 class="text-primary">Pending Payout Requests</h3></th>
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

</section>