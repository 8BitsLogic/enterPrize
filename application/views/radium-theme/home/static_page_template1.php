<?php $this->load->view($view .'../agent/partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md">
    <div class="container">                 
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-justify">
                <div class="x_panel">
                    <div class="x_title">
                        <h3><?php echo $pageData['page_title']; ?></h3>
                    </div>
                    <div class="x_content">
                        <div class="row center-block">
                            <div class="col-md-12 text-justify">
                                <?php echo $pageData['page_content']; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>