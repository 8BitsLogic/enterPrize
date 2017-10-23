<?php
$id = isset($questionDetail['pk_question_id']) ? '/' . $questionDetail['pk_question_id'] : '';
?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Assigned Tests for Question.</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                if (!$questionTestList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found.</h4>  
                    <?php
                } else {
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'question_test_selected_form');
                    echo form_open(base_url('admin/test/question/choice' . $id . '/remove-test'), $attributes);
                    ?>
                    <div class = "form-group">
                        <div class = "col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php
                            foreach ($questionTestList as $questionTest) {
                                ?>
                                <div class="checkbox">
                                    <label>
                                        <input name="test-list[]" value="<?php echo $questionTest['fk_test_id']; ?>" type="checkbox"> <?php echo $questionTest['test_title']; ?>
                                    </label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class = "form-group">
                        <div class = "col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type = "reset" class = "btn btn-primary">Cancel</button>
                            <button type = "submit" name = "submit" value = "submit" class = "btn btn-success">Remove</button>
                        </div>
                    </div>
                    <?php
                    echo form_close();
                }
                ?>
            </div>
        </div>
    </div>

</div>