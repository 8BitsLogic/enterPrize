<?php
if ($slideList) {
    ?>
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <!--        <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>-->
            <div class="carousel-inner" role="listbox">
                <?php
                foreach ($slideList as $slide) {
                    $img = $slide["slide_link"];
                    ?>
                    <div class="carousel-item active" style="background-image: url('<?php echo $img ?>')">
                        <div class="carousel-caption d-none d-md-block">
                            <!--                    <h3>First Slide</h3> -->
                                                <!--<p>This is a description for the first slide.</p>-->
                        </div>
                    </div>
                    <?php
                }
                ?>
<!--                
                 Slide One - Set the background image for this slide in the line below 
                <div class="carousel-item active" style="background-image: url('<?php echo $this->themeUrl . '/images/slides/1.jpg'; ?>')">
                    <div class="carousel-caption d-none d-md-block">
                                            <h3>First Slide</h3> 
                                            <p>This is a description for the first slide. <?php echo $this->themeUrl . '/images/slides/1.jpg'; ?></p>
                    </div>
                </div>
                 Slide Two - Set the background image for this slide in the line below 
                <div class="carousel-item" style="background-image: url('<?php echo $this->themeUrl . '/images/slides/1.jpg'; ?>')">
                    <div class="carousel-caption d-none d-md-block">
                                            <h3>Second Slide</h3>
                                            <p>This is a description for the second slide.</p>
                    </div>
                </div>
                 Slide Three - Set the background image for this slide in the line below 
                <div class="carousel-item" style="background-image: url('<?php echo $this->themeUrl . '/images/slides/1.jpg'; ?>')">
                    <div class="carousel-caption d-none d-md-block">
                                            <h3>Third Slide</h3>
                                            <p>This is a description for the third slide.</p>
                    </div>
                </div>-->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <?php
}
?>
