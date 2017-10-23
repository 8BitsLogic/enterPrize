<?php $this->load->view('admin/partials/content_title');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Training Detail</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata('message_training');
                if (!$trainingDetail) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?><div class="col-md-12 col-sm-12 col-xs-12 profile_left">
                        <a href="<?php echo base_url('admin/training/edit/' . $trainingDetail['pk_training_id']) ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                        <?php $this->load->view('admin/training/partials/training_detail'); ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>