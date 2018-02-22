<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="default-section">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">-->
    <div class="auto-container">
        <div class="row clearfix">
            <?php
            echo $this->session->flashdata($flashKey);
            if (validation_errors()) {
                ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
                <?php
            }
            ?>

        </div>
        <div class="row clearfix">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#editProfile">Edit Profile</a></li>
                <li><a data-toggle="tab" href="#updatePassword">Update Password</a></li>
                <li><a data-toggle="tab" href="#changePicture">Change Picture</a></li>
            </ul>

            <div class="tab-content">

                <div id="editProfile" class="tab-pane fade in active">
                    <?php $this->load->view($view . 'partials/profile_form'); ?>
                </div>
                <div id="updatePassword" class="tab-pane fade">
                    <?php $this->load->view($view . 'partials/pass_form'); ?>
                </div>
                <div id="changePicture" class="tab-pane fade">
                    <?php $this->load->view($view . 'partials/pic_form'); ?>
                </div>
            </div>
        </div>

    </div>
</section>