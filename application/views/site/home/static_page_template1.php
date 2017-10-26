<div class="row">
    <?php
    echo $this->session->flashdata($flashKey);
    ?>
    <div class="col-md-12">
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