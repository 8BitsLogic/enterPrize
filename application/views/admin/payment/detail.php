<?php $this->load->view('admin/partials/content_title');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Payment Request: <?php echo isset($prDetail['pk_payment_request_id']) ? $prDetail['pk_payment_request_id'] : ''; ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata('message_payment');
                if (!$prDetail) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?><div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="row">
                                    <?php $this->load->view($view . 'partials/payment_detail'); ?>
                                </div>
                                <div class="row">
                                    <?php $this->load->view($view . 'partials/payment_status_update'); ?>
                                </div>
                                
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?php $this->load->view($view . 'partials/internal_notes'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <?php $this->load->view($view . 'partials/customer_notes'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>