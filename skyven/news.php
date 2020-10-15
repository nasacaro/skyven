<?php
/*Template Name: News */
get_header(); ?>


<div class="news-posts-section">
	<div class="container">
		<div class="row title-tab-row" data-aos="fade-up">
			<div class="col-md-5 title-tab-left-col">
				<h2><?php the_field('news_tabs_title'); ?></h2>
			</div>
			<div class="col-md-7 title-tab-right-col">
			<?php 
		        $args = array(
		            'post_type'=>'news',
		            'post_status'  => 'publish',
		           'taxonomy' => 'news_category',           
		           'parent'    => ''
		        ); 
		        $categories = get_categories( $args );
		    ?>
				<div class="nav nav-tabs nav-justified desktop-gallery-menu" role="tablist">
				<a class="nav-item nav-link active" href="#all-news" aria-controls="all-news" role="tab" data-toggle="tab" >All News</a>
			        <?php 
			        $i = 0; ?>
			           <?php
			        foreach( $categories as $cat ){  ?>
			            <a class="nav-item nav-link" href="#<?php echo $cat->slug; ?>" aria-controls="<?php echo $cat->slug; ?>" role="tab" data-toggle="tab" ><?php echo $cat->name; ?>
			           </a>
			           
			        <?php $i++; } ?>
			    </div>
			</div>
		</div>

		<div class="tab-content">
        <?php 
        $i = 0; ?>




	        <div role="tabpanel" class="tab-pane active" id="all-news">
	            <div class="row">
	          	<?php 
	            $news = get_posts( array(
	              'post_type'  => 'news',
	              'numberposts' => -1,
	              'post_status' => 'publish',
	              'order'     => 'DSC',
	            ));
	    
	            foreach ($news as $key => $newsa) {
	          	?>
		            <div class="col-md-4 news-col" data-aos="fade-up">
					<?php
					$customLink = get_field('custom_link' , $newsa->ID);

						if (!empty($customLink)) {?>
							<a href="<?php echo $customLink; ?>" target="_blank">
							<div class="new-blog-div">
								<div class="news-img-div">
									<?php
										// Must be inside a loop.
										
										if ( has_post_thumbnail($newsa->ID) ) {?>
											<img class="img-fluid" src="<?=get_the_post_thumbnail_url($newsa->ID)?>" alt="<?=$newsa->post_title?>">
										<?php }
										else { ?>
											<img class="img-fluid" src="<?=THEME_URL?>assets/images/newa-1.png" alt="<?=$newsa->post_title?>">
									<?php	}
									?>
								</div>
								
								<div class="news-blog-desc">
									<h4><?=$newsa->post_title?></h4>
									<p><?=$newsa->post_excerpt?></p>
									<span>VIEW MORE</span>
								</div>
							</div>
							</a>
							<?php
						} else
						{?>
							<a href="<?=get_post_permalink($newsa->ID)?>">
							<div class="new-blog-div">
								<div class="news-img-div">
									<?php
										// Must be inside a loop.
										
										if ( has_post_thumbnail($newsa->ID) ) {?>
											<img class="img-fluid" src="<?=get_the_post_thumbnail_url($newsa->ID)?>" alt="<?=$newsa->post_title?>">
										<?php }
										else { ?>
											<img class="img-fluid" src="<?=THEME_URL?>assets/images/newa-1.png" alt="<?=$newsa->post_title?>">
									<?php	}
									?>
								</div>
								
								<div class="news-blog-desc">
									<h4><?=$newsa->post_title?></h4>
									<p><?=$newsa->post_excerpt?></p>
									<span>VIEW MORE</span>
								</div>
							</div>
							</a>
					<?php } ?>
		                
		            </div>
	          	<?php } ?> 
	        	</div>
	            
	        </div>

	        <?php 
			    $taxonomy = 'news_category';
			    $postType = 'news';
			    $terms = get_terms(['taxonomy' => $taxonomy, 'orderby' => 'term_id', 'parent' => 0, 'hide_empty' => false]);
			?>
			<?php 
    $i = 0;

      foreach( $terms as $termi ){ 
      $termi_id = $termi->term_id; ?>

      <div role="tabpanel" class="tab-pane" id="<?php echo $termi->slug; ?>">
           <div class="row">
           <?php 
                    $args = array(
					  'post_type' => 'news',
					  'numberposts' => -1,
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'news_category',
                          'field' => 'slug',
                          'terms' => $termi->slug
                        )
                      )
                    );
					$query = new wp_query($args); 
					//print_r($query);
					//exit;
                ?>
	          	 <?php 
	           //  $news = get_posts( array(
	           //    'post_type'  => 'news',
	           //    'numberposts' => -1,
	           //    'post_status' => 'publish',
	           //    'order'     => 'DSC',
	           //  ));
	    
	           //  foreach ($news as $key => $newsa) {
	          	// ?>
	          	<!-- the loop -->
                <?php if ( $query->have_posts() ) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php $postID = get_the_ID(); ?>
		            <div class="col-md-4 news-col" data-aos="fade-up">
					<?php
						$customLink = get_field('custom_link' , $postID);
						if (!empty($customLink)) {?>
						<a href="<?php echo $customLink; ?>" target="_blank">
							<div class="new-blog-div">
								<div class="news-img-div">
									<?php
										// Must be inside a loop.
										
										if ( has_post_thumbnail($postID) ) {?>
											<img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($postID); ?>" alt="<?php the_title(); ?>">
										<?php }
										else { ?>
											<img class="img-fluid" src="<?=THEME_URL?>assets/images/newa-1.png" alt="<?php the_title(); ?>">
									<?php	}
									?>
								</div>
								
								<div class="news-blog-desc">
									<h4><?php the_title(); ?></h4>
									<p><?php the_excerpt();?></p>
									<span>VIEW MORE</span>
								</div>

							</div>
						</a>
						<?php } else {?>
						<a href="<?=get_post_permalink($postID)?>">
							<div class="new-blog-div">
								<div class="news-img-div">
									<?php
										// Must be inside a loop.
										
										if ( has_post_thumbnail($postID) ) {?>
											<img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($postID); ?>" alt="<?php the_title(); ?>">
										<?php }
										else { ?>
											<img class="img-fluid" src="<?=THEME_URL?>assets/images/newa-1.png" alt="<?php the_title(); ?>">
									<?php	}
									?>
								</div>
								
								<div class="news-blog-desc">
									<h4><?php the_title(); ?></h4>
									<p><?php the_excerpt();?></p>
									<span>VIEW MORE</span>
								</div>

							</div>
						</a>
					<?php } ?>
		            </div>

	          	<?php //} ?> 
	          	<?php endwhile; ?>
                <?php else : ?>
                
                <!-- No posts found -->
                <?php endif; ?>
                 
                <?php wp_reset_postdata(); ?>
	        	</div>     
        
      </div>
    
      
      <?php wp_reset_postdata(); ?>
      <?php  $i++; } ?>

          </div>
          </div>
	</div>
</div>

<?php
get_footer();