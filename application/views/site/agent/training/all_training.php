<div class="main-banner text-center" style="background-color: grey ">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1><?php echo $page['title']; ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <?php
                        if (!$trainingList) {
                            ?>
                            <h4 class="col-md-12 alert alert-warning">No data found</h4>
                            <?php
                        } else {
                            $this->load->view($view . 'partials/training_grid');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>