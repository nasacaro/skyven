<?php get_header(); ?>

<div class="single-posts-section">
	<div class="container">
		<div class="back-btn">
			<a href="<?php echo get_site_url(); ?>/latest-news"><i class='fas fa-arrow-left'></i>Back</a>
		</div>
		<div class="post-details-sec">
			<div class="row">
				<div class="col-md-8">
					<?php
					  while ( have_posts() ) :
					    the_post();
					  ?>
					  <h2><?php the_title(); ?></h2>
					  <!-- <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>"> -->
					  <div class="post-content">
					  	<?php the_content(); ?>
					  </div>
					  <?php
					    // If comments are open or we have at least one comment, load up the comment template.
					    // if ( comments_open() || get_comments_number() ) :
					    //  comments_template();
					    // endif;

					  endwhile; // End of the loop.
					  ?>
				</div>
				<div class="col-md-4">
					<div class="sidebar-div">
						<h3>Similar News</h3>
				          <?php 
				            $news = get_posts( array(
				              'post_type'  => 'news',
				              'numberposts' => 3,
				              'post_status' => 'publish',
				              'order'     => 'DSC',
				            ));
				    
				            foreach ($news as $key => $newsa) {
				          ?>
				            <div class="row">
				            	<div class="col-md-4">
					            	<div class="img-div">
					            	<?php if ( has_post_thumbnail($newsa->ID) ) {?>
									    <img class="img-fluid" src="<?=get_the_post_thumbnail_url($newsa->ID)?>" alt="<?=$newsa->post_title?>">
									<?php }
									else { ?>
									    <img class="img-fluid" src="<?=THEME_URL?>assets/images/newa-1.png" alt="<?=$newsa->post_title?>">
								<?php	} ?>
					            		
					            	</div>
					            </div>
					            <div class="col-md-8">
				                    <div class="title-div">
				                    <?php
			                        $customLink = get_field('custom_link');

							            if (!empty($customLink)) {?>
							            	<a href="<?php echo $customLink; ?>" target="_blank"><?=$newsa->post_title?></a>
							                <?php
							            } else
							            {?>
							                <a href="<?=get_post_permalink($newsa->ID)?>"><?=$newsa->post_title?></a>
							        <?php } ?>
				                        
				                    </div>
					            </div>
				            </div>

				          <?php } ?> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();