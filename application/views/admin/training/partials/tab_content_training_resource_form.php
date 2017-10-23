
<div class="x_content">

    <div class="col-xs-2">
        <!-- required for floating -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-left">
            <li class="active"><a href="#r_image" data-toggle="tab">Image</a></li>
            <li><a href="#r_pdf" data-toggle="tab">PDF</a></li>
            <li><a href="#r_video" data-toggle="tab">Video</a></li>
        </ul>
    </div>

    <div class="col-xs-9">
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="r_image"> <?php $this->load->view($view.'partials/resource_form_image'); ?> </div>
            <div class="tab-pane" id="r_pdf"> <?php $this->load->view($view.'partials/resource_form_pdf'); ?> </div>
            <div class="tab-pane" id="r_video"> <?php $this->load->view($view.'partials/resource_form_video_link'); ?> </div>
        </div>
    </div>

    <div class="clearfix"></div>

</div>

<div class="clearfix"></div>