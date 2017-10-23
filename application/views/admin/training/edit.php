<?php $this->load->view('admin/partials/content_title'); ?>
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
                    ?>
                    <div class="col-md-5 col-sm-5 col-xs-12 profile_left">                        
                        <?php $this->load->view('admin/training/partials/training_detail'); ?>
                    </div>


                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_training" role="tab" id="training-tab" data-toggle="tab" aria-expanded="false">Training</a></li>
                                <li role="presentation" class=""><a href="#tab_resources" role="tab" id="resources-tab" data-toggle="tab" aria-expanded="false">Resources</a></li>
                                <li role="presentation" class=""><a href="#tab_products" role="tab" id="product-tab" data-toggle="tab" aria-expanded="false">Products</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in " id="tab_training" aria-labelledby="training-tab">
                                    <?php $this->load->view('admin/training/partials/tab_content_training_form'); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade " id="tab_resources" aria-labelledby="resources-tab">                              
                                    <?php $this->load->view('admin/training/partials/tab_content_training_resource_form'); ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_products" aria-labelledby="product-tab">
                                    <?php $this->load->view('admin/training/partials/tab_content_training_product'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>
