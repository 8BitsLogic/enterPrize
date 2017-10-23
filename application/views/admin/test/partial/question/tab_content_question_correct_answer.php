<?php
$id = isset($questionDetail['pk_question_id']) ? '/' . $questionDetail['pk_question_id'] : '';
?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Select correct answer for this question.</h4>
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
                    <div class="col-md-12 alert alert-info"> <b>Chosen Answer:<i> <?php echo $questionDetail['answer_descp']; ?></i> </b></div>
                        <?php
                    }
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'question_choices_selected_form');
                    echo form_open(base_url('admin/test/question/choice' . $id . '/correct'), $attributes);
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
                                        <input name="correct-choice" value="<?php echo $questionChoice['pk_answer_id']; ?>" type="radio"> <?php echo $questionChoice['answer_descp']; ?>
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

</div>