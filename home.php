<?php
/**
 * The template for displaying the homepage
 * Template Name: Home
 * @package WordPress
 * @subpackage wpcustom
*/

$args = array(
    'post_type' => array(
        'passenger_tires',
        'truckbus_tires',
        'offroad_tires'
    ),
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'meta_query'  => array(
        array(
            'key' => '_type_core_featured',
            'value' => 'yes'
        )
    )

);
$featured_tires = new WP_Query(  $args );

//Passenger tires
$args['post_type'] = 'passenger_tires';
$args['posts_per_page'] = -1;
unset( $args['meta_query'] );
$all_passenger = new WP_Query(  $args );


//Truck and bus tires
$args['post_type'] = 'truckbus_tires';
$args['posts_per_page'] = -1;
unset( $args['meta_query'] );
$truckbus = new WP_Query(  $args );


//Offroad tires
$args['post_type'] = 'offroad_tires';
$args['posts_per_page'] = -1;
unset( $args['meta_query'] );
$offroad = new WP_Query(  $args );


$all_cats = get_all_taxonomies();

//reviews
$args = array(
    'post_type' => array(
        'reviews',
    ),
    'post_status' => 'publish',
    'posts_per_page' => 10,
    'orderby' => 'post_date',
    'order' => 'DESC',
);
$reviews = new WP_Query(  $args );

//homepage_slides
$args = array(
    'post_type' => array(
        'homepage_slides',
    ),
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'rand',
    'order' => 'DESC',
);
$slides = new WP_Query(  $args );

get_header();
?>

    <div class="expanded row sliderwrap">

        <div class="large-12">
            <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
            	<div id="scoopbutton"><a href="/the-scoop"><img src="<?php echo get_template_directory_uri(); ?>/images/the-Scooop_button.png"></a></div>
                <ul class="orbit-container">
                    <!-- Arrows
				  <button class="orbit-previous" aria-label="previous" tabindex="0"><span class="show-for-sr"></span><i class="fa fa-angle-left" aria-hidden="true"></i></button>
				  <button class="orbit-next" aria-label="next" tabindex="0"><span class="show-for-sr"></span><i class="fa fa-angle-right" aria-hidden="true"></i></button>
				  -->
                    <?php
                    $c = 0;
                    while ( $slides->have_posts() ) : $slides->the_post();
                        $img = featured_image( $post->ID, 'full' );
                        $value = get_field('url');
                        if( !$img )
                        {
                            continue;
                        }
                        $active_class = ( $c == 0 ) ? 'is-active ' : '';
                        echo '<li class="' . $active_class . 'orbit-slide">
                            <a href="'. $value .'"><img class="orbit-image" src="' . $img . '" alt="' . get_the_title( $post->ID ) .'" /></a>
                        </li>';
                        $c++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ul>
                <!--<div class="orbitwrap row">
                    <div class="large-12 columns">
                        <nav class="orbit-bullets">
                            <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
                            <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
                            <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
                            <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
                        </nav>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <div id="tiresearch" class="expanded row">
		 <div class="large-12 columns">
			<div class="row featureheading">
				<div class="large-12 columns">
					<h2 class="maskedtext">No Matter the Environment, We’ve Got Your Tire</h2>
				</div>
			 </div>
			 <div class="row" style="margin-bottom: 20px;">
				<div class="medium-6 large-6 columns">
					<div class="tiresearchwrap">
						<!--<div class="tiresearch">
							<img src="<?php bloginfo( 'template_url' ); ?>/images/off-the-road-tire-home.png" class="hometireimage">
						</div>-->
						<button class="button tirebutton" data-toggle="toggleoffroadbrowse">OFF-THE-ROAD</button>
						<div class="callout browsebycallout" id="toggleoffroadbrowse" data-toggler data-animate="fade-in fade-out" style="display:none;">
						<?php

							$radial = "radial";
							$bias = "bias";

							foreach( $all_cats['offroad_tires'] as $label => $items )
							{
								$label = isset( $items[0]->tax_label )
									? $items[0]->tax_label
									: $label;
								echo '<a class="categoryname" href="#">' . ucwords( $label ) . '</a>';
								echo '<ul class="menu vertical browselist '.strtolower($label).'">';
								// check if label is size

									if(strpos($label,'Size') !== false) {
										
										// Make div, loop through all the radials tires
										echo '<div class="radial-left"><span class="categoryname">RADIAL</span><br>';
										foreach( $items as $i ) {
											// if the term name contains 'r' 
											if(stripos($i->name,'r') !== false) {
												echo '<li class="'.$radial.'"><a href="'. get_term_link( $i ) . '">' . $i->name .'</a></li>'; 
											}
										}

										echo '</div>';

										// Make div, loop through all the bias tires
										echo '<div class="bias-right"><span class="categoryname">BIAS</span><br>';
										foreach( $items as $i ) {
											// if the term name does not contain 'r' 
											if(stripos($i->name,'r') === false) {
												echo '<li class="'.$bias.'"><a href="'. get_term_link( $i ) . '">' . $i->name .'</a></li>'; 
											}
										}

										echo '</div>';
									
									// if not the size label
									} else {

										foreach( $items as $i ) {
											echo '<li><a href="'. get_term_link( $i ) . '">' . $i->name .'</a></li>';
										}
									}

								echo '</ul>';
							}
							?>
						</div>
					</div>
				</div>
				<div class="medium-6 large-6 columns">
					<div class="tiresearchwrap">
						<a href="/specialty-trailer-tires/"><button class="button tirebutton">ST RADIAL TIRES</button></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="medium-6 large-6 columns">
					<div class="tiresearchwrap">
						<!--<div class="tiresearch">
							<img src="<?php bloginfo( 'template_url' ); ?>/images/passenger-tire-home.png" class="hometireimage">
						</div>-->
						<button class="button tirebutton" data-toggle="togglepassengerbrowse">PASSENGER / LIGHT TRUCK / SUV</button>
						<div class="callout browsebycallout" id="togglepassengerbrowse" data-toggler data-animate="fade-in fade-out" style="display:none;">
							<?php
							foreach( $all_cats['passenger_tires'] as $label => $items )
							{
								echo '<a class="categoryname" href="#">' . ucwords( $label ) . '</a>';
								echo '<ul class="menu vertical browselist">';
								foreach( $items as $i )
								{
									echo '<li><a href="'. get_bloginfo( 'url' ) .'/'. $i->taxonomy . '/'. $i->slug . '">' . $i->name .'</a></li>';
								}
								echo '</ul>';
							}
							?>
						</div>
					</div>
				</div>
				<div class="medium-6 large-6 columns">
					<div class="tiresearchwrap">
						<!--<div class="tiresearch">
							<img src="<?php bloginfo( 'template_url' ); ?>/images/truck-bus-tire-home.png" class="hometireimage">
						</div>-->
						<button class="button tirebutton" data-toggle="toggletruckbusbrowse">TRUCK &amp; BUS</button>
						<div class="callout browsebycallout" id="toggletruckbusbrowse" data-toggler data-animate="fade-in fade-out" style="display:none;">
							<?php
							foreach( $all_cats['truckbus_tires'] as $label => $items )
							{
								echo '<a class="categoryname" href="#">' . ucwords( $label ) . '</a>';
								echo '<ul class="menu vertical browselist">';
								foreach( $items as $i )
								{
									echo '<li><a href="'. get_bloginfo( 'url' ) . '/' . $i->taxonomy . '/' . $i->slug . '">' . $i->name .'</a></li>';
								}
								echo '</ul>';
							}
							?>
						</div>
					</div>
				</div>
			 </div>
		</div>
    </div>
    <!--<div id="opportunities" class="expanded row">
        <div class="large-12">
            <div class="row verticallycentered columnreverse">
                <div class="medium-5 large-5 columns">
                    <img src="<?php bloginfo( 'template_url' ); ?>/images/man.png">
                </div>
                <div class="medium-7 large-7 columns">
                    <div class="textcontent">
                      <h2><strong>Step Up and join the Triangle Network.</strong></h2>
                        <h2>Let us show you why so many of our Dealers consider us the <span class="bolder">best value</span> in the tire industry.</h2>
                        <a href="<?php bloginfo( 'url' ); ?>/become-a-dealer" class="button">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!--<div id="featurelinkrow" class="expanded row">
    	<div class="large-12 columns">
    		<div class="row">
				<div class="medium-4 large-4 columns">&nbsp;</div>
				<div class="medium-4 large-4 columns">
					<a href="/application/specialty-trailer"><button class="button tirebutton">ST RADIAL TIRES</button></a>
				</div>
				<div class="medium-4 large-4 columns">&nbsp;</div>
			</div>
		</div>
   </div>-->
   <div id="gearheads_home" class="expanded row">
      <div id="brandbucket" class="large-6 columns" style="text-align: center;">
      	<a href="<?php bloginfo( 'url' ); ?>/brand-bank"><img id="gearheads_layers" src="<?php bloginfo( 'template_url' ); ?>/images/brandbank.png"></a>
      </div>
      <div id="gearbucket" class="large-6 columns" style="text-align: center;">
      	<a href="<?php bloginfo( 'url' ); ?>/gearheads"><img id="gearheads_layers" src="<?php bloginfo( 'template_url' ); ?>/images/gearheadsimg.png"></a>
      </div>
      <!--<div id="plantbucket" class="large-4 columns" style="text-align: center;">
      	<a href="<?php bloginfo( 'url' ); ?>/plant-news"><img id="gearheads_layers" src="<?php bloginfo( 'template_url' ); ?>/images/plantnews.png"></a>
      </div>-->
   </div>
   </div>
    <!--<div id="featuredvideo" class="row">
        <div class="large-12 columns">
            <div class="textcontent">
                <h3><?php bloginfo( 'blogdescription' ); ?></h3>
                <?php
                $video_pic = get_option( 'homepage_video' );
                $embed = get_option( 'homepage_video_embed' );
                if( $video_pic == '' )
                {
                    $video_pic = get_bloginfo( 'template_url' ) .'/images/video.jpg';
                }
                ?>
                <a data-toggle="videomodal" aria-controls="videomodal" aria-haspopup="true" tabindex="0"><img src="<?php echo $video_pic; ?>"></a>
                <div class="large reveal videomodalwrap" id="videomodal" data-reveal>
                    <div class="flex-video widescreen vimeo">
                        <?php echo stripslashes( $embed ); ?>
                    </div>
                    <button class="close-button" data-close aria-label="Close reveal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>-->
    <!--<?php
    if ( $featured_tires->have_posts() ) :
        ?>
        <div id="featuredproduct" class="expanded row">
            <div class="large-12">
                <div class="row verticallycentered">
                <?php
                while ( $featured_tires->have_posts() ) : $featured_tires->the_post();
                    $img = featured_image( $post->ID, 'small', get_bloginfo( 'template_url' ) .'/images/protract.png' );
                echo '<div id="feature1" class="small-12 medium-4 columns">
                    <div class="textcontent">
                        <h4>
                            <a href="'. get_permalink( $post->ID ) .'">' . get_the_title( $post->ID ) . '</a>
                        </h4>
                        <img src="'. $img . '" />
                    </div>
                </div>';
                endwhile;
                ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    ?>-->
    <!--<div id="featuredproduct" class="expanded row">
    	<div class="large-12">
    		<div class="row verticallycentered">
    			<div class="small-12 medium-12 large-6 columns" >
    				<div class="textcontent">
						<h4>THE NEW <span class="largetext">Sportex</span> TSH11</h4>
						<p>The newly designed Sportex TSH11 features a large-block design with a larger footprint to improve handling performance. <span class="bluetext">and more</span></p>
					</div>
				</div>
				<div class="small-12 medium-12 large-6 columns">
					<img src="<?php bloginfo( 'template_url' ); ?>/images/featured-tire.png">
				</div>
    		</div>
      	</div>
    </div>-->
    <div id="testimonials" class="expanded row">
        <div class="large-12">
            <div class="orbit" role="region" aria-label="Reviews" data-orbit="i3jmi5-orbit" data-resize="pgao06-orbit" id="pgao06-orbit" data-events="resize">
                <ul class="orbit-container" tabindex="0" style="height: 435px;">
                    <button class="orbit-previous" aria-label="previous" tabindex="0"><span class="show-for-sr"></span><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                    <button class="orbit-next" aria-label="next" tabindex="0"><span class="show-for-sr"></span><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    <li class="orbit-slide" data-slide="1">
                        <div class="row testimonialsinside verticallycentered">
                    <?php
                    $row_count = 0;
                    $slidecount = 2;
                    while ( $reviews->have_posts() ) : $reviews->the_post();
                        $open = $close = '';
                        if( $row_count % 3 == 0 && $row_count > 0 )
                        {
                            $open = PHP_EOL . '</div></li>' . PHP_EOL . '<li class="orbit-slide" data-slide="'.$slidecount.'"><div class="row testimonialsinside verticallycentered">' . PHP_EOL;
                            $slidecount++;
                        }

                        echo $open;
                        echo '<div class="medium-4 large-4 testimonialcols columns">
                                <p>&quot;'. $post->post_content .'&quot;</p>
                                <p class="testimonialname">&mdash; '. $post->post_title .'</p>
                            </div>' . PHP_EOL;
                        $row_count++;

                    endwhile;
                    wp_reset_postdata();
                    ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<?php
get_footer();
