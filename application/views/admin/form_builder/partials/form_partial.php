<?php
$idSlug = isset($formDetail['pk_form_id']) ? '/' . $formDetail['pk_form_id'] : '';
$attributes = array('id' => "lead_form", 'class' => "form-horizontal form-label-left", 'data-parsley-validate' => "", 'novalidate' => "");
echo form_open(base_url('admin/form_builder/form/save' . $idSlug), $attributes);
?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ftitle">Lead Form Title<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="ftitle" name="ftitle" required="required" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo isset($formDetail['form_title'])? $formDetail['form_title'] : ''; ?>">
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