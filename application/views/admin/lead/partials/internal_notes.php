<div class="x_panel">
    <div class="x_title">
        <h4>Internal Notes</h4>
    </div>
    <div class="x_content">
        <?php echo $leadDetail['lead_notes'] ?>
        <div class="ln_solid"></div>
        <?php
        if (in_array($leadDetail['lead_status'], $statusArray)) {
            $attributesInotes = array('id' => "inotes", 'data-parsley-validate' => "", 'class' => "form-horizontal form-label-left", 'novalidate' => "");
            echo form_open(base_url('admin/lead/' . $leadDetail['pk_lead_id']. '/inotes'), $attributesInotes);
            ?>
            <div class="form-group">
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <textarea class="form-control" rows="2" cols="3" placeholder="" name="inotes" required="" style="resize: none;"></textarea>
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
