<?php
$id = isset($agentDetail['pk_agent_id']) ? '/' . $agentDetail['pk_agent_id'] : '';

$detail['id'] = isset($agentDetail['pk_agent_id']) ? $agentDetail['pk_agent_id'] : '';
$detail['fname'] = isset($agentDetail['agent_first_name']) ? $agentDetail['agent_first_name'] : '';
$detail['mname'] = isset($agentDetail['agent_middle_name']) ? $agentDetail['agent_middle_name'] : '';
$detail['lname'] = isset($agentDetail['agent_last_name']) ? $agentDetail['agent_last_name'] : '';
$detail['nationality'] = isset($agentDetail['agent_nationality']) ? $agentDetail['agent_nationality'] : '';
$detail['pas_number'] = isset($agentDetail['agent_passport']) ? $agentDetail['agent_passport'] : '';
$detail['vstatus'] = isset($agentDetail['agent_visa_status']) ? $agentDetail['agent_visa_status'] : '';
$detail['phone'] = isset($agentDetail['agent_phone']) ? $agentDetail['agent_phone'] : '';
$detail['gender'] = isset($agentDetail['agent_gender']) ? $agentDetail['agent_gender'] : '';
$detail['dob'] = isset($agentDetail['agent_dob']) ? date('d/m/Y', strtotime($agentDetail['agent_dob'])) : '';
$detail['education'] = isset($agentDetail['agent_education']) ? $agentDetail['agent_education'] : '';
$detail['city_current'] = isset($agentDetail['agent_current_city']) ? $agentDetail['agent_current_city'] : '';
$detail['city_area'] = isset($agentDetail['agent_current_city_area']) ? $agentDetail['agent_current_city_area'] : '';
$detail['city_work'] = isset($agentDetail['agent_work_city']) ? $agentDetail['agent_work_city'] : '';
$detail['status'] = isset($agentDetail['agent_status']) ? $agentDetail['agent_status'] : '';
$selected = 'selected=""';

$actionUrl = isset($activationKey) ? 'signup/save/' . $activationKey : 'agent/save' . $id;
?>
<?php $this->load->view($view . '../agent/partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">                 
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
<!--                    <div class="x_title text-center">
                        <h2><?php echo $page['title']; ?></h2>
                        <hr>
                    </div>-->
                    <div class="x_content">
                        <div class="error">
                            <?php echo validation_errors(); ?>                            
                        </div>
                        <?php
                        echo $this->session->flashdata($flashKey);
                        $attributes = array('class' => "form-horizontal form-label-left", 'id' => "agent_form");
                        echo form_open(base_url($actionUrl), $attributes);
                        ?>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fame">First Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="fname" required="required" class="form-control col-md-7 col-xs-12" name="fname" type="text" value="<?php echo set_value('fname') ? set_value('fname') : $detail['fname']; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mname"> Middle Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="mname" class="form-control col-md-7 col-xs-12" name="mname" type="text" value="<?php echo set_value('mname') ? set_value('mname') : $detail['mname']; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">Last Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="lname" required="required" class="form-control col-md-7 col-xs-12" name="lname" type="text" value="<?php echo set_value('lname') ? set_value('lname') : $detail['lname']; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nationality">Nationality <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nationality" required="required" class="form-control col-md-7 col-xs-12" name="nationality" type="text" value="<?php echo set_value('nationality') ? set_value('nationality') : $detail['nationality']; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date Of Birth <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="dob" class="date-picker form-control col-md-7 col-xs-12" required="required" name="dob" type="text" value="<?php echo set_value('dob') ? set_value('dob') : $detail['dob']; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php $detail['gender'] = set_value('gender') ? set_value('gender') : $detail['gender']; ?>
                                <label><input <?php echo $detail['gender'] == 'male' ? 'checked="checked"' : ''; ?> name="gender" value="male" data-parsley-multiple="gender" type="radio" required=""> &nbsp; Male &nbsp;</label>
                                <label> <input <?php echo $detail['gender'] == 'female' ? 'checked="checked"' : ''; ?> name="gender" value="female" data-parsley-multiple="gender" type="radio" required=""> Female</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Mobile # <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="phone" required="required" class="form-control col-md-7 col-xs-12" name="phone" type="text" value="<?php echo set_value('phone') ? set_value('phone') : $detail['phone']; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vstatus">Visa Status<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select required="" name="vstatus" class="form-control">
                                    <option selected="" disabled="">Choose Visa Status</option>
                                    <?php
                                    $detail['vstatus'] = set_value('vstatus') ? set_value('vstatus') : $detail['vstaus'];
                                    foreach ($enumValues['visa_status'] as $key => $val) {
                                        ?>
                                        <option <?php
                                        if ($detail['vstatus'] == $val) {
                                            echo $selected;
                                        }
                                        ?> value="<?php echo $val; ?>"><?php echo ucwords($val); ?></option>
                                            <?php
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pas_number">Emirates ID/ Passport Number <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pas_number" required="required" class="form-control col-md-7 col-xs-12" name="pas_number" type="text" value="<?php echo set_value('pas_number') ? set_value('pas_number') : $detail['pas_number']; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="education">Education</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="education" class="form-control">
                                    <option selected="" disabled="">Choose Education Level</option>
                                    <?php
                                    $detail['education'] = set_value('education') ? set_value('education') : $detail['education'];
                                    foreach ($enumValues['education'] as $key => $val) {
                                        ?>
                                        <option <?php
                                        if ($detail['education'] == $val) {
                                            echo $selected;
                                        }
                                        ?> value="<?php echo $val; ?>"><?php echo ucwords($val); ?></option>
                                            <?php
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_current">Current City <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="city_current" required="required" class="form-control col-md-7 col-xs-12" name="city_current" type="text" value="<?php echo set_value('city_current') ? set_value('city_current') : $detail['city_current']; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_area">City Area <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="city_area" required="required" class="form-control col-md-7 col-xs-12" name="city_area" type="text" value="<?php echo set_value('city_area') ? set_value('city_area') : $detail['city_area']; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_work">Work City</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="city_work" class="form-control col-md-7 col-xs-12" name="city_work" type="text" value="<?php echo set_value('city_work') ? set_value('city_work') : $detail['city_work']; ?>" >
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary">Cancel</button>
                                <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                        <?php form_close(); ?>

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
</section>

