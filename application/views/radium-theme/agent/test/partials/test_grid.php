<?php
foreach ($testList as $test) {
    ?>
    <article class="column icon-column circle-icon-column col-md-4 col-sm-6 col-xs-12">
        <div class="inner-box text-left">
            <h3 class="primary"><?php echo substr($test['test_title'], 0, 40); ?></h3>
            <div class="text"><?php echo substr($test['test_descp'], 0, 200); ?></div>
            <a class="theme-btn radial-btn bg_red" href="<?php echo base_url('test/detail/' . $test['pk_test_id']); ?>"><span class="txt">Test Details</span> <span class="img-circle fa fa-arrow-right"></span></a>
        </div>
    </article>
    <?php
}
?>