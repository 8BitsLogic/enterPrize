<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All E-mail List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$emailList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="80%">Subject</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($emailList as $email) {
                                ?>
                                <tr>
                                    <td><?php echo $email['email_subject']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/email_cms/view/'.$email['pk_email_id']); ?>"><i class="fa fa-clipboard"></i></a>
                                        <a href="<?php echo base_url('admin/email_cms/edit/'.$email['pk_email_id']); ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url('admin/email_cms/delete/'.$email['pk_email_id']); ?>"><i class="fa fa-close"></i></a>
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