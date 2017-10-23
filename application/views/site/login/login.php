<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                $attributes = array('class' => "form-horizontal form-label-left", 'id' => "agent_form");
                echo form_open(base_url('login/try'), $attributes);
                ?>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="passwrod" name="password" required="required" class="form-control col-md-7 col-xs-12" type="password">
                    </div>
                </div>

                <div class="ln_solid"></div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

                <?php form_close(); ?>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>