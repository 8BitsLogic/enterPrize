<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="<?php echo $value['field_attribute_name']; ?>"><?php
        echo ucwords($value['field_attribute_name']);
        echo $value['field_attribute_required'] ? ' <span class="required">*</span>' : ''
        ?> </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="<?php echo $value['field_attribute_name']; ?>" <?php echo $value['field_attribute_required'] ? 'required="required"' : '' ?> class="form-control col-md-7 col-xs-12" name="<?php echo $value['field_attribute_name']; ?>" value="" type="text">
    </div>
</div>