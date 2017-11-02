<table class="table table-striped">
    <thead>
        <tr>
            <th width="25%">Title</th>
            <th width="70%">Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($trainingList as $training) {
            ?>
            <tr>
                <td><?php echo substr($training['training_title'], 0, 40); ?></td>
                <td><?php echo substr($training['training_descp'], 0, 135); ?></td>
                <td>
                    <ul>
                        <a href="<?php echo base_url('training/detail/' . $training['pk_training_id']); ?>"><i class="fa fa-file-o"></i></a>
                    </ul>

                </td>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>