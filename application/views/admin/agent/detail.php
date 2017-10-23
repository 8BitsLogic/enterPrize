<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Agent Detail: <?php echo $agentDetail['agent_username']; ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata('agent_message');
                if (!$agentDetail) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" src="<?php echo $this->themeUrl; ?>/images/avatar.bmp" alt="Avatar" title="Change the avatar">
                            </div>
                        </div>
                        <h3><?php echo $agentDetail['agent_first_name'] . ' ' . $agentDetail['agent_last_name'] ?></h3>

                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $agentDetail['agent_current_city']; ?></li>
                            <li><i class="fa fa-envelope user-profile-icon"></i> <?php echo $agentDetail['agent_email']; ?></li>
                            <li class="m-top-xs"><i class="fa fa-phone user-profile-icon"></i> <?php echo $agentDetail['agent_phone']; ?></li>
                        </ul>

                        <a class="btn btn-success" href="<?php echo base_url('admin/agent/edit/'.$agentDetail['pk_agent_id']); ?>"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                        <br />

                        <!-- start skills -->
                        <h4><?php echo date('M-y'); ?> Overview </h4>
                        <ul class="list-unstyled user_data">
                            <li>
                                <p>Leads Captured</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                </div>
                            </li>
                            <li>
                                <p>Sales</p>
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                </div>
                            </li>
                        </ul>
                        <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                                </li>
                                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in " id="tab_content2" aria-labelledby="profile-tab">

                                    <!-- start user projects -->
                                    <table class="data table table-striped no-margin">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Month</th>
                                                <th>Leads</th>
                                                <th>Sales</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Product 1</td>
                                                <td><?php echo date('M-Y') ?></td>
                                                <td>100</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>Product 2</td>
                                                <td><?php echo date('M-Y') ?></td>
                                                <td>100</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>Product 3</td>
                                                <td><?php echo date('M-Y') ?></td>
                                                <td>100</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>Product 4</td>
                                                <td><?php echo date('M-Y') ?></td>
                                                <td>100</td>
                                                <td>100</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- end user projects -->

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                    <?php $this->load->view('admin/agent/partial_tab_content_agent_profile'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>