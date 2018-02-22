<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h4 class="primary">Training Resources</h4>
                <hr>
            </div>
            <div class="x_content">
                <?php
                if (!$trainingResources) {
                    ?>
                    <span class="col-md-12 alert alert-warning">Nothing available.</span>
                    <?php
                } else {
                    ?>
                    <ul class="to_do">
                        <?php
                        foreach ($trainingResources as $resource) {
                            ?>
                            <li><a target="_blank" href="<?php echo $resource['resource_link'] ?>"><?php echo $resource['resource_title']; ?> <span class="pull-right"><?php echo ucfirst($resource['resource_type']); ?></span></a></li>        
                                    <?php
                                }
                                ?>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>