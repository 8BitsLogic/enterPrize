<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Pages List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata('message_cms');
                if (!$pageList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="40%">Title</th>
                                <th width="45%">Alias</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pageList as $page) {
                                $status = $page['page_status'] == 'active' ? 'fa-eye' : 'fa-eye-slash';
                                ?>
                                <tr>
                                    <td><?php echo $page['page_title']; ?></td>
                                    <td><?php echo $page['page_alias']; ?></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/cms/status/' . $page['pk_page_id']); ?>"><i class="fa <?php echo $status; ?>"></i></a>
                                            <!--<a href="<?php echo base_url('admin/cms/detail/' . $page['pk_page_id']); ?>"><i class="fa fa-file-o"></i></a>-->
                                            <a href="<?php echo base_url('admin/cms/edit/' . $page['pk_page_id']); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/cms/delete/' . $page['pk_page_id']); ?>"><i class="fa fa-close"></i></a>
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