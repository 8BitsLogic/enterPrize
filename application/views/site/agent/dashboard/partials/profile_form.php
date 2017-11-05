<?php
$detail['id'] = isset($agentDetail['pk_agent_id']) ? $agentDetail['pk_agent_id'] : '';
$detail['username'] = isset($agentDetail['agent_username']) ? $agentDetail['agent_username'] : '';
$detail['fname'] = isset($agentDetail['agent_first_name']) ? $agentDetail['agent_first_name'] : '';
$detail['mname'] = isset($agentDetail['agent_middle_name']) ? $agentDetail['agent_middle_name'] : '';
$detail['lname'] = isset($agentDetail['agent_last_name']) ? $agentDetail['agent_last_name'] : '';
$detail['nationality'] = isset($agentDetail['agent_nationality']) ? $agentDetail['agent_nationality'] : '';
$detail['pas_number'] = isset($agentDetail['agent_passport']) ? $agentDetail['agent_passport'] : '';
$detail['vstatus'] = isset($agentDetail['agent_visa_status']) ? $agentDetail['agent_visa_status'] : '';
$detail['phone'] = isset($agentDetail['agent_phone']) ? $agentDetail['agent_phone'] : '';
$detail['email'] = isset($agentDetail['agent_email']) ? $agentDetail['agent_email'] : '';
$detail['gender'] = isset($agentDetail['agent_gender']) ? $agentDetail['agent_gender'] : '';
$detail['dob'] = isset($agentDetail['agent_dob']) ? date('d/m/Y', strtotime($agentDetail['agent_dob'])) : '';
$detail['education'] = isset($agentDetail['agent_education']) ? $agentDetail['agent_education'] : '';
$detail['city_current'] = isset($agentDetail['agent_current_city']) ? $agentDetail['agent_current_city'] : '';
$detail['city_area'] = isset($agentDetail['agent_current_city_area']) ? $agentDetail['agent_current_city_area'] : '';
$detail['city_work'] = isset($agentDetail['agent_work_city']) ? $agentDetail['agent_work_city'] : '';
$detail['status'] = isset($agentDetail['agent_status']) ? $agentDetail['agent_status'] : '';
$selected = 'selected=""';
?>
<div class="col-sm-12">
    <?php
    $attributes = array('class' => "", 'id' => "agent_form");
    echo form_open(base_url('dashboard/updateProfile'), $attributes);
    ?>
    <div class="row">
        <div class="col-sm-8 form-group">
            <label class="control-label" for="username">Username </label>
            <input id="username" readonly="" class="form-control" type="text" value="<?php echo $detail['username']; ?>" >
        </div>                                                    
    </div>
    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label" for="fame">First Name <span class="required">*</span></label>
            <input id="fname" required="required" class="form-control" name="fname" type="text" value="<?php echo $detail['fname']; ?>" >
        </div>
        <div class="col-sm-4 form-group">
            <label class="control-label" for="mname"> Middle Name</label>
            <input id="mname" class="form-control" name="mname" type="text" value="<?php echo $detail['mname']; ?>" >
        </div>
        <div class="col-sm-4 form-group">
            <label class="control-label" for="lname">Last Name <span class="required">*</span></label>
            <input id="lname" required="required" class="form-control" name="lname" type="text" value="<?php echo $detail['lname']; ?>" >
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label" for="nationality">Nationality <span class="required">*</span></label>
            <input id="nationality" required="required" class="form-control" name="nationality" type="text" value="<?php echo $detail['nationality']; ?>" >
        </div>
        <div class="col-sm-4 form-group">
            <label class="control-label" for="dob">Date Of Birth <span class="required">*</span></label>
            <div class="form-group" id="calender-outer">
                <div class="input-group" id="calender">
                    <input id="dob" class="date-picker form-control col-md-7 col-xs-12" required="required" name="dob" type="text" value="<?php echo $detail['dob']; ?>" >
                </div>
            </div>
        </div>
        <div class="col-sm-4 form-group">
            <label>Gender</label><span class="required">*</span>
            <div class="col-xs-12">
                <div class="radio-inline">
                    <label><input name="gender" <?php echo $detail['gender'] == 'male' ? 'checked=""' : ''; ?> value="male" data-parsley-multiple="gender" type="radio"> &nbsp; Male &nbsp;</label>
                </div>
                <div class="radio-inline">
                    <label><input name="gender" <?php echo $detail['gender'] == 'female' ? 'checked=""' : ''; ?> value="female" data-parsley-multiple="gender" type="radio"> Female</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label" for="phone">Mobile # <span class="required">*</span></label>
            <input id="phone" required="required" class="form-control" name="phone" type="text" value="<?php echo $detail['phone']; ?>" >
        </div>
        <div class="col-sm-4 form-group">
            <label class="control-label" for="email">Email</label>
            <input id="email" readonly="" class="form-control" type="text" value="<?php echo $detail['email']; ?>" >
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label" for="vstatus">Visa Status<span class="required">*</span></label>
            <input id="vstatus" class="form-control" readonly="" type="text" value="<?php echo $detail['vstatus']; ?>" >
        </div>
        <div class="col-sm-4 form-group">
            <label class="control-label" for="pas_number">Emirates ID/ Passport Number <span class="required">*</span></label>
            <input id="pas_number" readonly="" class="form-control" type="text" value="<?php echo $detail['pas_number']; ?>" >
        </div>                                                     
    </div>
    <div class="row">
        <div class="col-sm-8 form-group">
            <label class="control-label" for="education">Education</label>
            <select name="education" class="form-control">
                <option selected="" disabled="">Choose Education Level</option>
                <?php
                foreach ($enumValues['education'] as $key => $val) {
                    ?>
                    <option <?php
                    if ($detail['education'] == $val) {
                        echo $selected;
                    }
                    ?> value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php
                    }
                    ?>
            </select> 
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 form-group">
            <label class="control-label" for="city_current">Current City <span class="required">*</span></label>
            <input id="city_current" required="required" class="form-control" name="city_current" type="text" value="<?php echo $detail['city_current']; ?>" >
        </div>
        <div class="col-sm-4 form-group">
            <label class="control-label" for="city_area">City Area <span class="required">*</span></label>
            <input id="city_area" required="required" class="form-control" name="city_area" type="text" value="<?php echo $detail['city_area']; ?>" >
        </div>
        <div class="col-sm-4 form-group">
            <label class="control-label" for="city_work">Work City</label>
            <input id="city_work" class="form-control" name="city_work" type="text" value="<?php echo $detail['city_work']; ?>" >
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <ul class="list-unstyled list-inline text-center pad-top-xs">
                <li><button type="reset" class="btn btn-info next-step">Cancel</button></li>
                <li><button type="submit" name="submit" value="submit" class="btn btn-info next-step">Submit</button></li>
            </ul>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>