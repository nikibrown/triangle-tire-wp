<?php
/**
 *
 * Template Name: Curator
 *
 * @package WordPress
 * @subpackage wpcustom
*/
get_header();


    // Start the loop.
    while ( have_posts() ) : the_post();

        $img = featured_image( $post->ID, 'full');
        $gallery = get_post_gallery( $post->ID, false );
        //$gallery = array_unique( $gallery );
        $ids = explode( ",", $gallery['ids'] );
        $pics = array();
        if( !empty( $ids ) )
        {
            foreach( $ids as $id )
            {
                $pics[] = wp_get_attachment_url( $id );
            }
            $pics = array_unique( $pics );
        }
        $pics = array_filter( $pics );
        ?>

<?php
        if( !empty( $img ) || !empty( $pics ) )
        {
            ?>
<div class="interiorbanner expanded row">
    <div class="large-12">
        <?php
            if( !empty( $pics ) )
            {
                echo '<div class="js-gallery" style="height: 300px; max-height: 300px; overflow: hidden;">';
                foreach( $pics as $g )
                {
                    echo '<img src="'. $g .'" />';
                }
                echo '</div>';
            }
            else
            {
                echo '<img src="'.$img.'" />';
            }
            ?>
    </div>
</div>
<?php
        }
        ?>
<div class="container-fluid curator">
    <div id="gearheads" class="row">
        <div class="medium-12 large-12 columns gearheadcontent">
            <div id="gearheadsinner" class="row scoopcolumns">
                <div class="large-12">
                    <div class="">
                        <div class="row js-second-alert">
                            <div class="small-12 columns">
                                <div id="mc_embed_shell">
                                    <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css"
                                        rel="stylesheet" type="text/css">
                                    <style type="text/css">
                                    #mc_embed_signup {
                                        background: #fff;
                                        false;
                                        clear: left;
                                        font: 14px Helvetica, Arial, sans-serif;
                                        width: 600px;
                                    }
                                    </style>
                                    <div id="mc_embed_signup">
                                        <form
                                            action="https://triangletireus.us20.list-manage.com/subscribe/post?u=234d050d07c5717cb90727df8&amp;id=f4093a4aa7&amp;f_id=008c3aeaf0"
                                            method="post" id="mc-embedded-subscribe-form"
                                            name="mc-embedded-subscribe-form" class="validate" target="_blank">
                                            <div id="mc_embed_signup_scroll">
                                                <h1>Register here to receive weekly highlight emails on top OTR news.
                                                </h1>
                                                <div class="indicates-required"><span class="asterisk">*</span>
                                                    indicates required</div>
                                                <div class="mc-field-group"><label for="mce-FNAME">First Name
                                                    </label><input type="text" name="FNAME" class=" text" id="mce-FNAME"
                                                        value=""></div>
                                                <div class="mc-field-group"><label for="mce-LNAME">Last Name
                                                    </label><input type="text" name="LNAME" class=" text" id="mce-LNAME"
                                                        value=""></div>
                                                <div class="mc-field-group"><label for="mce-EMAIL">Email Address
                                                        <span class="asterisk">*</span></label><input type="email"
                                                        name="EMAIL" class="required email" id="mce-EMAIL" value=""
                                                        required=""><span id="mce-EMAIL-HELPERTEXT"
                                                        class="helper_text"></span></div>
                                                <div id="mce-responses" class="clear">
                                                    <div class="response" id="mce-error-response"
                                                        style="display: none;"></div>
                                                    <div class="response" id="mce-success-response"
                                                        style="display: none;"></div>
                                                </div>
                                                <div aria-hidden="true" style="position: absolute; left: -5000px;">
                                                    <input type="text" name="b_234d050d07c5717cb90727df8_f4093a4aa7"
                                                        tabindex="-1" value="">
                                                </div>
                                                <div class="clear"><input type="submit" name="subscribe"
                                                        id="mc-embedded-subscribe" class="button" value="Subscribe">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <script type="text/javascript"
                                        src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
                                    <script type="text/javascript">
                                    (function($) {
                                        window.fnames = new Array();
                                        window.ftypes = new Array();
                                        fnames[1] = 'FNAME';
                                        ftypes[1] = 'text';
                                        fnames[2] = 'LNAME';
                                        ftypes[2] = 'text';
                                        fnames[0] = 'EMAIL';
                                        ftypes[0] = 'email';
                                        fnames[3] = 'ADDRESS';
                                        ftypes[3] = 'address';
                                        fnames[4] = 'PHONE';
                                        ftypes[4] = 'phone';
                                        fnames[5] = 'BIRTHDAY';
                                        ftypes[5] = 'birthday';
                                    }(jQuery));
                                    var $mcj = jQuery.noConflict(true);
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="gearheadswrap" class="container-fluid curator">
    <div id="gearheads" class="row">
        <div class="medium-12 large-12 columns gearheadcontent">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<script src="<?php bloginfo( 'template_url' ); ?>/js/vendor/foundation.reveal.js"></script>
<?php

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

        // End the loop.
    endwhile;
    ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
    if (!localStorage.getItem('scoop_closed')) {
        $('.js-first-prompt').show();
    } else {
        $('.js-second-alert').show();
    }

    $(document.body).on('click', '.js-close-prompt', function(e) {
        e.preventDefault();
        localStorage.setItem('scoop_closed', true);
        $('.js-first-prompt').remove();
        $('.js-second-alert').show();
    })
});
</script>
<?php

get_footer();