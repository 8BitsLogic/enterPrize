<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="error">
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php
                        
                        $attributes = array('id' => "post_form", 'data-parsley-validate' => "", 'class' => "form-horizontal form-label-left", 'novalidate' => "");
                        echo form_open(base_url('community/save_post'), $attributes);
                        ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input id="title" required="" class="form-control col-md-7 col-xs-12" name="title" type="text" value="<?php echo set_value('title') ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description <span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea  id="descp" required="" class="form-control col-md-7 col-xs-12" name="descp"><?php echo set_value('descp') ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-10">
                                <button type="reset" class="btn btn-info next-step">Cancel</button>
                                <button type="submit" name="submit" value="submit" class="btn btn-info next-step">Submit</button>
                            </div>
                        </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>