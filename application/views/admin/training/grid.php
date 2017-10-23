<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Training List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata('message_training');
                if (!$triningList) {
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
                            foreach ($triningList as $training) {
                                $status = $training['training_status'] == 'active' ? 'fa-eye' : 'fa-eye-slash'; 
                                ?>
                                <tr>
                                    <td><?php echo substr($training['training_title'], 0, 30); ?></td>
                                    <td><?php echo substr($training['training_descp'], 0, 100); ?></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/training/status/'.$training['pk_training_id']); ?>"><i class="fa <?php echo $status; ?>"></i></a>
                                            <a href="<?php echo base_url('admin/training/detail/'.$training['pk_training_id']); ?>"><i class="fa fa-file-o"></i></a>
                                            <a href="<?php echo base_url('admin/training/edit/'.$training['pk_training_id']); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/training/delete/'.$training['pk_training_id']); ?>"><i class="fa fa-close"></i></a>
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