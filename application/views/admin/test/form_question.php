<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>Test Question Edit</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-4">
                    <?php
                    if(isset($questionDetail)){
                        $this->load->view('admin/test/partial/question/question');
                    }
                    ?>
                </div>
                <div class="col-md-8">
                    <?php
                    echo $this->session->flashdata('message_question');
                    ?>
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#question_tab_content" id="question_tab" role="tab" data-toggle="tab" aria-expanded="true">Question</a></li>
                            <?php
                            if (isset($questionDetail['pk_question_id'])) {
                                ?>
                                <li role="presentation" class=""><a href="#choices_tab_content" role="tab" id="choices_tab" data-toggle="tab" aria-expanded="false">Select Choices</a></li>
                                <li role="presentation" class=""><a href="#choice_tab_content" role="tab" id="choice_tab" data-toggle="tab" aria-expanded="false">Correct Answer</a></li>
                                <li role="presentation" class=""><a href="#test_tab_content" role="tab" id="test-tab" data-toggle="tab" aria-expanded="false">Test</a></li>
                                <?php
                            }
                            ?>

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="question_tab_content" aria-labelledby="question_tab">
                                <?php
                                $this->load->view('admin/test/partial/question/tab_content_question');
                                ?>
                            </div>
                            <?php
                            if (isset($questionDetail['pk_question_id'])) {
                                ?>
                                <div role="tabpanel" class="tab-pane fade" id="choices_tab_content" aria-labelledby="choices_tab">
                                    <?php
                                    $this->load->view('admin/test/partial/question/tab_content_question_choices');
                                    ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="choice_tab_content" aria-labelledby="choice_tab">
                                    <?php
                                    $this->load->view('admin/test/partial/question/tab_content_question_correct_answer');
                                    ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="test_tab_content" aria-labelledby="test_tab">
                                    <?php
                                    $this->load->view('admin/test/partial/question/tab_content_question_test');
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
