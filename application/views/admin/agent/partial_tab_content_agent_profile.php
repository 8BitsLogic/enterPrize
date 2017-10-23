<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $agentDetail['agent_username']; ?>" type="text">
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $agentDetail['agent_first_name']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" > Middle Name</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $agentDetail['agent_middle_name']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Last Name </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="" class="form-control col-md-7 col-xs-12" name="lname" type="text" value="<?php echo $agentDetail['agent_last_name']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nationality </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="" class="form-control col-md-7 col-xs-12" name="nationality" type="text" value="<?php echo $agentDetail['agent_nationality']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Date Of Birth </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly="" class="date-picker form-control col-md-7 col-xs-12" name="dob" type="text" value="<?php echo date('d/m/Y', strtotime($agentDetail['agent_dob'])); ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div id="gender" class="btn-group" data-toggle="buttons">
                <?php
                if ($agentDetail['agent_gender'] == 'male') {
                    ?>
                    <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">&nbsp; Male &nbsp;</label>
                    <?php
                } elseif ($agentDetail['agent_gender'] == 'female') {
                    ?>
                    <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">Female</label>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Email </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input readonly=""class="form-control col-md-7 col-xs-12" name="email" type="text" value="<?php echo $agentDetail['agent_email']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >MObile # </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input  readonly="" class="form-control col-md-7 col-xs-12" name="phone" type="text" value="<?php echo $agentDetail['agent_phone']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Visa Status</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input  readonly="" class="form-control col-md-7 col-xs-12" name="pas_number" type="text" value="<?php echo $agentDetail['agent_visa_status']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Emirates ID/ Passport Number </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input  readonly="" class="form-control col-md-7 col-xs-12" name="pas_number" type="text" value="<?php echo $agentDetail['agent_passport']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Education</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input  readonly="" class="form-control col-md-7 col-xs-12" name="city_work" type="text" value="<?php echo $agentDetail['agent_education']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Current City </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input  readonly="" class="form-control col-md-7 col-xs-12" name="city_current" type="text" value="<?php echo $agentDetail['agent_current_city']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >City Area </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input  readonly="" class="form-control col-md-7 col-xs-12" name="city_area" type="text" value="<?php echo $agentDetail['agent_current_city_area']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Work City</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input  readonly="" class="form-control col-md-7 col-xs-12" name="city_work" type="text" value="<?php echo $agentDetail['agent_work_city']; ?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Status</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input  readonly="" class="form-control col-md-7 col-xs-12" name="city_work" type="text" value="<?php echo $agentDetail['agent_status']; ?>" >
        </div>
    </div>
</form>