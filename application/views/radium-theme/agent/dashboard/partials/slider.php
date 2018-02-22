<!--Main Slider-->
<section class="main-slider">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <?php
                foreach ($slides as $slide) {
                    ?>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="<?php echo $slide['slide_link']; ?>"  data-saveperformance="off"  data-title="Awesome Title Here">
                        <img src="<?php echo $slide['slide_link']; ?>"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 


                        <div class="tp-caption lft tp-resizeme"
                             data-x="center" data-hoffset="0" data-y="center" data-voffset="-100"
                             data-speed="1500" data-start="500"
                             data-easing="easeOutExpo" data-splitin="none"
                             data-splitout="none" data-elementdelay="0.01"
                             data-endelementdelay="0.3" data-endspeed="1200"
                             data-endeasing="Power4.easeIn" style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                            <h1 class="bold-heading text-uppercase">Introducing <span class="red">byob</span> pro.</h1></div>

                        <div class="tp-caption lft tp-resizeme"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="-40"
                             data-speed="1500"
                             data-start="1000"
                             data-easing="easeOutExpo"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.3"
                             data-endspeed="1200"
                             data-endeasing="Power4.easeIn"
                             style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><div class="roman-text theme_color"><p>learn, Earn , Grow</p></div></div>


<!--                        <div class="tp-caption lfb tp-resizeme"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="20"
                             data-speed="1500"
                             data-start="1500"
                             data-easing="easeOutExpo"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.3"
                             data-endspeed="1200"
                             data-endeasing="Power4.easeIn"
                             style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><h2 class="trans-heading">we care for your business</h2></div>


                        <div class="tp-caption lfb tp-resizeme"
                             data-x="center" data-hoffset="0"
                             data-y="center" data-voffset="100"
                             data-speed="1500"
                             data-start="2000"
                             data-easing="easeOutExpo"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.3"
                             data-endspeed="1200"
                             data-endeasing="Power4.easeIn"
                             style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><a class="theme-btn radial-btn" href="#"><span class="txt">Register Now</span> <span class="img-circle fa fa-arrow-right"></span></a></div>-->
                    </li>
                    <?php
                }
                ?>
            </ul>

            <div class="tp-bannertimer"></div>
        </div>
    </div>
</section>