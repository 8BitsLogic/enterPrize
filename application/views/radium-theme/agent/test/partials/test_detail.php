<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="sec-title">
                <h2 class="default-title text-uppercase"><?php echo $testDetail['test_title']; ?></h2>
            </div>
            <div class="text text-justify">
                <?php echo $testDetail['test_descp']; ?>
            </div>
        </div>
    </div>
</section>

<section class="default-section featured-three-col">
    <div class="auto-container">

        <!--Section Title-->
        <div class="sec-title main-title">
            <h4 class="default-title">This test is step towards unlocking below products.</h4>
        </div>
        <?php
        if (!$testProducts) {
            ?>
            <h4 class="col-md-12 alert alert-warning">No data found</h4>
            <?php
        } else {
            $this->load->view($view . '../product/partials/product_grid', array('productList' => $testProducts));
        }
        ?>
    </div>
</section>