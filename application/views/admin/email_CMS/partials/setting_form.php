<?php
$idSlug = isset($settingDetail['pk_email_setting_id']) ? '/' . $settingDetail['pk_email_setting_id'] : '';

$emailTemplate = isset($settingDetail['email_template']) ? $settingDetail['email_template'] : '';

$attributes = array('id' => "email_setting_form", 'data-parsley-validate' => "", 'class' => "form-horizontal form-label-left", 'novalidate' => "");
echo form_open_multipart(base_url('admin/email_cms/setting/save' . $idSlug), $attributes);
?>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_template">Email Template
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea id="" class="form-control textEditor" rows="3" id="prd_descp" name="email_template">
            <?php echo $emailTemplate; ?>
        </textarea>
    </div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="reset" class="btn btn-primary">Cancel</button>
        <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
    </div>
</div>


<?php
echo form_close();
?>