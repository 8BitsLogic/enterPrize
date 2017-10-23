<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>Test Edit</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-4">
                    <?php
                    if (isset($testDetail)) {
                        $this->load->view('admin/test/partial/test/test');
                    }
                    ?>
                </div>
                <div class="col-md-8">
                    <?php
                    echo $this->session->flashdata('message_test');
                    ?>
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#test_tab_content" id="test_tab" role="tab" data-toggle="tab" aria-expanded="true">Test</a></li>
                            <?php
                            if (isset($testDetail['pk_test_id'])) {
                                ?>
                                <li role="presentation" class=""><a href="#question_tab_content" role="tab" id="questions_tab" data-toggle="tab" aria-expanded="false">Select Questions</a></li>
                                <li role="presentation" class=""><a href="#product_tab_content" role="tab" id="product_tab" data-toggle="tab" aria-expanded="false">Products</a></li>
                                <?php
                            }
                            ?>

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="test_tab_content" aria-labelledby="test_tab">
                                <?php
                                $this->load->view('admin/test/partial/test/tab_content_test');
                                ?>
                            </div>
                            <?php
                            if (isset($testDetail['pk_test_id'])) {
                                ?>
                                <div role="tabpanel" class="tab-pane fade" id="question_tab_content" aria-labelledby="questions_tab">
                                    <?php
                                    $this->load->view('admin/test/partial/test/tab_content_questions');
                                    ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="product_tab_content" aria-labelledby="product_tab">
                                    <?php
                                    $this->load->view('admin/test/partial/test/tab_content_product');
                                    ?>
                                </div>

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
