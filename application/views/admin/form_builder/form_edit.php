<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Edit Form</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo $this->session->flashdata($flashKey); ?>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="x_title">
                            <h4>Lead Form Title </h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php $this->load->view($view . 'partials/form_partial'); ?>
                        </div>
                    </div>
                    <?php
                    if ($formFieldList) {
                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="x_title">
                                <h4>Form Field Set </h4>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php $this->load->view($view . 'partials/form_field_set'); ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($fieldList) {
                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="x_title">
                                <h4>Available Fields  </h4>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php $this->load->view($view . 'partials/form_fields_available'); ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>