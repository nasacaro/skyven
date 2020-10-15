<?php
get_header(); ?>


<div class="news-posts-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-8">
			<?php 
		        $args = array(
		            'post_type'=>'news',
		            'post_status'  => 'publish',
		           //'taxonomy' => 'event-category',           
		           'parent'    => ''
		        ); 
		        $categories = get_categories( $args );
		    ?>
				<div class="nav nav-tabs nav-justified desktop-gallery-menu" role="tablist">
			        <?php 
			        $i = 0; ?>
			        <a class="nav-item nav-link active" href="#all-galleries" aria-controls="all-galleries" role="tab" data-toggle="tab" >All Galleries
			           </a>
			           <?php
			        foreach( $categories as $cat ){ 
			           if( $cat->slug =='celebrities') {

			          }else{ ?>
			            <a class="nav-item nav-link" href="#<?php echo $cat->slug; ?>" aria-controls="<?php echo $cat->slug; ?>" role="tab" data-toggle="tab" ><?php echo $cat->name; ?>
			           </a>

			         <?php } ?>
			           
			        <?php $i++; } ?>
			    </div>
			</div>
		</div>

		<div class="tab-content">
        <?php 
        $i = 0; ?>




        <div role="tabpanel" class="container tab-pane active" id="all-galleries">
            <?php

            $taxonomy = 'event-category';
            $terms = get_terms($taxonomy); // Get all terms of a taxonomy
            //echo"<pre>";print_r($terms);"</pre>";
            if ( $terms && !is_wp_error( $terms ) ) :
            ?>
            <div class="row all-galleries-sec">

            <?php foreach ( $terms as $term ) { 
              
            <div class="col-sm-12 col-md-6 image">
              <?php
              // get the current taxonomy term
              //$term = get_queried_object();


              // vars
              
              $image = get_field('category_image', $term); ?>
              <a class="<?php echo $term->slug; ?>-link">
                <img class="img-fluid" src="<?php echo $image['url']; ?>" >
              </a>
              <p><?php echo $term->name; ?></p>
              
            </div>
            <?php  } ?>
          </div>
                
          <?php endif;?>

          </div>
          </div>
	</div>
</div>

<div class="california">
    <div class="container">
        <div class="blog">
			<?php
			while ( have_posts() ) :
				the_post();
			?>
	        <div class="row" data-aos="fade-up">
                <div class="col-sm-12 col-md-6 col-lg-6 bits">
	            <div class="blog-image">  <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid">
			    </div>
				</div>
			    <div class="col-sm-12 col-md-6 col-lg-6">
				<div class="blog-text">
				    <p class="money"><?php the_title(); ?></p>
				    <p class="date"><?php the_date(); ?></p>
				    <p class="hours"><?php the_excerpt(); ?></p>
			        <a href="<?php the_permalink(); ?>">Find out more <i class="fa">&#8594;</i></a>					
				</div>
				</div>
            </div>

            <?php
				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>
        </div>
	</div>
</div>

<?php
get_footer();
