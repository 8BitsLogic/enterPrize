<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Products List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$productList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="20%">Title</th>
                                <th width="65%">Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($productList as $product) {
                                $status = $product['product_status'] == 'active' ? 'fa-eye' : 'fa-eye-slash';
                                ?>
                                <tr>
                                    <td><?php echo substr($product['product_title'], 0, 30); ?></td>
                                    <td><?php echo substr($product['product_descp'], 0, 100).'...'; ?></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/product/status/' . $product['pk_product_id']); ?>"><i class="fa <?php echo $status; ?>"></i></a>
                                            <a href="<?php echo base_url('admin/product/detail/' . $product['pk_product_id']); ?>"><i class="fa fa-file-o"></i></a>
                                            <a href="<?php echo base_url('admin/product/edit/' . $product['pk_product_id']); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/product/delete/' . $product['pk_product_id']); ?>"><i class="fa fa-close"></i></a>
                                        </ul>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>