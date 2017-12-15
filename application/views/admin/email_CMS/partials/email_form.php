<?php
$idSlug = isset($emailDetail['pk_email_id']) ? '/' . $emailDetail['pk_email_id'] : '';

$eD['subject'] = isset($emailDetail['email_subject']) ? $emailDetail['email_subject'] : '';
$eD['body'] = isset($emailDetail['email_body']) ? $emailDetail['email_body'] : '';

$attributes = array('id' => "email_form", 'data-parsley-validate' => "", 'class' => "form-horizontal form-label-left", 'novalidate' => "");
echo form_open_multipart(base_url('admin/email_cms/save' . $idSlug), $attributes);
?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_subject">Subject <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="email_subject" name="email_subject" required="required" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $eD['subject']; ?>">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_body">Email Message
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea class="form-control textEditor" rows="3" id="email_body" name="email_body"><?php echo $eD['body']; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="v_email">Email Template<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="control-label col-md-3 col-sm-3 col-xs-12" name="template_id">
            <?php
            foreach ($emailTemplateList as $emailTemplateKey) {
                $selectTemplate = isset($emailDetail) && $emailTemplateKey['pk_email_setting_id'] == $emailDetail['fk_email_setting_id'] ? 'selected=""' : '';
                ?>
                <option <?php echo $selectTemplate; ?> value="<?php echo $emailTemplateKey['pk_email_setting_id']; ?>"><?php echo $emailTemplateKey['pk_email_setting_id']; ?></option>
                <?php
            }
            ?>

        </select>
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