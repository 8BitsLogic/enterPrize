<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>Test Details</h2> 
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="col-md-4">
                <a href="<?php echo base_url('admin/test/edit/'.$testDetail['pk_test_id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                <?php $this->load->view('admin/test/partial/test/test'); ?>
            </div>

        </div>
    </div>
</div>