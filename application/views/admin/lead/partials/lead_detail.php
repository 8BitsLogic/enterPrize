<div class="widget widget_tally_box">
    <h3 class="name">
        <a href="<?php echo base_url('admin/agent/detail/' . $leadDetail['fk_agent_id']) ?>"><?php echo $leadDetail['agent_username']; ?></a><br>
        <a href="<?php echo base_url('admin/product/detail/' . $leadDetail['fk_product_id']) ?>"><?php echo $leadDetail['product_title']; ?></a>
    </h3>

    <div class="flex">
        <ul class="list-inline count2">
            <li>
                <h4>date</h4>
                <span><?php echo date("d-m-Y", strtotime($leadDetail['lead_craete_date'])); ?></span>
            </li>
            <li>
                <h4>Status</h4>
                <span><?php echo $leadDetail['lead_status']; ?></span>
            </li>
        </ul>
    </div>
</div>