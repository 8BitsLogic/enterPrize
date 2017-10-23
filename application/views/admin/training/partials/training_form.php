<?php
$trainingDataSession = $this->session->flashdata('data_training');
$trainingInfo['title'] = isset($trainingDataSession['title']) ? $trainingDataSession['title'] : isset($trainingDetail['training_title'])? $trainingDetail['training_title'] : '';
$trainingInfo['descp'] = isset($trainingDataSession['descp']) ? $trainingDataSession['descp'] : isset($trainingDetail['training_descp'])? $trainingDetail['training_descp']  : '';
$trainingInfo['status'] = isset($trainingDataSession['status']) ? $trainingDataSession['status'] : isset($trainingDetail['training_status'])? $trainingDetail['training_status'] : '';

$attributes = array('class' => 'form-horizontal form-label-left', 'id' => "training-form", 'data-parsley-validate' => "");
$postUrl = isset($trainingDetail['pk_training_id']) ? 'admin/training/save/'.$trainingDetail['pk_training_id'] : 'admin/training/save';
echo form_open(base_url($postUrl), $attributes);
?>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="title" name="title" required="required" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $trainingInfo['title']; ?>">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <textarea class="form-control" name="descp" rows="3" placeholder="Training Description"><?php echo $trainingInfo['descp']; ?></textarea>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div id="status" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default <?php
            if ($trainingInfo['status'] == 'active') {
                echo 'active';
            }
            ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input name="status" value="active" <?php
                if ($trainingInfo['status'] == 'active') {
                    echo 'checked=""';
                }
                ?> type="radio" required=""> Active
            </label>
            <label class="btn btn-primary <?php
            if ($trainingInfo['status'] == 'inactive') {
                echo 'active';
            }
            ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input name="status" value="inactive" <?php
                if ($trainingInfo['status'] == 'inactive') {
                    echo 'checked=""';
                }
                ?> type="radio" required=""> Inactive
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
