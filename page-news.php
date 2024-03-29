<?php
/**
 * Template Name: News
 * @version 1.0
 * @date 6/10/17 9:16 PM
 * @package triangle
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
	<div class="row">
		<div class="medium-12 columns">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns divider"><hr></div>
	</div>
	<div class="row">
		<div class="medium-12 large-12 columns">
			<?php 
				$link = get_permalink($id);
				$postslist = get_posts( array(
    'posts_per_page' => 30,
    'order'          => 'DESC',
) );
 
if ( $postslist ) {
    foreach ( $postslist as $post ) :
        setup_postdata( $post );
        ?>
        <div class="postWrap">
            <h2><?php the_title(); ?></h2>
            <?php the_excerpt(); ?>
            <a class="moreLink" href="<?php the_permalink(); ?>">Read More</a>
        </div>
    <?php
    endforeach; 
    wp_reset_postdata();
}
?>
		</div>
	</div>
	 <?php

        // End the loop.
    	endwhile;
    ?>
<?php
get_footer();
