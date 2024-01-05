<?php
/**
 Template Name: Single Trucking
 * Template Post Type: post
 * 
 * @package WordPress
 * @subpackage wpcustom
*/
get_header();


// Start the loop.
while ( have_posts() ) : the_post();

    $img = featured_image( $post->ID, 'full', get_bloginfo( 'template_url' ) .'/images/become-a-dealer-header.jpg');
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
    <div class="row">
        <div class="medium-12 columns">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns divider"><hr></div>
    </div>
    <div class="row">
        <div class="medium-12 columns">
           
          <?php the_content(); ?>
          <img style="margin-bottom: -1px;" src="https://triangletireus.com/wp-content/uploads/2022/12/trucking-tires.jpg">
        </div>
    </div>
    <div class="row expanded" style="padding: 50px 0; background-size: cover; background: url('https://triangletireus.com/wp-content/uploads/2022/12/Trucking_Costs_article_background.jpg')">
        <div class="medium-12">
        	<div class="row">
        		  <div class="medium-12">
								 <p style="color: #fff;"><span style="color: #2d75b5;"><strong>A TOUGH ENVIRONMENT FOR TRUCKING</strong></span><br>
								 The marginal cost of trucking grew 12.7% in 2021 to $1.86 per mile, the highest on record, the ATRI said, citing its findings from a survey of U.S. motor carriers.</p>
								<p style="color: #fff;">Leading contributors to the increase were fuel (35.4% higher than in 2020), repair and maintenance (18.2% higher than in 2020), and driver wages (10.8% higher than in 2020).
			On a cost-per-hour basis, costs increased to $74.65, the Atlanta-based non-profit research organization said.</p>
								<p style="color: #fff;">The trucking industry experienced many new, atypical market conditions in 2021 and their effects can clearly be seen in the Ops Costs data, the ATRI said.</p>
								<p style="color: #fff;">Overall, fleets with up to 100 trucks spent 4.9 cents more per mile than fleets with more than 100 trucks — closing the 2020 gap with larger fleets by 70%. While larger fleets spent less than smaller fleets on insurance premiums per mile, the advantage was offset by higher out-of-pocket incidental costs per mile for large fleets.</p>
								<p style="color: #fff;">In response to the truck driver shortage, driver compensation rose 10% last year over 2020 to 80.9 cents per mile.</p>
								<p style="color: #fff;">Faced with challenges throughout the supply chain, carriers emphasized greater efficiency, the ATRI said. Empty or "deadhead" mileage fell to 14.8% of miles traveled, and average truck fuel economy increased to 6.65 miles per gallon.</p>
								<p style="color: #fff;">Repair and maintenance costs jumped 18.2% last year over 2020 to 17.5 cents per mile, ATRI said, owing in part to the average of trucks rising in light of new truck shortages.
			Reducing tire costs is always a key metric for fleets, but it is even more important these days. Ask your tire dealer about Triangle TBR tires.</p>
							</div>
						</div>
        </div>
    </div>
    <?php

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

    // End the loop.
endwhile;

get_footer();