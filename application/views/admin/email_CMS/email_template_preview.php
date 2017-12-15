<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Preview</h2>
                <a class="pull-right btn btn-primary" href="<?php echo base_url('admin/email_cms/setting/edit/'.$emailPreview['pk_email_setting_id'])?>"><i class="fa fa-edit">Edit</i></a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <?php
               echo $emailPreview['email_template'];
               ?>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>