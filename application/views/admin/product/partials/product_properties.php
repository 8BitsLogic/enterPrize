<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="x_title">
        <h2> Product Properties</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">

        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_edit_product" id="edit_product-tab" role="tab" data-toggle="tab" aria-expanded="true">Edit Product</a></li>
                <li role="presentation" class=""><a href="#tab_training" id="training-tab" role="tab" data-toggle="tab" aria-expanded="false">Assign Training</a></li>
                <li role="presentation" class=""><a href="#tab_test" id="test-tab" role="tab" data-toggle="tab" aria-expanded="false">Assign Test</a></li>
                <li role="presentation" class=""><a href="#tab_lead_form" id="lead_form-tab" role="tab" data-toggle="tab" aria-expanded="false">Lead Form</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_edit_product" aria-labelledby="edit_product-tab">
                    <?php $this->load->view($view.'partials/product_form'); ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_training" aria-labelledby="training-tab">
                    <?php $this->load->view($view.'partials/tab_content_trainings'); ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_test" aria-labelledby="test-tab">
                    <?php $this->load->view($view.'partials/tab_content_test'); ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_lead_form" aria-labelledby="lead_form-tab">
                    <?php $this->load->view($view.'partials/tab_content_lead_form'); ?>
                </div>
            </div>
        </div>

    </div>

</div>