<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3><?php echo $page['title']; ?></h3>
                    </div>
                    <div class="x_content">
                        <?php
                        if (!$productList) {
                            ?>
                            <h4 class="col-md-12 alert alert-warning">No data found</h4>
                            <?php
                        } else {
                            $this->load->view($view . 'partials/product_grid');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>