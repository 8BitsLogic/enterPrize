<?php
if (isset($testDetail['test_title'])) {
    ?>
    <div class="row">
        <div class="animated flipInY col-md-12 col-sm-12 col-xs-12">
            <div class="tile-stats">
                <h3><i class="icon-align-left fa fa-check-square-o"></i> <?php echo $testDetail['test_title']; ?></h3>
                <?php
                if (isset($testDetail['test_descp'])) {
                    ?>
                    <p><?php echo $testDetail['test_descp']; ?></p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
