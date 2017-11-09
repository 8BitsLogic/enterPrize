<div class="row">

    <div class="video-background">
        <div class="video-foreground">
            <iframe src="https://www.youtube.com/embed/fLF4cA9QkLg?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=W0LHTWG-UmQ" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

    <style>
        * { box-sizing: border-box; }
        .video-background {
            background: #000;
            position: fixed;
            top: 0; right: 0; bottom: 0; left: 0;
            z-index: -99;
        }
        .video-foreground,
        .video-background iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }
        #vidtop-content {
            top: 0;
            color: #fff;
        }
        .vid-info { position: absolute; top: 0; right: 0; width: 33%; background: rgba(0,0,0,0.3); color: #fff; padding: 1rem; font-family: Avenir, Helvetica, sans-serif; }
        .vid-info h1 { font-size: 2rem; font-weight: 700; margin-top: 0; line-height: 1.2; }
        .vid-info a { display: block; color: #fff; text-decoration: none; background: rgba(0,0,0,0.5); transition: .6s background; border-bottom: none; margin: 1rem auto; text-align: center; }
        @media (min-aspect-ratio: 16/9) {
            .video-foreground { height: 300%; top: -100%; }
        }
        @media (max-aspect-ratio: 16/9) {
            .video-foreground { width: 300%; left: -100%; }
        }
        @media all and (max-width: 600px) {
            .vid-info { width: 50%; padding: .5rem; }
            .vid-info h1 { margin-bottom: .2rem; }
        }
        @media all and (max-width: 500px) {
            .vid-info .acronym { display: none; }
        }
    </style>

    <div id="vidtop-content">
        <div class="vid-info">
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">

        <?php
        echo $this->session->flashdata($flashKey);
        $attributes = array('class' => "form-horizontal form-label-left", 'id' => "agent_form");
        echo form_open(base_url('login/try'), $attributes);
        ?>
        <div class="row">
            <div class="col-sm-8 form-group">
                <label class="control-label" for="email">Email<span class="required">*</span></label>
                <input id="email" name="email" required="required" class="form-control" type="text">
            </div>                                                    
        </div>
        <div class="row">
            <div class="col-sm-8 form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password<span class="required">*</span></label>
                <input id="passwrod" name="password" required="required" class="form-control col-md-7 col-xs-12" type="password">
            </div>                                                    
        </div>

        <div class="ln_solid"></div>

        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

        <?php form_close(); ?>

    </div>

    <div class="clearfix"></div>
</div>