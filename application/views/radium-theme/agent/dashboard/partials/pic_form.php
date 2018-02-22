<div class="col-sm-12">
    <?php
    $attributes = array('class' => "", 'id' => "agent_pass_form");
    echo form_open_multipart(base_url('dashboard/uploadpic'), $attributes);
    ?>
    <div class="row">
        <div class="col-sm-8 form-group">
            <label class="control-label" for="pic">Upload Picture <span class="required">*</span></label>
            <input id="pic" class="form-control" name="pic" type="file" value="" >
        </div>
    </div>                      
    <div class="row">
        <div class="form-group">
            <ul class="list-unstyled list-inline text-center pad-top-xs">
                <li><button type="submit" name="submit" value="submit" class="btn btn-info next-step">Submit</button></li>
            </ul>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>