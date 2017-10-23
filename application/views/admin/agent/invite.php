<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Invite Agent</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-5">
                    <div class="x_panel">
                        <div class="x_content">
                            <?php
                            echo $this->session->flashdata('message_agent');
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'invite_agent_form');
                                    echo form_open(base_url('admin/agent/invite/send'), $attributes);
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" required="required" class="form-control col-md-7 col-xs-12" type="text" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" type="email">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">Cancel</button>
                                            <button type="submit" value="submit" name="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                    <?php
                                    form_close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="x_panel">
                        <div class="x_content">
                            <?php
                            if (!$inviteList) {
                                ?>
                                <h4 class=" alert alert-warning">No invites found</h4>
                                <?php
                            } else {
                                ?>
                                <table class="data table table-striped no-margin">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($inviteList as $invite) {
                                            ?>
                                            <tr>
                                                <td><?php echo $invite['invite_email']; ?></td>
                                                <td><?php echo $invite['invite_name']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($invite['invite_create_date'])); ?></td>
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




            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>