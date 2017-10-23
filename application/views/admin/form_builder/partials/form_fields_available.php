<div class="">
    <ul class="to_do">
        <?php
        foreach ($fieldList as $fkey => $fval) {
            
            ?>
        <li> <?php echo $fval['field_label']; ?>  <a href="<?php echo base_url('admin/form_builder/form/'.$formDetail['pk_form_id'].'/field/'.$fval['pk_field_id'].'/add'); ?> "><i class="fa fa-plus pull-right"></i></a></li>
                <?php
            }
            ?>
    </ul>
</div>