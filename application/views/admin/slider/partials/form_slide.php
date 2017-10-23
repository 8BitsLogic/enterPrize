<?php
$wId = isset($slideDetail['pk_slide_id']) ? '/' . $slideDetail['pk_slide_id'] : '';
$attributes = array('id' => "slide_form", 'class' => "form-horizontal form-label-left", 'data-parsley-validate' => "", 'novalidate' => "");
echo form_open_multipart(base_url('admin/slide/save' . $wId), $attributes);
?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slide_img">Select Slider Image <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="slide_img" name="slide_img" required="required" class="form-control col-md-7 col-xs-12" type="file" accept=".jpg">
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