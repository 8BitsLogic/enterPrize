<?php
$this->load->view('admin/partials/content_title');
$id = isset($agentDetail['pk_agent_id']) ? '/' . $agentDetail['pk_agent_id'] : '';

$detail['id'] = isset($agentDetail['pk_agent_id']) ? $agentDetail['pk_agent_id'] : '';
$detail['fname'] = isset($agentDetail['agent_first_name']) ? $agentDetail['agent_first_name'] : '';
$detail['mname'] = isset($agentDetail['agent_middle_name']) ? $agentDetail['agent_middle_name'] : '';
$detail['lname'] = isset($agentDetail['agent_last_name']) ? $agentDetail['agent_last_name'] : '';
$detail['nationality'] = isset($agentDetail['agent_nationality']) ? $agentDetail['agent_nationality'] : '';
$detail['pas_number'] = isset($agentDetail['agent_passport']) ? $agentDetail['agent_passport'] : '';
$detail['vstatus'] = isset($agentDetail['agent_visa_status']) ? $agentDetail['agent_visa_status'] : '';
$detail['email'] = isset($agentDetail['agent_email']) ? $agentDetail['agent_email'] : '';
$detail['phone'] = isset($agentDetail['agent_phone']) ? $agentDetail['agent_phone'] : '';
$detail['gender'] = isset($agentDetail['agent_gender']) ? $agentDetail['agent_gender'] : '';
$detail['dob'] = isset($agentDetail['agent_dob']) ? date('d/m/Y', strtotime($agentDetail['agent_dob'])) : '';
$detail['education'] = isset($agentDetail['agent_education']) ? $agentDetail['agent_education'] : '';
$detail['city_current'] = isset($agentDetail['agent_current_city']) ? $agentDetail['agent_current_city'] : '';
$detail['city_area'] = isset($agentDetail['agent_current_city_area']) ? $agentDetail['agent_current_city_area'] : '';
$detail['city_work'] = isset($agentDetail['agent_work_city']) ? $agentDetail['agent_work_city'] : '';
$detail['status'] = isset($agentDetail['agent_status']) ? $agentDetail['agent_status'] : '';
$selected = 'selected=""';
?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $formTitle; ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata('message_agent');
                $attributes = array('class' => "form-horizontal form-label-left", 'id' => "agent_form");
                echo form_open(base_url('admin/agent/save' . $id), $attributes);

                if (isset($agentDetail['agent_username'])) {
                    ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input readonly="" class="form-control col-md-7 col-xs-12" value="<?php echo $agentDetail['agent_username']; ?>" type="text">
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fame">First Name <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="fname" required="required" class="form-control col-md-7 col-xs-12" name="fname" type="text" value="<?php echo $detail['fname']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mname"> Middle Name</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="mname" class="form-control col-md-7 col-xs-12" name="mname" type="text" value="<?php echo $detail['mname']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lname">Last Name <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="lname" required="required" class="form-control col-md-7 col-xs-12" name="lname" type="text" value="<?php echo $detail['lname']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nationality">Nationality <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="nationality" required="required" class="form-control col-md-7 col-xs-12" name="nationality" type="text" value="<?php echo $detail['nationality']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date Of Birth <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="dob" class="date-picker form-control col-md-7 col-xs-12" required="required" name="dob" type="text" value="<?php echo $detail['dob']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php
                            if ($detail['gender'] == 'male') {
                                echo 'active';
                            }
                            ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input <?php
                                if ($detail['gender'] == 'male') {
                                    echo 'checked=""';
                                }
                                ?> name="gender" value="male" data-parsley-multiple="gender" type="radio"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary <?php
                            if ($detail['gender'] == 'female') {
                                echo 'active';
                            }
                            ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input <?php
                                if ($detail['gender'] == 'female') {
                                    echo 'checked=""';
                                }
                                ?> name="gender" value="female" data-parsley-multiple="gender" type="radio"> Female
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="email" required="required" class="form-control col-md-7 col-xs-12" name="email" type="text" value="<?php echo $detail['email']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">MObile # <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="phone" required="required" class="form-control col-md-7 col-xs-12" name="phone" type="text" value="<?php echo $detail['phone']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vstatus">Visa Status<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select required="" name="vstatus" class="form-control">
                            <option selected="" disabled="">Choose Visa Status</option>
                            <?php
                            foreach ($enumValues['visa_status'] as $key => $val) {
                                ?>
                                <option <?php
                                if ($detail['vstatus'] == $val) {
                                    echo $selected;
                                }
                                ?> value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                    <?php
                                }
                                ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pas_number">Emirates ID/ Passport Number <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="pas_number" required="required" class="form-control col-md-7 col-xs-12" name="pas_number" type="text" value="<?php echo $detail['pas_number']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="education">Education</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
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

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_current">Current City <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="city_current" required="required" class="form-control col-md-7 col-xs-12" name="city_current" type="text" value="<?php echo $detail['city_current']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_area">City Area <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="city_area" required="required" class="form-control col-md-7 col-xs-12" name="city_area" type="text" value="<?php echo $detail['city_area']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_work">Work City</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="city_work" class="form-control col-md-7 col-xs-12" name="city_work" type="text" value="<?php echo $detail['city_work']; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select required="" name="status" class="form-control">
                            <option selected="" disabled="">Choose Profile Status</option>
                            <?php
                            foreach ($enumValues['status'] as $key => $val) {
                                ?>
                                <option <?php
                                if ($detail['status'] == $val) {
                                    echo $selected;
                                }
                                ?> value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                    <?php
                                }
                                ?>
                        </select>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

                <?php form_close(); ?>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>