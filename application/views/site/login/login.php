<div id="side-panel-pusher">
    <div id="main-container">
        <div id="page-wrap">
            <div id="header-overlapping-helper"></div><div id="page-content" class="no-sidebar-layout">
                <div class="container">
                    <div id="the-content">
                        <div id="video-background-1" class="ui--video-background-wrapper fullwidth-content clearfix ui--section-content-v-center color--dark" style="margin-top: -30px;  margin-bottom: -12px;">
                            <div class="ui--video-background-holder">
                                <div class="ui--video-background-video hidden-phone ">
                                    <video autoplay="autoplay" loop="loop" muted="muted" width="640" height="360">
                                        <source src="http://0.s3.envato.com/h264-video-previews/3f56531e-3976-11e3-8c19-00505692144f/5905374.mp4" type="video/mp4" />
                                        <!--<source src="http://envision.wptation.com/wp-content/uploads/2014/01/5905374.webmhd.webm" type="video/webm" />-->
                                    </video>
                                </div>
                                <div class="ui--video-background-poster"></div>
                                <div class="ui--video-background"><div class="ui--gradient"></div></div>        
                            </div>
                            <div class="ui--section-content container clearfix">
                                <div class="ui--animation-in make--fx--flipIn-X ui--pass clearfix" data-fx="fx--flipIn-X" data-delay="200" data-start-delay="0">
                                    <div class="ui-row row">
                                        <div class="ui-column span3"></div>
                                        <div class="ui-column span6"><div class="ui--icon-box position--top"><span class="ui--icon-box-icon ui--animation"><a href="<?php echo base_url(); ?>"><img style="width: 20%;" src="<?php echo $this->themeUrl; ?>/images/logo.png" alt="img" class="img-responsive center-block"></a></span><div class="ui--icon-box-content"></div></div><h1 id="custom-title-h1-1" class="ui--animation " style="text-align: center; margin-bottom: 0px; "><strong>Welcome to BYOB Ltd</strong></h1><h4 id="custom-title-h4-1" class="ui--animation " style="text-align: center; ">LEARN, EARN , GROW</h4></div>
                                        <div class="ui-column span3"></div>
                                    </div>
                                    <div class="ui--space clearfix" data-responsive="{&quot;css&quot;:{&quot;height&quot;:{&quot;phone&quot;:null,&quot;tablet&quot;:null,&quot;widescreen&quot;:null}}}"></div><div class="ui-row row">
                                        <div class="ui-column span4"></div>
                                        <div class="ui-column span4">
                                            <div class="ui--custom-login ui--pass">
                                                <div class="error">
                                                    <?php echo validation_errors(); ?>                            
                                                </div>
                                                <div id="login-form-container" class="ui--custom-login login-form-container">
                                                    <?php
                                                    echo $this->session->flashdata($flashKey);
                                                    $attributes = array('class' => "login-form form-horizontal ui-row", 'id' => "agent_form");
                                                    echo form_open(base_url('login/try'), $attributes);
                                                    ?>
                                                    <div class="form-elements">
                                                        <div class="ui-row row">
                                                            <p class="control-group">
                                                                <label class="control-label ui--animation" for="email"> Email</label>
                                                                <span class="controls ui--animation"><input tabindex="100" type="email" id="email" name="email" required="required" /></span>
                                                            </p>
                                                            <p class="control-group">
<!--                                                                        <small class="pull-right ui--animation">
                                                                    <a class="lost_password" href="">Lost Password?</a>
                                                                </small>-->
                                                                <label class="control-label ui--animation" for="user_pass">Password</label>
                                                                <span class="controls ui--animation"><input tabindex="101" id="passwrod" name="password" required="required" class="input-text" type="password" /></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="custom-login-form-actions clearfix">
                                                        <!--<input type="hidden" id="_n" name="_n" value="72b9bb9eb0" /><input type="hidden" name="_wp_http_referer" value="/login-full-page-video-background/?_wpcf7_is_ajax_call=1&amp;_wpcf7=47&amp;_wpcf7_request_ver=1510644188359&amp;_wpcf7_is_ajax_call=1&amp;_wpcf7=47&amp;_wpcf7_request_ver=1510644358261" />-->

                                                        <p class="control-group col-xs-12 col-sm-6" style="padding-left:0">
                                                            <!--                                                                <button type="submit" class="ui--animation btn btn-primary btn-block" value="Login">Login</button>-->
                                                            <button type="submit" name="submit" value="submit" class="ui--animation btn btn-primary btn-block">Login</button>
<!--                                                                    <label class="control-label checkbox inline ui--animation" for="rememberme"><input tabindex="100" type="checkbox" name="rememberme" id="rememberme" value="forever" /> Remember me</label>-->
                                                        </p>
                                                    </div>
                                                    <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui-column span4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript">
    // <![CDATA[
    var styleElement = document.createElement("style");
    styleElement.type = "text/css";
    var cloudfw_dynamic_css_code = "@media ( min-width: 979px ) { .modern-browser #header-container.stuck #logo img {height: 30px;  margin-top: 20px !important;  margin-bottom: 20px !important;}  }\r\n\r\n\r\nhtml #video-background-1 .ui--video-background {-ms-filter: \"progid:DXImageTransform.Microsoft.Alpha(Opacity=65)\";opacity: 0.65;} html #video-background-1 .ui--video-background .ui--gradient {background-color:#3a1e40; *background-color: #0e6591; background-image:url('data:image\/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPg0KICAgIDxkZWZzPg0KICAgICAgICA8bGluZWFyR3JhZGllbnQgaWQ9ImxpbmVhci1ncmFkaWVudCIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiIHNwcmVhZE1ldGhvZD0icGFkIj4NCiAgICAgICAgICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiMwZTY1OTEiIHN0b3Atb3BhY2l0eT0iMSIvPg0KICAgICAgICAgICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjM2ExZTQwIiBzdG9wLW9wYWNpdHk9IjEiLz4NCiAgICAgICAgPC9saW5lYXJHcmFkaWVudD4NCiAgICA8L2RlZnM+DQogICAgPHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgc3R5bGU9ImZpbGw6IHVybCgjbGluZWFyLWdyYWRpZW50KTsiLz4NCjwvc3ZnPg=='); background-image: -moz-linear-gradient(top, #0e6591, #3a1e40) ; background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0e6591), to(#3a1e40)); background-image: -webkit-linear-gradient(top, #0e6591, #3a1e40); background-image: -o-linear-gradient(top, #0e6591, #3a1e40); background-image: linear-gradient(to bottom, #0e6591, #3a1e40); filter:  progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#0e6591', endColorstr='#3a1e40'); -ms-filter: \"progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#0e6591', endColorstr='#3a1e40')\"; background-repeat: repeat-x ;} html #video-background-1 .ui--video-background-poster {-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http:\/\/envision.wptation.com\/wp-content\/uploads\/2014\/01\/login_bg_2.jpg',sizingMethod='scale'); -ms-filter: \"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http:\/\/envision.wptation.com\/wp-content\/uploads\/2014\/01\/login_bg_2.jpg', sizingMethod='scale')\";  background-image: url('http:\/\/envision.wptation.com\/wp-content\/uploads\/2014\/01\/login_bg_2.jpg');} html #video-background-1 .ui--section-content , html #video-background-1 .ui--section-content p, html #video-background-1 .ui--section-content h1, html #video-background-1 .ui--section-content h2, html #video-background-1 .ui--section-content h3, html #video-background-1 .ui--section-content h4, html #video-background-1 .ui--section-content h5, html #video-background-1 .ui--section-content h6 {color: #ffffff;} html #video-background-1 .ui--section-content a {color: #cccccc;} html #video-background-1 .ui--section-content a:hover {color: #ffffff;} ";
    if (styleElement.styleSheet) {
    styleElement.styleSheet.cssText = cloudfw_dynamic_css_code;
    } else {
    styleElement.appendChild(document.createTextNode(cloudfw_dynamic_css_code));
    }

    document.getElementsByTagName("head")[0].appendChild(styleElement);
    // ]]>
</script>
<script type="text/javascript" defer src="<?php echo $this->themeUrlSite; ?>/js/login.js"></script>