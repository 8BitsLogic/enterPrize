<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Answers</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata('message_answer');
                if (!$answerList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Answer Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($answerList as $answer) {
                                $status = $answer['answer_status'] == 'active' ? 'fa-eye' : 'fa-eye-slash'; 
                                ?>
                                <tr>
                                    <td><?php echo $answer['answer_descp'] ?></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/test/answer/status/'.$answer['pk_answer_id']); ?>"><i class="fa <?php echo $status; ?>"></i></a>
                                            <a href="<?php echo base_url('admin/test/answer/edit/'.$answer['pk_answer_id']); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/test/answer/delete/'.$answer['pk_answer_id']); ?>"><i class="fa fa-close"></i></a>
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