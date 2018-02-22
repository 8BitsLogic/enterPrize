<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <a href="<?php echo base_url('dashboard/ewallet')?>">Back to Account Statement</a>
            <div class="col-md-6 col-md-offset-3">
                <h2 class="text-primary">Payment Request# <?php echo $prDetail['pk_payment_request_id']; ?></h2>
                <hr>
                <div>
                    <p class="text-primary">Amount: <span class="text-default"><?php echo 'AED '.number_format($prDetail['payment_request_amount'], '2', '.', ',') ?></span></p> 
                    <p class="text-primary">Date: <span class="text-default"><?php echo date_format(date_create($prDetail['payment_request_create_date']), 'd-m-Y') ?></span></p>
                    <p class="text-primary">Status: <span class="text-default"><?php echo $prDetail['payment_request_status']; ?></span></p> 
                    <p class="text-primary">Notes: <span class="text-default"><?php echo $prDetail['payment_request_customer_notes']; ?></span></p> 
                </div>
            </div>
        </div>
    </div>
</section>