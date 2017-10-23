<div class="x_panel">
    <div class="x_title">
        <h4>External Notes</h4>
    </div>
    <div class="x_content">
        <?php echo $leadDetail['lead_external_notes']; ?>
        <div class="ln_solid"></div>
        <?php
        if (in_array($leadDetail['lead_status'], $statusArray)) {
            $attributesCnotes = array('id' => "enotes", 'data-parsley-validate' => "", 'class' => "form-horizontal form-label-left", 'novalidate' => "");
            echo form_open(base_url('admin/lead/' . $leadDetail['pk_lead_id'] . '/enotes'), $attributesCnotes);
            ?>
            <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <textarea class="form-control" rows="2" placeholder="" required name="enotes" style="resize: none;"></textarea>
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