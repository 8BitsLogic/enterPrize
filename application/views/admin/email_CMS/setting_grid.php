<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Templates</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$settingList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="5%">Template #</th>
                                <th width="90%">Template</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($settingList as $setting) {
                                ?>
                                <tr>
                                    <td><?php echo $setting['pk_email_setting_id']; ?></td>
                                    <td><?php echo $setting['email_template']; ?></td>
                                    <td>
                                        <a target="_blank" href="<?php echo base_url('admin/email_cms/setting/view/'.$setting['pk_email_setting_id'])?>"><i class="fa fa-clipboard"></i></a>
                                        <a href="<?php echo base_url('admin/email_cms/setting/edit/'.$setting['pk_email_setting_id'])?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url('admin/email_cms/setting/delete/'.$setting['pk_email_setting_id'])?>"><i class="fa fa-close"></i></a>
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