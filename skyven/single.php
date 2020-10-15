<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

<?php
  while ( have_posts() ) :
    the_post();
  ?>
<div class="real">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 business">     
        <h1><?php the_title(); ?></h1>
        <p><?php the_date(); ?></p>
        <?php the_content(); ?>
      </div>
        
      <div class="col-sm-4 sources">
        <div class="box">
          <div class="container">
            <div class="sidebar" style="width:100%">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>

<?php
    // If comments are open or we have at least one comment, load up the comment template.
    // if ( comments_open() || get_comments_number() ) :
    //  comments_template();
    // endif;

  endwhile; // End of the loop.
  ?>
<?php
get_footer();
