<?php
foreach ($trainingList as $training) {
    ?>
    <article class="column icon-column circle-icon-column col-md-4 col-sm-6 col-xs-12">
        <div class="inner-box text-left">
            <h3 class="primary"><?php echo substr($training['training_title'], 0, 39); ?></h3>
            <div class="text"><?php echo substr($training['training_descp'], 0, 180); ?></div>
            <a class="theme-btn radial-btn bg_red pull-right" href="<?php echo base_url('training/detail/' . $training['pk_training_id']); ?>">
                <span class="txt">Training Details</span> <span class="img-circle fa fa-arrow-right"></span>
            </a>
            
        </div>
        <hr>
    </article>
    <?php
}
?>