<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Questions</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata('message_question');
                if (!$questionList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($questionList as $question) {
                                $status = $question['question_status'] == 'active' ? 'fa-eye' : 'fa-eye-slash'; 
                                ?>
                                <tr>
                                    <td><?php echo $question['question_descp'] ?></td>
                                    <td><?php echo $question['answer_descp'] ?></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/test/question/status/'.$question['pk_question_id']); ?>"><i class="fa <?php echo $status; ?>"></i></a>
                                            <a href="<?php echo base_url('admin/test/question/detail/'.$question['pk_question_id']); ?>"><i class="fa fa-file-o"></i></a>
                                            <a href="<?php echo base_url('admin/test/question/edit/'.$question['pk_question_id']); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/test/question/delete/'.$question['pk_question_id']); ?>"><i class="fa fa-close"></i></a>
                                        </ul>
                                        
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>