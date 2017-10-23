<div class="x_panel">
    <div class="x_title">
        <h4>Internal Notes</h4>
    </div>
    <div class="x_content">
        <?php echo $prDetail['payment_request_internal_notes']; ?>
        <div class="ln_solid"></div>
        <?php
        if (in_array($prDetail['payment_request_status'], $statusArrayWhold)) {
            $attributesInotes = array('id' => "inotes", 'data-parsley-validate' => "", 'class' => "form-horizontal form-label-left", 'novalidate' => "");
            echo form_open(base_url('admin/payment/' . $prDetail['pk_payment_request_id'] . '/inotes'), $attributesInotes);
            ?>
            <div class="form-group">
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <textarea class="form-control" rows="2" placeholder="" name="notes" required="" style="resize: none;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            <?php
            echo form_close();
        }
        ?>
    </div>
</div>
