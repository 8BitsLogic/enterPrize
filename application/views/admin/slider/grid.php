<?php $this->load->view('admin/partials/content_title'); ?>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Slides List</h2>
                <a class="btn btn-dark pull-right" href="<?php echo base_url('admin/slide/sort')?>">Sort Slider</a>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php
                echo $this->session->flashdata($flashKey);
                if (!$slideList) {
                    ?>
                    <h4 class="col-md-12 alert alert-warning">No data found</h4>
                    <?php
                } else {
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="10%">Position</th>
                                <th>Image</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($slideList as $slide) {
                                $status = $slide['slide_status'] == 'active' ? 'fa-eye' : 'fa-eye-slash';
                                ?>
                                <tr>
                                    <td><?php echo $slide['slide_number']; ?></td>
                                    <td><img class="image img-thumbnail" style="max-height: 200px" src="<?php echo $slide['slide_link']; ?>" ></td>
                                    <td>
                                        <ul>
                                            <a href="<?php echo base_url('admin/slide/status/' . $slide['pk_slide_id']); ?>"><i class="fa <?php echo $status; ?>"></i></a>
                                            <a href="<?php echo base_url('admin/slide/edit/' . $slide['pk_slide_id']); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('admin/slide/delete/' . $slide['pk_slide_id']); ?>"><i class="fa fa-close"></i></a>
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