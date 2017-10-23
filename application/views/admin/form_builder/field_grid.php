<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Fields List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$fieldList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="40%">Label</th>
                                <th width="45%">Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($fieldList as $field) {
                                ?>
                                <tr>
                                    <td><?php echo $field['field_label']; ?></td>
                                    <td><?php echo $field['field_type']; ?></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/form_builder/field/edit/' . $field['pk_field_id']); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/form_builder/field/delete/' . $field['pk_field_id']); ?>"><i class="fa fa-close"></i></a>
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