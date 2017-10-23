<?php $this->load->view('admin/partials/content_title');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Product Detail</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$productDetail) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?><div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="<?php echo base_url('admin/product/edit/' . $productDetail['pk_product_id']) ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                        <div class="row">
                            <?php $this->load->view($view . 'partials/product_detail'); ?>
                        </div>
                        <div class="row">
                            <?php $this->load->view($view.'partials/product_leads'); ?>
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