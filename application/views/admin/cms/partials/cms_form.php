<?php
$wId = isset($id) ? '/' . $id : '';
$attributes = array('id' => "cms_form", 'class' => "form-horizontal form-label-left", 'data-parsley-validate' => "", 'novalidate' => "");
echo form_open(base_url('admin/cms/save' . $wId), $attributes);
?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="title" name="title" required="required" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo isset($pageDetail['page_title']) ? $pageDetail['page_title'] : '' ;?>">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alias">Alias <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="alias" name="alias" required="required" class="form-control col-md-7 col-xs-12" type="text"  value="<?php echo isset($pageDetail['page_alias']) ? $pageDetail['page_alias'] : '' ;?>">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descp">Page Content <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea class="form-control" id="textEditor" name="descp" placeholder=""><?php echo isset($pageDetail['page_content']) ? $pageDetail['page_content'] : '' ;?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div id="status" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default <?php echo isset($pageDetail['page_status']) && $pageDetail['page_status'] == 'active' ? 'active' : '' ;?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input name="status" <?php echo isset($pageDetail['page_status']) && $pageDetail['page_status'] == 'active' ? 'selected' : '' ;?> value="active" type="radio" required=""> Active
            </label>
            <label class="btn btn-primary <?php echo isset($pageDetail['page_status']) && $pageDetail['page_status'] == 'inactive' ? 'active' : '' ;?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input name="status" <?php echo isset($pageDetail['page_status']) && $pageDetail['page_status'] == 'active' ? 'selected' : '' ;?> value="inactive" type="radio" required=""> Inactive
            </label>
        </div>
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