<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="text-primary">Lead# <?php echo isset($leadDetail['pk_lead_id']) ? $leadDetail['pk_lead_id'] : ''; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php
                        echo $this->session->flashdata($flashKey);
                        if (!$leadDetail) {
                            ?>
                            <h4 class="col-md-12 alert alert-warning">No data found</h4>
                            <?php
                        } else {
                            ?><div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="row">
                                            <div class="widget widget_tally_box">
                                                <div class="flex">
                                                    <ul class="list-inline count2">
                                                        <li>
                                                            <h4 class="text-primary">Date</h4>
                                                            <span><?php echo date("d-m-Y", strtotime($leadDetail['lead_craete_date'])); ?></span>
                                                        </li>
                                                        <li>
                                                            <h4 class="text-primary">Status</h4>
                                                            <span><?php echo $leadDetail['lead_status']; ?></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h4 class="text-primary">Updates</h4>
                                                    </div>
                                                    <div class="x_content">
                                                        <?php echo $leadDetail['lead_external_notes']; ?>
                                                        <div class="ln_solid"></div>
                                                    </div>
                                                </div>
                                            </div>
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
    </div>
</section>

