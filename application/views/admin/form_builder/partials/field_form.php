<?php
$idSlug = '';
?>
<div class="x_panel">
    <div class="x_title">
        <h3>Create New Field</h3>
    </div> 
    <div class="x_content">
        <div class="row">
            <div class="col-md-12">
                <?php
                echo $this->session->flashdata($flashKey);
                $attributes = array('class' => "form-horizontal form-label-left", 'id' => "form_builder", 'method' => "post", 'accept-charset' => "utf-8");
                echo form_open(base_url('admin/form_builder/field/save' . $idSlug), $attributes);
                ?>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="flabel">Field Label <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="flabel" required="required" class="form-control col-md-7 col-xs-12" name="flabel" value="" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ftype">Field Type <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select required="required" name="ftype" class="form-control">
                            <option value="input">Input</option>
                            <option value="checkbox">Checkbox</option>
                            <option value="radio">Radio Button</option>
                        </select>
                    </div>
                </div>
                <?php
                foreach ($fieldAttributes as $key => $value) {
                    if (!is_null($value['field_attribute_value'])) {
                        $this->load->view($view . 'partials/field_form_select', array('value' => $value));
                    } else {
                        $this->load->view($view . 'partials/field_form_input', array('value' => $value));
                    }
                }
                ?>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="reset" class="btn btn-primary">Cancel</button>
                        <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>


