<?php
$questionVal = isset($questionDetail['question_descp']) ? $questionDetail['question_descp'] : '';
$statusVal = isset($questionDetail['question_status']) ? $questionDetail['question_status'] : '';
$id = isset($questionDetail['pk_question_id']) ? '/' . $questionDetail['pk_question_id'] : '';

$attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'question_form');
echo form_open(base_url('admin/test/question/save' . $id), $attributes);
?> 
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question">Question<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="answer" required="required" name="question" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $questionVal; ?>">
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
                <input name="status" value="active" <?php
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
                <input name="status" value="inactive" <?php
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