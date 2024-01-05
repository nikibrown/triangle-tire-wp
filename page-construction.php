<?php
/**
 *
 * Template Name: Construction Industry
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
        <div class="container-fluid customarticle">
					<div id="gearheads" class="row articlecontent">
						<div class="medium-12 large-12 columns gearheadcontent">
							<div id="gearheadsinner" class="row scoopcolumns">
								<div class="large-12">
									<h1>Construction Industry Will Face Headwinds & Tremendous Opportunities in 2022</h1>
									<h2>Triangle OTR Tires are Ready to Serve!</h2>
									<p>The US construction industry will face sizable challenges in 2022 but also significant opportunities, according to industry analysts.</p>

									<p>"Finding skilled workers and supply chain disruptions are construction executives’ two biggest concerns," said <strong>James Heron</strong>, national sales manager for the Wells Fargo Equipment Finance Construction Group. "However, in this rapidly changing environment, the passing of the new Infrastructure bill and historically low interest rates will create new opportunities."</p>
									<p><strong>Anirban Basu</strong>, chief economist for Associated Builders and Contractors, agrees that the construction outlook for 2022 is positive, but the industry will face challenges in labor and supply shortages.</p>
									<p>Basu says the impacts of the Infrastructure Investment and Jobs Act won’t be as immediate as the 2009 infrastructure package, which was focused more on shovel-ready projects to kickstart the economy; but he expects projects from the new infrastructure package to be released in the third and fourth quarters of 2022.
									<p style="margin-bottom: 10px;"><strong>Basu notes:</strong></p>
									<ul>
										<li style="font-size: 19px; margin-bottom: 10px;"><strong>Skyrocketing home prices may also have a positive impact on the construction industry. Local governments drive much of their revenue from property taxes, and home re-assessments will mean more tax base for many communities.</li>
										<li style="font-size: 19px; margin-bottom: 10px;">Much of the money for government construction included in the American Rescue Plan has yet to be spent.</li>
										<li style="font-size: 19px; margin-bottom: 10px;">The infrastructure law will generate additional state and local spending on construction, including school construction, which stands to be one of the big winners.</strong></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
        </div>
        <div class="container-fluid trifectasection customarticle">
					<div id="gearheads" class="row">
						<div class="medium-12 large-12 columns gearheadcontent">
							<div id="gearheadsinner" class="row scoopcolumns trifectaintro">
								<div class="large-3">
									<img src="https://triangletireus.com/wp-content/uploads/2022/02/trifecta-logo.png">
								</div>
								<div class="large-9">
									<p>Lots of heavy equipment will need durable, dependable OTR radlal and bias tires. Triangle, the world’s 4th largest OTR tire producer, is ready to serve!</p>
									<p>The company, with US operations based in Tennessee, provides a wide range of OTR radial and bias tires for American construction, aggregate and mining companies. In particular, the “Triangle Trifecta” stands out for excellent traction, superior handling and extreme durability.</p>
								</div>
							</div>
							<div id="gearheadsinner" class="row scoopcolumns trifectabar">
								<div class="large-12">
									<img class="trifectabarimage" src="https://triangletireus.com/wp-content/uploads/2022/02/trifecta-bar.jpg">
									<div class="tirehighlight">
										<div class="tirehighlightimage">
											<img src="https://triangletireus.com/wp-content/uploads/2022/02/trifecta-tb516.jpg">
										</div>
										<div class="tirehighlighttext">
											<p><span class="tirehighlighttitle">TB516 (E-3, L-3)</span><br>
One of Triangle’s most versatile OTR tread patterns.  A very versatile radial for loaders, dozers and other equipment, the TB516 has a wide aggressive tread design for excellent handling and traction.  Available in six sizes, including 29.5R29.</p>
										</div>
									</div>
									<div class="tirehighlight">
										<div class="tirehighlightimage">
											<img src="https://triangletireus.com/wp-content/uploads/2022/02/trifecta-tb598.jpg">
										</div>
										<div class="tirehighlighttext">
											<p><span class="tirehighlighttitle">TB598 (E-3, L-3)</span><br>
Performing well on construction, aggregate and mining sites throughout the US with a self-cleaning tread pattern for excellent traction and a rugged shoulder design for sidewall protection.  Available in five sizes, including 875/65R29 which was created for some of the newly designed articulated haul trucks.</p>
										</div>
									</div>
									<div class="tirehighlight">
										<div class="tirehighlightimage">
											<img src="https://triangletireus.com/wp-content/uploads/2022/02/trifecta-tb577a.jpg">
										</div>
										<div class="tirehighlighttext">
											<p><span class="tirehighlighttitle">TB577A (E-4)</span><br>
Next-generation tread pattern design delivers outstanding traction. An innovative cooling unit design in the tread reduces heat generation, while a high tensile steel cord application provides higher load capability. Available in the 24.00R35 size.</p>
										</div>
									</div>
									<img class="trifectabarimage" src="https://triangletireus.com/wp-content/uploads/2022/02/trifecta-bar.jpg">
								</div>
								<div class="large-12 trifectavideo text-center">
									<h4>Check out the video!</h3>
									<a href="#modal-video" class="call-modal" title="Video" data-open="modal-video" aria-controls="modal-video" aria-haspopup="true" tabindex="0"><img src="https://triangletireus.com/wp-content/uploads/2022/02/trifecta-video.jpg"></a>
									<section class="semantic-content reveal" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true" data-reveal>
									<div class="modal-inner">
										<div class="modal-content">
											<a class="close-button" data-close aria-label="Close modal" type="button">
													<span aria-hidden="true">&times;</span>
											</a>
											<div class="responsive-embed">
												<iframe width="560" height="315" src="https://www.youtube.com/embed/g-wLAQdLNyo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										</div>
									</div>
								</section>
								</div>
							</div>
						</div>
					</div>
        </div>
        <div class="container-fluid scoopsection customarticle">
					<div id="gearheads" class="row">
						<div class="medium-12 large-12 columns gearheadcontent">
							<div id="gearheadsinner" class="row scoopcolumns">
								<div class="large-12">
									<h3>Keep up with the latest in construction, aggregate and mining news…</h3>
									<img src="https://triangletireus.com/wp-content/uploads/2022/02/scoop-logo.png">
									<p>We assemble the best stories each week for the Scoop. Informative and entertaining industry news at your fingertips. You can also register to receive a weekly email with the top stories.</p>
									<p><span class="specialtext">[IT’S FREE]</span></p>
								</div>
							</div>
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

<?php

get_footer();
