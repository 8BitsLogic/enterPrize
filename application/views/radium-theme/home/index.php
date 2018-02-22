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
                    <!-- start of main-banner -->
                    <div class="main-banner bg-img-full section text-center" style="background-image: url(images/img_5445.jpg);">

                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h1 class="heading text-uppercase">Introducing<br /> <span class="main-color">byob</span><span style="color: darkgrey;">LTD</span></h1>
                                    <span class="divider main-bg-color"></span>
                                    <p style="color: darkgray;">learn, Earn , Grow</p>
                                    <div id="imaginary_container">
                                        <div class="input-group stylish-input-group">
                                            <input type="text" class="form-control" placeholder="Search Here">
                                            <span class="input-group-addon">
                                                <button type="submit">
                                                    <span class="fa fa-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of main-banner -->
                    <?php
                }
                ?>

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
