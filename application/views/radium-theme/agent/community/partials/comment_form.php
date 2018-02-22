<div class="row">
    <div class="col-md-12">
        <h5 class="col-md-12 text-primary">Post Comment</h5>
        <div class="error">
            <?php echo validation_errors(); ?>
        </div>
        <?php
        $attributes = array('id' => "comment_form", 'data-parsley-validate' => "", 'class' => "form-horizontal form-label-left", 'novalidate' => "");
        echo form_open(base_url('community/post/' . $postDetail['pk_post_id'] . '/save_comment'), $attributes);
        ?>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Comment <span class="required">*</span></label>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea id="descp" required="" class="form-control col-md-7 col-xs-12" name="descp"><?php echo set_value('descp') ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <button type="submit" name="submit" value="submit" class="btn pull-right">Submit</button>
            </div>
        </div>
        <?php
        echo form_close();
        ?>

    </div>

</div>