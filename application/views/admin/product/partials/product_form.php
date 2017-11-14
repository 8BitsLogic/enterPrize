<?php
$idSlug = isset($productDetail['pk_product_id']) ? '/' . $productDetail['pk_product_id'] : '';
$productDetailSession = $this->session->flashdata['data_product'];
$prd['title'] = isset($productDetailSession['prd_title']) ? $productDetailSession['prd_title'] : isset($productDetail['product_title']) ? $productDetail['product_title'] : '';
$prd['descp'] = isset($productDetailSession['prd_descp']) ? $productDetailSession['prd_descp'] : isset($productDetail['product_descp']) ? $productDetail['product_descp'] : '';
$prd['v_email'] = isset($productDetailSession['v_email']) ? $productDetailSession['v_email'] : isset($productDetail['product_vendor_email']) ? $productDetail['product_vendor_email'] : '';
$prd['total_reward'] = isset($productDetailSession['prd_total_reward']) ? $productDetailSession['prd_total_reward'] : isset($productDetail['product_total_reward']) ? $productDetail['product_total_reward'] : '';
$prd['agent_reward'] = isset($productDetailSession['prd_agent_reward']) ? $productDetailSession['prd_agent_reward'] : isset($productDetail['product_agent_reward']) ? $productDetail['product_agent_reward'] : '';
$prd['status'] = isset($productDetailSession['prd_status']) ? $productDetailSession['prd_status'] : isset($productDetail['product_status']) ? $productDetail['product_status'] : '';

$attributes = array('id' => "product_form", 'data-parsley-validate' => "", 'class' => "form-horizontal form-label-left", 'novalidate' => "");
echo form_open_multipart(base_url('admin/product/save' . $idSlug), $attributes);
?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="prd_title">Title <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="prd_title" name="prd_title" required="required" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $prd['title']; ?>">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="prd_descp">Description
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea class="form-control" rows="3" id="prd_descp" name="prd_descp"><?php echo $prd['descp']; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="v_email">Vendor Email <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="v_email" name="v_email" required="required" class="form-control col-md-7 col-xs-12" type="email" value="<?php echo $prd['v_email']; ?>">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="prd_total_reward">Total Reward <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="prd_total_reward" name="prd_total_reward" required="required" class="form-control col-md-7 col-xs-12" type="number" value="<?php echo $prd['total_reward']; ?>">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="prd_agent_reward">Agent Reward <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="prd_agent_reward" name="prd_agent_reward" required="required" class="form-control col-md-7 col-xs-12" type="number" value="<?php echo $prd['agent_reward']; ?>" >
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="prd_img">Image</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="prd_img" name="prd_img" class="form-control col-md-7 col-xs-12" type="file" value="" >
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div id="status" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default <?php
            if ($prd['status'] == 'active') {
                echo 'active';
            }
            ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input name="prd_status" value="active" <?php
                if ($prd['status'] == 'active') {
                    echo 'checked=""';
                }
                ?> type="radio" required=""> Active
            </label>
            <label class="btn btn-primary <?php
            if ($prd['status'] == 'inactive') {
                echo 'active';
            }
            ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input name="prd_status" value="inactive" <?php
                if ($prd['status'] == 'inactive') {
                    echo 'checked=""';
                }
                ?> type="radio" required=""> Inactive
            </label>
        </div>
    </div>
</div>


<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="reset" class="btn btn-primary">Cancel</button>
        <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
    </div>
</div>


<?php
echo form_close();
?>