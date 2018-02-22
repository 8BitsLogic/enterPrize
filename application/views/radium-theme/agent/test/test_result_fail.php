<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>Test Result</h3>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <?php
                                        if ($attempt['pass']) {
                                            ?>
                                            <h4 class="alert alert-success">Test cleared . show certificate here</h4>
                                            <?php
                                        } else {
                                            ?>
                                            <h4 class="alert alert-warning">You had <?php echo $attempt['correct'] . '/' . $attempt['total']; ?> correct answers. <a href="<?php echo base_url('test/take_test/' . $attempt['test_id']) ?>">Try again</a>.</h4>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if (count($attempt['wrongQuestions']) > 0) {
                                        ?>
                                        <div class="x_content">
                                            <h4 class="text-primary">Correct answers are not provided for below questions. </h4>
                                            <?php
                                            foreach ($attempt['wrongQuestions'] as $kQuestion => $vQuestion) {
                                                ?>
                                            
                                                <p><i class="fa fa-question"></i> <?php echo $vQuestion; ?></p>
                                                <?php
                                            }
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
    </div>
</section>

