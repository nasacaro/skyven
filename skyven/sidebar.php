<?php
/**
 * The sidebar containing the main widget area
 */

global $theme_advertisement; 

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php //dynamic_sidebar( 'sidebar-1' ); ?>
<h5 class="bar-item">RECENT POSTS</h5>
              <hr>
<?php
function delicious_recent_posts() {
    $del_recent_posts = new WP_Query();
    $del_recent_posts->query('showposts=3');
        while ($del_recent_posts->have_posts()) : $del_recent_posts->the_post(); ?>
        <div class="row">
          <div class="col-sm-4 weekly">
            <a href="<?php esc_url(the_permalink()); ?>">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="farm"  class="img-fluid" >
            </a>
          </div>
          <div class="col-sm-8 roundup">
            <a href="<?php esc_url(the_permalink()); ?>">
              <p class="real1"><?php esc_html(the_title()); ?></p>
            </a>
          </div>
        </div>
        <?php endwhile;
    wp_reset_postdata();
}

 echo delicious_recent_posts(); 
?>
