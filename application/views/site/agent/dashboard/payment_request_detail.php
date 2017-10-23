<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Payment Request# <?php echo $prDetail['pk_payment_request_id']; ?></h3>
            </div>
            <div class="x_content">
                Amount: <?php echo $prDetail['payment_request_amount']; ?><br>
                Date: <?php echo $prDetail['payment_request_create_date']; ?><br>
                Status: <?php echo $prDetail['payment_request_status']; ?><br>
                Notes: <?php echo $prDetail['payment_request_customer_notes']; ?><br>
            </div>
        </div>
        
    </div>
</div>