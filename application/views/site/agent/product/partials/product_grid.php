<table class="table table-striped">
    <thead>
        <tr>
            <th width="25%">Title</th>
            <th width="50%">Description</th>
            <th width="10%">Locked/ Unlocked</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($productList as $product) {
            ?>
            <tr>
                <td><?php echo substr($product['product_title'], 0, 40); ?></td>
                <td><?php echo substr($product['product_descp'], 0, 135); ?></td>
                <td><?php echo $product['prd_unlock'] ? 'Unlocked' : 'Locked'; ?></td>
                <td>
                    <ul>
                        <a href="<?php echo base_url('product/detail/' . $product['pk_product_id']); ?>"><i class="fa fa-file-o"></i></a>
                    </ul>

                </td>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>