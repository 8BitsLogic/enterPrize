<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>New Product</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                $this->load->view('admin/product/partials/product_form');
                ?>
                
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>