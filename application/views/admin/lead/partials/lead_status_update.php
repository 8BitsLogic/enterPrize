<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <?php
        if (in_array($leadDetail['lead_status'], $statusArray)) {
            ?>

            <li role="presentation" class=""><a href="#tab_decline" role="tab" id="decline-tab" data-toggle="tab" aria-expanded="false">Decline</a>
            </li>
            <li role="presentation" class="active"><a href="#tab_approve" role="tab" id="approve-tab2" data-toggle="tab" aria-expanded="false">Approve</a>
            </li>
        <?php } ?>
    </ul>
    <div id="myTabContent" class="tab-content">

        <?php
        if (in_array($leadDetail['lead_status'], $statusArray)) {
            ?>
            <div role="tabpanel" class="tab-pane fade" id="tab_decline" aria-labelledby="dcline-tab">

                <?php
                $attributesInotes = array('id' => "holdPayment", 'data-parsley-validate' => "", 'class' => "form-horizontal form-label-left", 'novalidate' => "");
                echo form_open(base_url('admin/lead/' . $leadDetail['pk_lead_id'] . '/decline'), $attributesInotes);
                ?>
                <div class="form-group">
                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="inotes">Internal Notes <span class="required">*</span></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <textarea class="form-control" rows="2" placeholder="" name="inotes" required="" style="resize: none;"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-12 col-sm-12 col-xs-12" for="enotes">External Notes <span class="required">*</span></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <textarea class="form-control" rows="2" placeholder="" required="" name="enotes" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" name="submit" value="submit" class="btn btn-success">Decline</button>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>

            <div role="tabpanel" class="tab-pane fade active in" id="tab_approve" aria-labelledby="approve-tab">
                <a class="pull-right btn btn-success" href="<?php echo base_url('admin/lead/' . $leadDetail['pk_lead_id'] . '/approve') ?>"> Approve</a>
            </div>
            <?php
        }
        ?>
    </div>
</div>