<div class="col-sm-12">
    <?php
    $attributes = array('class' => "", 'id' => "agent_pass_form");
    echo form_open(base_url('dashboard/updatepass'), $attributes);
    ?>
    <div class="row">
        <div class="col-sm-8 form-group">
            <label class="control-label" for="pass">Password <span class="required">*</span></label>
            <input id="pass" class="form-control" name="pass" type="password" value="" >
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-8 ">
            <label class="control-label" for="pass_match">Confirm Password <span class="required">*</span></label>
            <input id="pass_match" class="form-control" name="pass_match" type="password" value="" >
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