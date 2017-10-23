<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Forms List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$formList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="80%">Lead Form Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($formList as $form) {
                                ?>
                                <tr>
                                    <td><?php echo $form['form_title']; ?></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/form_builder/form/edit/'.$form['pk_form_id']); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/form_builder/form/delete/'.$form['pk_form_id']); ?>"><i class="fa fa-close"></i></a>
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