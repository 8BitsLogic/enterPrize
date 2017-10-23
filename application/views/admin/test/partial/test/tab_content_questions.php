<?php
$id = isset($testDetail['pk_test_id']) ? '/' . $testDetail['pk_test_id'] : '';
?>

<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h4>Selected Questions</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                if (!$testQuestionList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found.</h4>  
                    <?php
                } else {
                    $selectedChoices = array();
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'test_question_selected_form');
                    echo form_open(base_url('admin/test/choice' . $id . '/remove'), $attributes);
                    ?>
                    <div class = "form-group">
                        <div class = "col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php
                            foreach ($testQuestionList as $questionK) {
                                array_push($selectedChoices, $questionK['fk_question_id']);
                                ?>
                                <div class="checkbox">
                                    <label>
                                        <input name="questions[]" value="<?php echo $questionK['fk_question_id']; ?>" type="checkbox"> <?php echo $questionK['question_descp']; ?>
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

    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h4>Available Questions</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                if (!$questionList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No unique option available.</h4>  
                    <?php
                } else {
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'question_list_to_select_form');
                    echo form_open(base_url('admin/test/choice' . $id . '/add'), $attributes);
                    ?> 
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="select2_multiple form-control select2-hidden-accessible" multiple="" name="questions[]" aria-hidden="true">
                                <option disabled="">Select Multiple choices</option>
                                <?php
                                foreach ($questionList as $quesiton) {
                                    if(in_array($quesiton['pk_question_id'], $selectedChoices)){
                                        continue;
                                    }
                                    ?>
                                    <option value="<?php echo $quesiton['pk_question_id']; ?>"><?php echo $quesiton['question_descp']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="reset" class="btn btn-primary">Cancel</button>
                            <button type="submit" name="submit" value="submit" class="btn btn-success">Add</button>
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