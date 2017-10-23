<?php
if (is_array($questionChoicesList)) {
    ?>
    <div class="row">
        <div class="animated flipInY col-md-12 col-sm-12 col-xs-12">
            <div class="tile-stats">
                <h3><i class="icon-align-left fa fa-square-o"></i> Other Choices</h3>
                <?php
                foreach ($questionChoicesList as $answerS) {
                    if(isset($questionDetail['fk_answer_id']) && $questionDetail['fk_answer_id'] == $answerS['pk_answer_id']){
                        continue;
                    }
                    ?>
                    <p><i class="icon-align-left fa fa-square-o"></i> <?php echo $answerS['answer_descp']; ?></p>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    <?php
}
?>

