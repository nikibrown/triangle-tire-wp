<?php
/**
 Template Name: Single Outlook
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
        	<p>Everyone who works in and supplies the US construction and mining industries are, of course, keenly interested in the business outlook for 2023.</p>
			<img class="rightimage desktop" src="https://triangletireus.com/wp-content/uploads/2023/02/stephen_reynolds-251x300.jpg" alt="" width="251" height="300" />
			<p>The construction outlook is generally positive, particularly for infrastructure projects thanks to the Infrastructure Investment and Jobs Act (IIJA), while mining looks to be somewhat flat compared to 2022.</p>
			<p>A volatile economy, battered supply chains and labor shortages are all potential headwinds for construction. The IIJA, however, provides a welcome stable infusion of $1.2 trillion in funding to a variety of construction sectors over five years.</p>
			<p>Dodge Construction analysts note that the year is off to a great deal of momentum, particularly in construction related to infrastructure and manufacturing projects.</p>
			<img class="rightimage mobile" src="https://triangletireus.com/wp-content/uploads/2023/02/stephen_reynolds-251x300.jpg" alt="" width="251" height="300" />
			<p>Triangle, one of the world’s largest OTR tire producers, provides a comprehensive range of radial and bias tires for the US construction, aggregates and mining industries. <span style="color: #2d75b5;"><strong>Stephen Reynolds</strong></span>, <strong>OTR Director for Triangle Tire USA</strong>, shares his thoughts on the 2003 outlook:</p>
		</div>
    </div>
    <div style="padding: 100px 50px 50px 50px; background-position: center center !important; background-size: cover !important; background: url('https://triangletireus.com/wp-content/uploads/2023/02/lookback-bg.jpg');" class="row expanded">
        <div class="medium-12">
        	<p style="color: #fff;"><strong>A Look Back</strong><br>
			"It would be difficult to discuss trends in the market in 2022 without mentioning both Covid and the supply chain. Blockages in many logistical chains eases thorughout 2022. In additional, with Covid losing it status as a crisis in the US, the market really begain to ramp up production fro most minerals to catch up on lost production in 2020 adn 2021. We saw steady grwoth in demand for OTR tire in 2022 as a result."</p>
        </div>
    </div>
	<div class="row">
        <div class="large-12 columns divider"></div>
    </div>
    <div class="row">
        <div class="medium-12 columns">
          <h3 style="color: #2d75b5;">Does Construction or Mining Look Better?</h3>
			<p>“I think it’s pretty clear that the construction segment has the most room for growth potential in 2023. After seeing some growth for coal in both 2021 and 2022, most experts expect that market to take an 8-9% decrease in 2023.</p>
			<p>Many minerals, such as copper and iron ore, are expected to hold steady or even increase somewhat in production, but most are expected to decrease in value. I don’t think the mining market will be soft, but there really aren’t any indicators for significant growth in 2023.</p>
			<p>Construction, on the other hand, should see an increase due the infrastructure bill. It’s true that inflation has weakened the impact of the funding and that in part was responsible for the slow construction starts in 2022. There are signs, however, that as supply chains improve, prices for many construction materials are leveling off. If the infrastructure bill had not been passed, and that funding was not in place for localities, the impact of inflation would have been far worse on construction projects.</p>
			<p>In conclusion, I expect to see a steady mining segment and a healthy construction
segment despite what is almost certainly going to be a struggling economy in 2023.""</p>
		</div>
    </div>
    <div class="row expanded" style="padding: 50px; background-color: #d4d4d4;">
        <div class="medium-12">
        	<div class="row">
				<div class="medium-12">
					<h3 style="color: #2d75b5;">These stand-out Triangle OTR radials will be doing their part to keep American construction and mining operations moving forward in 2023:</h3>
				</div>
			</div>
        </div>
    </div>
    <div class="row expanded tirefeatures" data-equalizer data-equalize-on="medium">
        <div class="medium-6 columns" data-equalizer-watch style="padding: 40px; background-size: cover; background: url('https://triangletireus.com/wp-content/uploads/2023/02/tire1bg.jpg');">
			<div class="tirefeatureinfo leftinfo">
        		<img src="https://triangletireus.com/wp-content/uploads/2023/02/tire1.png">
        		<p style="color: #fff;"><strong>TB526S (E-4)</strong><br>
			This radial, particularly in the 24.00R35 size, is a tremendous performer on rigid frame dump trucks. Its deep lug pattern provides even pressure distribution while buttressed shoulder lugs help resist sidewall cutting.</p>
			</div>
        </div>
        <div class="medium-6 columns" data-equalizer-watch style="padding: 40px; background-size: cover; background: url('https://triangletireus.com/wp-content/uploads/2023/02/tire2bg.jpg');">
			<div class="tirefeatureinfo">
        		<img src="https://triangletireus.com/wp-content/uploads/2023/02/tire2.png">
        		<p style="color: #fff;"><strong>TB598 (E-3, L-3)</strong><br>
			Designed for articulated haul trucks and available in the important 875/65/R25 size, the TB598 has an excellent self-cleaning tread pattern for surefooted traction. It features a rugged shoulder design for enhanced sidewall protection.</p>
			</div>
        </div>
    </div>
    <div class="row expanded tirefeatures" data-equalizer data-equalize-on="medium">
        <div class="medium-6 columns" data-equalizer-watch style="padding: 40px; background-size: cover; background: url('https://triangletireus.com/wp-content/uploads/2023/02/tire3bg.jpg');">
			<div class="tirefeatureinfo leftinfo">
				<img src="https://triangletireus.com/wp-content/uploads/2023/02/tire3.png">
				<p style="color: #fff;"><strong>TB516 (E-3, L-3)</strong><br>
				The most versatile Triangle OTR radial for loaders, dozers and other equipment, the TB516 has a wide aggressive tread design for excellent handling and lateral adhesion. Tough casing construction delivers enhanced impact and cut resistance support.</p>
			</div>
        </div>
        <div class="medium-6 columns" data-equalizer-watch style="padding: 40px; background-size: cover; background: url('https://triangletireus.com/wp-content/uploads/2023/02/tire4bg.jpg');">
			<div class="tirefeatureinfo">
        		<img src="https://triangletireus.com/wp-content/uploads/2023/02/tire4.png">
        		<p style="color: #fff;"><strong>TL538S+</strong><br>
			A dedicated loader tire for difficult operating conditions, the TL538S+ has an aggressive open tread pattern that provides dependable grip and powerful traction.</p>
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