<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

<?php get_sidebar(); ?>

<div class="right-panel">

	<div class="home-featured-bussiness-section featured-section">
		<div class="lightblue-title-sec title-sec ad-title">
          <h4>Search Result</h4>
        </div>
        <!-- <header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', TEXT_DOMAIN ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', TEXT_DOMAIN ); ?></h1>
		<?php endif; ?>
		</header> -->
        
        <div class="featured-post-sec">
          <div class="row">

			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					$postID = get_the_ID();

					$postType = $theme_general->show_post_type( $postID );
			?>
			<div class="col-sm-6 col-md-4">
              <div class="post-item" data-aos="zoom-in">
                <div class="post-card">
                  <div class="tag"><?=$postType?></div>
                  <div class="post-card-header">
                  	<a href="<?php esc_url( the_permalink() ); ?>">
                    <?php 
                    $featured_img_url = get_the_post_thumbnail_url($postID,'full'); 
                    if($featured_img_url != '')
                    {
                    	echo '<img class="img-fluid" src="'.$featured_img_url.'">'; 
                    }
                    else
                    {
                    	echo '<img class="img-fluid" src="'.THEME_URL.'assets/images/no-image.png">'; 
                    }
                    //the_post_thumbnail(); 
                    ?>
                	</a>
                  </div>
                  <div class="post-card-footer search-title">
                    <?php
					the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' );
					?>
                  </div>
                </div>
                <!-- <p><?php //the_excerpt(); ?></p> -->
              </div>
            </div>
			<?php
				endwhile; // End of the loop.
			else :
				?>
        <div class="col-sm-12 col-md-12">
				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', TEXT_DOMAIN ); ?></p>
        </div>
				<?php
//					get_search_form();

			endif;
			?>

		  </div>
        </div>
    </div>
		
</div>
<?php
get_footer();
