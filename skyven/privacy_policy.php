<?php 
/*Template Name: Privacy Policy */

get_header(); ?>

<?php
	while ( have_posts() ) :
		the_post();
	?>

<div class="privacy-policy">
	<div class="container">
		<?php the_content(); ?>
	</div>
</div>

<?php
		// If comments are open or we have at least one comment, load up the comment template.
		// if ( comments_open() || get_comments_number() ) :
		// 	comments_template();
		// endif;

	endwhile; // End of the loop.
	?>

<?php get_footer(); ?>