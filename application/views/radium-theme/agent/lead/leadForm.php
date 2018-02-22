<?php $this->load->view($view . '../partials/page_title'); ?>
<section class="pad-top-md pad-bottom-md" id="process-step">
    <div class="container">
        <div class="row">
            <?php
            echo $this->session->flashdata($flashKey);
            ?>
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <!--<span class="col-md-12 text-center"><h4><?php echo $productDetail['product_title']; ?></h4></span>-->
                                <span class="col-md-offset-3 col-md-6 text-center"><img src="<?php echo $this->themeUrl . '/images/products/' . $productDetail['pk_product_id'] . '/' . $productDetail['photo']; ?>" alt="<?php echo $productDetail['product_title']; ?>"></span>
                                <span class="col-md-8 col-md-offset-2  text-justify"><p><?php echo $productDetail['product_descp']; ?></p></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <span class="col-md-12 text-center"><h5 class="text-primary"><?php echo $leadForm[0]['form_title']; ?></h5></span>
                                <?php
                                $attributes = array('id' => "lead_form", 'data-parsley-validate' => "", 'class' => "form-horizontal form-label-left", 'novalidate' => "");
                                echo form_open(base_url('product/' . $productDetail['pk_product_id'] . '/lead_capture'), $attributes);
                                foreach ($leadForm as $formFiled) {
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $formFiled['field_label']; ?>
                                        </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input <?php echo $formFiled['field_attributes']; ?> />
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-10">
                                        <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                <?php
                                echo form_close();
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
