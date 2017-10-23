<p class="lead">Add Video Link Resource</p>

<?php
$attributes = array('class' => "form-horizontal form-label-left", 'id' => "r_video_form", 'data-parsley-validate' => "");
echo form_open(base_url('admin/training/' . $trainingDetail['pk_training_id'] . '/resource/add'), $attributes);
?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="r_type">Type <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="r_type" name="r_type" required="required" readonly="" class="form-control col-md-7 col-xs-12" type="text" value="video link">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="r_title">Title<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="r_title" name="r_title" required="required" class="form-control col-md-7 col-xs-12" type="text">
    </div>
</div>
<div class="form-group">
    <label for="r_link" class="control-label col-md-3 col-sm-3 col-xs-12">Video Link</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="r_link" name="r_link" class="form-control col-md-7 col-xs-12" type="text">
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