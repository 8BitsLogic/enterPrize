<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="process">
                    <div class="process-row nav nav-tabs">
                        <div class="process-step">
                            <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="fa fa-edit fa-3x"></i></button>
                            <p><small>Edit<br />Profile</small></p>
                        </div>
                        <div class="process-step">
                            <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="fa fa-newspaper-o fa-3x"></i></button>
                            <p><small>Update<br />Password</small></p>
                        </div>
                        <div class="process-step">
                            <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-picture-o fa-3x"></i></button>
                            <p><small>Profile<br />Picture</small></p>
                        </div>

                    </div>
                </div>
                <div class="tab-content">
                    <div class="row">
                        <?php
                        echo $this->session->flashdata($flashKey);
                        ?>
                        <div class="error">
                            <?php echo validation_errors(); ?>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade active in">
                        <?php $this->load->view($view . 'partials/profile_form'); ?>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <?php $this->load->view($view . 'partials/pass_form'); ?>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <?php $this->load->view($view . 'partials/pic_form'); ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
