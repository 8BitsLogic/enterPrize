<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="<?php echo $value['field_attribute_name']; ?>"><?php
        echo ucwords($value['field_attribute_name']);
        echo $value['field_attribute_required'] ? ' <span class="required">*</span>' : ''
        ?> </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select <?php echo $value['field_attribute_required'] ? 'required="required"' : '' ?> name="<?php echo $value['field_attribute_name']; ?>" class="form-control">
            <option selected="" disabled=""><?php echo 'Choose '. ucfirst($value['field_attribute_name']); ?></option>
            <?php
            foreach (explode(',', $value['field_attribute_value']) as $attKey => $attVal) {
                ?>
            <option value="<?php echo $attVal?>"><?php echo ucfirst($attVal); ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>