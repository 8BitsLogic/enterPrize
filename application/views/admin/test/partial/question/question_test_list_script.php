<?php
if (is_array($questionTestList)) {
    ?>
    <div class="row">
        <div class="animated flipInY col-md-12 col-sm-12 col-xs-12">
            <div class="tile-stats">
                <h3><i class="icon-align-left fa fa-square-o"></i> Assigned to Test.</h3>
                <?php
                foreach ($questionTestList as $test) {
                    ?>
                    <p><i class="icon-align-left fa fa-square-o"></i> <?php echo $test['test_title']; ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
