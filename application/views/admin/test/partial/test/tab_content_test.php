<?php
$titleVal = isset($testDetail['test_title']) ? $testDetail['test_title'] : '';
$descpVal = isset($testDetail['test_descp']) ? $testDetail['test_descp'] : '';
$statusVal = isset($testDetail['test_status']) ? $testDetail['test_status'] : '';
$id = isset($testDetail['pk_test_id']) ? '/' . $testDetail['pk_test_id'] : '';

$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'question_form');
echo form_open(base_url('admin/test/save' . $id), $attributes);
?> 
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question">Title<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="answer" required="required" name="test_title" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $titleVal; ?>">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <textarea name="test_descp" class="form-control" rows="3" placeholder="Title Description"><?php echo $descpVal; ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div id="status" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default <?php
            if ($statusVal == 'active') {
                echo 'active';
            }
            ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input name="test_status" value="active" <?php
                if ($statusVal == 'active') {
                    echo 'checked=""';
                }
                ?> type="radio" required=""> Active
            </label>
            <label class="btn btn-primary <?php
            if ($statusVal == 'inactive') {
                echo 'active';
            }
            ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input name="test_status" value="inactive" <?php
                if ($statusVal == 'inactive') {
                    echo 'checked=""';
                }
                ?> type="radio" required=""> Inactive
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="reset" class="btn btn-primary">Cancel</button>
        <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
    </div>
</div>

<?php
echo form_close();
?>