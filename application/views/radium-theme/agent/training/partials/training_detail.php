<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="sec-title">
                <h2 class="default-title text-uppercase"><?php echo $trainingDetail['training_title'];?></h2>
            </div>
            <div class="text text-justify">
                <?php echo $trainingDetail['training_descp']; ?>
            </div>
        </div>
    </div>
</section>

<section class="default-section featured-three-col">
    <div class="auto-container">

        <!--Section Title-->
        <div class="sec-title main-title">
            <h4 class="default-title">This training is for product listed below.</h4>
        </div>
        <?php
        if (!$trainingProducts) {
            ?>
            <h4 class="col-md-12 alert alert-warning">No data found</h4>
            <?php
        } else {
            $this->load->view($view . '../product/partials/product_grid', array('productList' => $trainingProducts));
        }
        ?>
    </div>
</section>