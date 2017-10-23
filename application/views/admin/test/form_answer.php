<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Answer/ Choice for Question</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                $answerVal = isset($answerDetail['answer_descp']) ? $answerDetail['answer_descp'] : '';
                $statusVal = isset($answerDetail['answer_status']) ? $answerDetail['answer_status'] : '';
                $id = isset($answerDetail['pk_answer_id']) ? '/'.$answerDetail['pk_answer_id'] : '';
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'answerform');
                echo form_open(base_url('admin/test/answer/save'.$id), $attributes);
                ?>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="answer">Answer<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="answer" required="required" name="answer" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $answerVal?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if ($statusVal == 'active'){ echo 'active'; }?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input name="status" value="active" <?php if ($statusVal == 'active'){ echo 'checked=""'; }?> type="radio" required=""> Active
                            </label>
                            <label class="btn btn-primary <?php if ($statusVal == 'inactive'){ echo 'active'; }?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input name="status" value="inactive" <?php if ($statusVal == 'inactive'){ echo 'checked=""'; }?> type="radio" required=""> Inactive
                            </label>
                        </div>
                    </div>
                </div>

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

    <div class="clearfix"></div>

</div>