<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Slides List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$slideList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    $attributes = array('id' => "sort_slide", 'class' => "form-horizontal form-label-left", 'data-parsley-validate' => "", 'novalidate' => "");
                    echo form_open(base_url('admin/slide/sort/save'), $attributes)
                    ?>
                    <div class="">
                        <ul class="to_do">
                            <?php
                            foreach ($slideList as $slide) {
                                ?>
                                <li>
                                    <img class="image img-thumbnail" style="max-height: 100px" src="<?php echo $slide['slide_link']; ?>" >
                                    <input class="col-md-1 pull-right" type="number" name="<?php echo $slide['pk_slide_id']; ?>" value="<?php echo $slide['slide_number']; ?>" >
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    
                    <div class="ln_solid"></div>
                    
                    <div class="form-group">
                        <div class="col-md-2 col-sm-2 col-xs-12 pull-right">
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" name="submit" value="submit" class="btn btn-success">Sort</button>
                        </div>
                    </div>

                    <?php
                    echo form_close();
                }
                ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>