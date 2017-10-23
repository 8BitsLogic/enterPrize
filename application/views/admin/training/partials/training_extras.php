
<?php
if (is_array($trainingResources)) {
    ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Training Resources</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="70%">Title</th>
                            <th width="20%">Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($trainingResources as $resource) {
                            ?>
                            <tr>
                                <td><?php echo $resource['resource_title']; ?></td>
                                <td><?php echo $resource['resource_type']; ?></td>
                                <td>
                                    <ul>
                                        <a href="<?php echo base_url('admin/training/' . $trainingDetail['pk_training_id'] . '/resource/remove/' . $resource['pk_resource_id']); ?>"><i class="fa fa-close"></i></a>
                                    </ul>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <?php
}
if (is_array($trainingProducts)) {
    ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Training for Product</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="90%">Title</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($trainingProducts as $product) {
                            ?>
                            <tr>
                                <td><?php echo $product['product_title']; ?></td>
                                <td>
                                    <ul>
                                        <a href="<?php echo base_url('admin/training/' . $trainingDetail['pk_training_id'] . '/product/remove/' . $product['pk_product_id']); ?>"><i class="fa fa-close"></i></a>
                                    </ul>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <?php
}
?>
