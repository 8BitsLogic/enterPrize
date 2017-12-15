<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Email</h2>
                <a class="pull-right btn btn-primary" href="<?php echo base_url('admin/email_cms/view/'.$emailDetail['pk_email_id'])?>"><i class="fa fa-binoculars">Prevew</i></a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                $this->load->view($view.'partials/email_form');
                ?>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>