<?php
$id = isset($questionDetail['pk_question_id']) ? '/' . $questionDetail['pk_question_id'] : '';
?>

<div class="row">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h4>Selected choices</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                if (!$questionChoicesList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found.</h4>  
                    <?php
                } else {
                    $selectedChoices = array();
                    if (isset($questionDetail['answer_descp'])) {
                        ?>
                    <span class="col-md-12 alert alert-info"><b>Chosen Answer:<i> <?php echo $questionDetail['answer_descp']; ?></i></b></span>
                        <?php
                    }
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'question_choices_selected_form');
                    echo form_open(base_url('admin/test/question/choice' . $id . '/remove'), $attributes);
                    ?>
                    <div class = "form-group">
                        <div class = "col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php
                            foreach ($questionChoicesList as $questionChoice) {
                                array_push($selectedChoices, $questionChoice['pk_answer_id']);
                                if ($questionChoice['pk_answer_id'] == $questionDetail['fk_answer_id']) {
                                    continue;
                                }
                                ?>
                                <div class="checkbox">
                                    <label>
                                        <input name="choices[]" value="<?php echo $questionChoice['pk_answer_id']; ?>" type="checkbox"> <?php echo $questionChoice['answer_descp']; ?>
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
                            <button type = "submit" name = "submit" value = "submit" class = "btn btn-success">Submit</button>
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
                <h4>Available choices</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                if (!$answerList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No unique option available.</h4>  
                    <?php
                } else {
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'question_choices_to_select_form');
                    echo form_open(base_url('admin/test/question/choice' . $id . '/add'), $attributes);
                    ?> 
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="select2_multiple form-control select2-hidden-accessible" multiple="" name="choices[]" aria-hidden="true">
                                <option disabled="">Select Multiple choices</option>
                                <?php
                                foreach ($answerList as $answer) {
                                    if(in_array($answer['pk_answer_id'], $selectedChoices)){
                                        continue;
                                    }
                                    ?>
                                    <option value="<?php echo $answer['pk_answer_id']; ?>"><?php echo $answer['answer_descp']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
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
                }
                ?>

            </div>
        </div>
    </div>

</div>