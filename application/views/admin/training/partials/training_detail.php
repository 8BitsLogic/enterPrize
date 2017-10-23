<div class="row">
    <div class="animated flipInY col-md-12 col-sm-12 col-xs-12">
        <div class="tile-stats">
            <h3><?php echo $trainingDetail['training_title']; ?></h3>
            <p><?php echo $trainingDetail['training_descp']; ?></p>
        </div>
    </div>
</div>
<div class="row">
    <?php $this->load->view('admin/training/partials/training_extras'); ?>
</div>