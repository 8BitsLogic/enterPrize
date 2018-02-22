<?php
if ($postList) {
    ?>
    <!-- Client Testimonials -->
    <section class="client-testimonials style-one" style="background:#273b53 url(<?php echo $this->themeUrl; ?>/images/background/testimonials-bg.png) center top repeat;">
        <div class="auto-container">
            <!--Section Title-->
            <div class="sec-title main-title text-center">
                <h2 class="default-title white_color">Community Discussions</h2>
                <div class="line-centered"></div>
            </div>

            <div class="testimonial-slider-full">
                <?php
                foreach ($postList as $keyP => $valP) {
                    ?>
                    <article class="slide">
                        <div class="text"><?php echo substr($valP['post_title'], 0, 200); ?> <a href="<?php echo base_url('community/post/' . $valP['pk_post_id']); ?>"><u>Read More..</u></a></div>
                        <div class="author-info"> <?php echo $valP['fullname']; ?>
                            <div class="time"><i><?php echo date_format(date_create($valP['post_create_date']), 'M d, Y'); ?></i></div>
                        </div>
                        <div class="text-center"></div>
                    </article>
                    <?php
                }
                ?>
            </div>

        </div>
    </section>
    <?php
}
?>