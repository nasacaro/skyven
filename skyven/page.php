<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>

	<?php
	while ( have_posts() ) :
		the_post();
	?>
	
		<?php //if( get_field('page_title') ) { ?>
			<h4><?php //the_field('page_title'); ?></h4>
		<?php //} else { ?>
		  	<h4><?php the_title(); ?></h4>
		<?php //} ?>
		
		<?php the_content(); ?>
			        
	<?php
		// If comments are open or we have at least one comment, load up the comment template.
		// if ( comments_open() || get_comments_number() ) :
		// 	comments_template();
		// endif;

	endwhile; // End of the loop.
	?>

<?php
get_footer();
