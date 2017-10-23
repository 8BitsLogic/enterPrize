<div class="">
    <ul class="to_do">
        <?php
        foreach ($formFieldList as $field => $value) {
            ?>
            <li> <?php echo $value['field_label']; ?>  <a href="<?php echo base_url('admin/form_builder/form/'.$formDetail['pk_form_id'].'/field/'.$value['pk_field_id'].'/remove'); ?> "><i class="fa fa-close pull-right"></i></a></li>
                <?php
            }
            ?>
    </ul>
</div>