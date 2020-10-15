<?php get_header(); ?>
<div class="team-banner-image">
	<?php $custom_banner = get_field('banner_image'); ?>
	<img src="<?php echo $custom_banner; ?>" class="img-fluid" alt="Skyven_Team_Banner">
	<div class="banner-text-div">
		<h1><?php echo get_the_title(); ?></h1>
	</div>
</div>

<section class="clean_process">
	<div class="container">
		<div class="heading-desc-div" data-aos="fade-up">  
			<h2>  
				<?php
				$value = get_field("step-by-step_section_title");
				if( $value ) {
					echo $value;
				} else {
					echo 'Title Not Updated';
				}
				?>
			</h2>
			<p>  
				<?php
				$value = get_field("step-by-step_section_content");
				if( $value ) {
					echo $value;
				} else {
					echo 'Title Not Updated';
				}
				?>
			</p>
			<hr class="line-dark">
		</div>
		<div class="repeater">
			
			<?php if( have_rows('step-by-step_section_points') ):  $counter = 1; ?>
				<?php while( have_rows('step-by-step_section_points') ): the_row();
						// vars
					$image = get_sub_field('image');
					$title = get_sub_field('title');
					$content = get_sub_field('content');

					?>
					<div class="row">

						<div class="col-md-5" <?php 

		if($counter % 2 == 0){ 
        echo "data-aos='fade-right'";  
    } 
    else{ 
      echo "data-aos='fade-left'";  
    } 

						?>>
							<div class="maindetails">
								<h5>
									<?php
									if( $title ) {
										echo $title;
									} else {
										echo 'Title Not Updated';
									}
									?>
								</h5>
								<p>
									<?php
									if( $content ) {
										echo $content;
									} else {
										echo 'Content Not Updated';
									}
									?>
								</p>
							</div>

						</div>

						<div class="col-md-2">

							<div class="counter">
								<p>
									<?php echo $counter; // Prints the number of counted row ?>
								</p>
							</div>

						</div>

						<div class="col-md-5" <?php 

		if($counter % 2 == 0){ 
        echo "data-aos='fade-left'";  
    } 
    else{ 
      echo "data-aos='fade-right'";  
    } 

						?>>
							<div class="deatailsimg">
								<?php
								if( $image ) {
									?>
									<img src="<?php echo $image?>" class="img-fluid" alt="<?php echo $image?>">
									<?php
								} else {?>
									<p>No Img Given</p>
								<?php }
								?>
							</div>

						</div>



					</div>



					<?php $counter++; // add one per row ?>  

				<?php endwhile; ?>
			<?php endif; ?>
			
		</div>
	</div>
</section>

<section class="dime_design" data-aos="fade-up">
	<div class="container" data-aos="fade-up" data-aos-duration="10000">
		<div class="heading-desc-div">   
			<h2>  
				<?php
				$value = get_field("how_we_work_section_2_title");
				if( $value ) {
					echo $value;
				} else {
					echo 'Title Not Updated';
				}
				?>
			</h2>
			<p>  
				<?php
				$value = get_field("how_we_work_section_2_textarea");
				if( $value ) {
					echo $value;
				} else {
					echo 'Content Not Updated';
				}
				?>
			</p>
		</div>		
	</div>
</section>


<section class="case_study">
	<div class="container">
		<div class="heading-desc-div" data-aos="fade-up">  
			<h2>  
				<?php
				$value = get_field("case_study_title_name");
				if( $value ) {
					echo $value;
				} else {
					echo 'Main Title Not Updated';
				}
				?>
				
				
			</h2>
			<hr class="line-dark">
		</div>		
		<div class="casestudydescription">
			<div>
				<label data-aos="fade-up">
					<?php
					$value = get_field("customer_background_title");
					if( $value ) {
						echo $value;
					} else {
						echo 'Content Not Updated';
					}
					?></label>
					<div class="content" data-aos="fade-up">
						<p>
							<?php
							$value = get_field("customer__background");
							if( $value ) {
								echo $value;
							} else {
								echo 'Title Not Updated';
							}
							?>
						</p>
					</div>
				</div>

				<div>
					<label data-aos="fade-up">
						<?php
						$value = get_field("measures_title");
						if( $value ) {
							echo $value;
						} else {
							echo 'Title Not Updated';
						}
						?>
					</label>
					<div class="content">
						<?php if( have_rows('measures') ): ?>
							<?php while( have_rows('measures') ): the_row();
						// vars

								$title = get_sub_field('title');
								$content = get_sub_field('content');


								?>
								<div class="slide" data-aos="fade-up">
									<h5>
										<?php
										if( $title ) {
											echo $title;
										} else {
											echo 'Title Not Updated';
										}
										?>
									</h5>
									<p>
										<?php
										if( $content ) {
											echo $content;
										} else {
											echo 'Content Not Updated';
										}
										?>
									</p>
								</div>

							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="units">
				
				<?php if( have_rows('units') ): $i = 0;?>
					<?php while( have_rows('units') ): the_row(); $i++;
						// vars

						$image = get_sub_field('image');
						$title = get_sub_field('title');
						$content = get_sub_field('content');


						?>
						<div class=""  data-aos="fade-up" data-aos-delay="<?php echo $i * 150;?>" data-aos-easing="linear">
						    <!-- <p>This is row number <?php echo $i; ?>.</p> -->
							<?php
							if( $image ) {
								?>
								<img src="<?php echo $image?>" class="img-fluid" alt="<?php echo $image?>">
								<?php
							} else {?>
								<p>No Img</p>
							<?php }
							?>
							<div class="unit_description">
								<?php
								if( $content ) {
									echo $content;
								} else {
									echo 'Content Not Updated';
								}
								?>
							</div>
							<p class="title">
								<?php
								if( $title ) {
									echo $title;
								} else {
									echo 'Title Not Updated';
								}
								?>
							</p>
						</div>

					<?php endwhile; ?>
				<?php endif; ?>
				
			</div>
		</div>

	</section>
	<?php get_footer();?>