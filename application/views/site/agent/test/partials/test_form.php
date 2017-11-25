<div class="row">
    <h4 class="text-primary text-center">Test Form</h4>
    <hr>
    <div class="col-md-7 col-md-offset-3">
        <div class="x_content">
            <div class="row">
                <?php
                $attributes = 'id="take-test" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""';
                echo form_open(base_url('test/take_test_submit/' . $testDetail['pk_test_id']), $attributes);
                foreach ($questionList as $question) {
                    ?>

                    <div class="form-group">
                        <div class="query">
                            <h5 class="text-default"><i class="icon-align-left fa fa-question-circle-o"></i> <?php echo $question['question_descp']; ?></h5>
                        </div>
                        <div class="choice">
                            <ul class="to_do">
                                <?php
                                foreach ($choiceList[$question['fk_question_id']] as $choices) {
                                    ?>
                                    <li>
                                        <input type="radio" name="question[<?php echo $question['fk_question_id']; ?>]" value="<?php echo $choices['pk_answer_id']; ?>" />
                                        <?php echo $choices['answer_descp']; ?> 
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                        <button type="submit" name="submit" value="submit" class="btn btn-default next-step">Submit</button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

