<?php

function assignClassColor($value) {
    $greenClass = 'green';
    $redClass = 'red';
    return $value > 0 ? $greenClass : $redClass;
}

function assignClassSort($value) {
    $sortClassA = 'fa-sort-asc';
    $sortClassD = 'fa-sort-desc';
    return $value > 0 ? $sortClassA : $sortClassD;
}
?>
<!-- top tiles -->
<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Leads for year <?php echo date('Y'); ?></span>
        <div class="count"><?php echo $leadCount['cYear']['count'] ?></div>
        <span class="count_bottom">
            <i class="<?php echo assignClassColor($leadCount['pYear']['compPercent']); ?>"><i class="fa <?php echo assignClassSort($leadCount['pYear']['compPercent']); ?>"></i><?php echo $leadCount['pYear']['compPercent'] ?>% </i> From last Year</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> orders <?php echo date('Y'); ?></span>
        <div class="count"><?php echo $confirmedLeadCount['cYear']['count']; ?></div>
        <span class="count_bottom"><i class="<?php echo assignClassColor($confirmedLeadCount['pYear']['compPercent']); ?>"><i class="fa <?php echo assignClassSort($confirmedLeadCount['pYear']['compPercent']); ?>"></i><?php echo $confirmedLeadCount['pYear']['compPercent'] ?>% </i> From last Year</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Leads for month <?php echo date('M-y'); ?></span>
        <div class="count green"><?php echo $leadCount['cMonth']['count'] ?></div>
        <span class="count_bottom"><i class="<?php echo assignClassColor($leadCount['pMonth']['compPercent']); ?>"><i class="fa <?php echo assignClassSort($leadCount['pMonth']['compPercent']); ?>"></i><?php echo $leadCount['pMonth']['compPercent'] ?>% </i> From last month</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> orders <?php echo date('M-y'); ?></span>
        <div class="count green"><?php echo $confirmedLeadCount['cMonth']['count']; ?></div>
        <span class="count_bottom"><i class="<?php echo assignClassColor($confirmedLeadCount['pMonth']['compPercent']); ?>"><i class="fa <?php echo assignClassSort($confirmedLeadCount['pMonth']['compPercent']); ?>"></i><?php echo $confirmedLeadCount['pMonth']['compPercent'] ?>% </i> From last month</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Leads for this week</span>
        <div class="count blue"><?php echo $leadCount['cWeek']['count'] ?></div>
        <span class="count_bottom"><i class="<?php echo assignClassColor($leadCount['pWeek']['compPercent']); ?>"><i class="fa <?php echo assignClassSort($leadCount['pWeek']['compPercent']); ?>"></i><?php echo $leadCount['pWeek']['compPercent'] ?>% </i> From last week</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Orders for this week</span>
        <div class="count blue"><?php echo $confirmedLeadCount['cWeek']['count']; ?></div>
        <span class="count_bottom"><i class="<?php echo assignClassColor($confirmedLeadCount['pWeek']['compPercent']); ?>"><i class="fa <?php echo assignClassSort($confirmedLeadCount['pWeek']['compPercent']); ?>"></i><?php echo $confirmedLeadCount['pWeek']['compPercent'] ?>% </i> From last week</span>
    </div>
</div>
<!-- /top tiles -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Network Activities <small>Graph title sub-title</small></h3>
                </div>
                <!--                  <div class="col-md-6">
                                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                    </div>
                                  </div>-->
            </div>

            <div class="col-md-9 col-sm-9 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                <div style="width: 100%;">
                    <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                <div class="x_title">
                    <h2>Top Performer</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-6">
                    <?php
                    if (!$topPerformers) {
                        ?>
                        <h3 class="alert alert-info">No data</h3>
                        <?php
                    } else {
                        ?>

                        <?php
                        foreach ($topPerformers['year_to_date_performers'] as $tpKey => $tpVal) {
                            ?>
                            <div>
                                <p><a href="<?php echo base_url('admin/agent/detail/' . $tpVal['fk_agent_id']) ?>"><?php echo $tpVal['agent_username']; ?></a></p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $tpVal['lead_count'] / $topPerformers['year_to_date_leads'] * 100; ?>"></div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

</div>
<br />

<div class="row">
    <!--
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Product Targets</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h4>Product target achieved year <?php echo date('Y'); ?></h4>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Product 1</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>123k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
    
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Product 2</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>53k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Product 1</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>23k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Product 3</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>3k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Product 4</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>1k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
    
                </div>
            </div>
        </div>-->


    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile fixed_height_320 overflow_hidden">
            <div class="x_title">
                <h2>Leads generated for year <?php echo date('Y') ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                if (count($productLeads) > 1) {
                    ?>
                    <table class="" style="width:100%">
                        <tr>
                            <th style="width:37%;">
                                <p>Pie Chart</p>
                            </th>
                            <th>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <p class="">Product</p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <p class="">Percent</p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <canvas id="productPieChart" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <?php
                                    foreach ($productLeads['product_lead_count'] as $pKey => $pVal) {
                                        ?>
                                        <tr>
                                            <td>
                                                <p><i class="fa fa-square " style="color: <?php echo '#' . $pVal['colorCode1']; ?>"></i><?php echo substr($pVal['product_title'], 0, 15); ?></p>
                                            </td>
                                            <td><?php echo $pVal['percent']; ?>%</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <?php
                } else {
                    ?>
                    <h3 class="alert alert-info">No data</h3>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>



</div>
