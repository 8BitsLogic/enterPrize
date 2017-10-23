<?php
if (is_array($testQuestionList)) {
    ?>
    <div class="row">
        <div class="animated flipInY col-md-12 col-sm-12 col-xs-12">
            <div class="tile-stats">
                <h3><i class="icon-align-left fa fa-question-circle-o"></i> Questions </h3>
                <?php
                foreach ($testQuestionList as $testQuestion) {
                    if (isset($testQuestion['question_descp'])) {
                        ?>
                        <p><i class="icon-align-left fa fa-question-circle-o"></i> <?php echo $testQuestion['question_descp']; ?></p>
                        <?php
                    }
                    if (isset($testQuestion['answer_descp'])) {
                        ?>
                        <p><i class="icon-align-left fa fa-check-square-o"></i> <?php echo $testQuestion['answer_descp']; ?></p>
                        <?php
                    }else{
                        ?>
                        <p>&nbsp;</p>
                            <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
    <?php
}
