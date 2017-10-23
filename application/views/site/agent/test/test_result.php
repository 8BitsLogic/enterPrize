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
                                    <h4 class="alert alert-warning">You had <?php echo $attempt['correct'].'/'.$attempt['total']; ?> correct answers. Try again.</h4>
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