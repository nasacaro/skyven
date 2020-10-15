<?php
/**
 * The front page template file
 */

get_header(); ?>

<section class="sec-process-updated" data-aos="fade-up">
  <div class="container">
    <div class="heading-desc-div">
      <div class="row">
        <div class="col-md-6">
          <h2>Process heat is <span class="span-co2">CO<sub>2</sub></span> and money. Let us help you save both.</h2>
          <hr class="line-dark">
        </div>
        <div class="col-md-6">
          <p><?php the_field('home_section_1_description'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- New Section -->
<section class="sec-breaking-down" >
  <div class="container"> 
    <div class="heading-desc-div" data-aos="fade-up">   
      <h2>  
        <?php
        $value = get_field( "breaking_down_barrier_title");
        if( $value ) {
          echo $value;
        } else {
          echo 'Title Not Updated';
        }
        ?>
      </h2>
      <hr class="line-dark">
    </div>
    <div class="row" data-aos="fade-up">
      <div class="col-md-7"> 
        <ul class="repeater">  
          <?php if( have_rows('breaking_down_barrier_points') ): ?>
            <?php while( have_rows('breaking_down_barrier_points') ): the_row();
            // vars

              $title = get_sub_field('title');
              $content = get_sub_field('content');

              ?>

              <li class="details">

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

              </li>


            <?php endwhile; ?>
          <?php endif; ?>
        </ul>      
      </div>
      <div class="offset-md-1 col-md-4"> 
        <?php if( get_field('breaking_down_barrier_image') ): ?>
          <img src="<?php the_field('breaking_down_barrier_image'); ?>" alt="breaking_down_barrier_image" class="img-fluid"/>
        <?php endif; ?>
      </div>

      
    </div>

    <div class="text-center" data-aos="fade-up">
      <?php
      $link = get_field('breaking_down_barrier_link');
      if( $link ):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
                <a class="orange_btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="nofollow"><?php echo esc_html( $link_title );?></a>
      <?php endif; ?>
    </div>


  </div>

</section>
<!-- New Section End -->

<!-- section-tab -->
<section class="sec-tab">
  <div class="heading-desc-div" data-aos="fade-up">
    <h2><?php the_field('solution_section_title'); ?></h2>
    <hr class="line-dark">
  </div>
  <div class="container">
    <?php 
    $solutionPosts = get_posts( array(
      'post_type'  => 'solution',
      'numberposts' => -1,
      'post_status' => 'publish',
      'orderby' => 'name',
      'order'     => 'DSC',
    ));
    $countsolution = 0; 
    foreach ($solutionPosts as $key => $solutionPostsa) {
      if($countsolution == '0')
      {
        ?>
        <div class="row img-left" data-aos="fade-up">
          <div class="col-md-6 img-sec-col">
            <div class="tab-img">
              <img src="<?=get_the_post_thumbnail_url($solutionPostsa->ID)?>" alt="<?=$solutionPostsa->post_title?>">
            </div>
          </div>
          <div class="col-md-6 content-sec-col">
            <div class="tab-desc">
              <h2><?=$solutionPostsa->post_title?></h2>
              <p><?=$solutionPostsa->post_excerpt?></p>
            </div>
          </div>
        </div>
        <?php
      }
      else
      {
        ?>
        <div class="row img-left" data-aos="fade-up">
          <div class="col-md-6 img-sec-col">
            <div class="tab-img">
              <img src="<?=get_the_post_thumbnail_url($solutionPostsa->ID)?>" alt="<?=$solutionPostsa->post_title?>">
            </div>
          </div>
          <div class="col-md-6 content-sec-col">
            <div class="tab-desc">
              <h2><?=$solutionPostsa->post_title?></h2>
              <p><?=$solutionPostsa->post_excerpt?></p>
            </div>
          </div>
        </div>
        <?php 
      }
      $countsolution++;
      if($countsolution == '2')
        $countsolution = 0;
    }
    ?>  
  </div>
</section>
<!-- section-tab-end -->

<!-- section-benifit -->
<section class="sec-benifit">
  <div class="container">
    <div class="benifit-content-div">
      <?php if( have_rows('benefits_row') ): ?>
        <?php while( have_rows('benefits_row') ): the_row(); 

              // vars
          $rowtitle = get_sub_field('row_titile');
          $fcimage = get_sub_field('first_column_image');
          $fctitle = get_sub_field('first_column_title');
          $fcinfo = get_sub_field('first_column_info');
          $scimage = get_sub_field('second_column_image');
          $sctitle = get_sub_field('second_column_title');
          $scinfo = get_sub_field('second_column_info');

          ?>
          <div class="row" data-aos="fade-up">
            <div class="col-md-4">
              <div class="benifit-list">
                <h2><?php echo $rowtitle; ?></h2>
              </div>
            </div>
            <div class="col-md-4">
              <div class="benifit-list">
                <div class="benifit-icon">
                  <?php
                  if (!empty($fcimage)) {?>
                    <img src="<?php echo $fcimage; ?>" alt="icon">
                    <?php
                  }  ?>

                </div>
                <h4><?php echo $fctitle; ?></h4>
                <p><?php echo $fcinfo; ?></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="benifit-list">
                <div class="benifit-icon">
                  <?php
                  if (!empty($scimage)) {?>
                    <img src="<?php echo $scimage; ?>" alt="icon">
                    <?php
                  }  ?>
                </div>
                <h4><?php echo $sctitle; ?></h4>
                <p><?php echo $scinfo; ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
</section>
<!-- section-benifit-end -->

<!-- section-testimonial-starts -->
<section class="testimonial-sec">
  <!-- <div class="container">
    <div class="heading-desc-div" data-aos="fade-up">
        <h2><?php the_field('testimonial_section_title'); ?></h2>
        <hr class="line-dark">
    </div>
  </div> -->
</section>

<section class="testimonial-section" data-aos="fade-up">
  <div class="testimonial">
    <?php 
    $testimonials = get_posts( array(
      'post_type'  => 'testimonial',
      'numberposts' => -1,
      'post_status' => 'publish',
      'order'     => 'ASC',
    ));

    foreach ($testimonials as $key => $testimonialsa) {
      ?>
      <div class="test">
        <img src="<?=THEME_URL?>assets/images/quote.png" class="img-fluid client-quote" alt="quote">
        <div class="test-content">       
          <p><?=$testimonialsa->post_content?></p>
        </div>
        <div class="testimonial-author-sec">
          <div>
            <img src="<?=get_the_post_thumbnail_url($testimonialsa->ID)?>" alt="<?=$testimonialsa->post_title?>" class="img-fluid client-logo">
          </div>
          <div>
            <h4 class="client-info"><?=$testimonialsa->post_title?>, <span><?=$testimonialsa->post_excerpt?></span></h4> 
          </div>
        </div>
      </div>
    <?php } ?> 
  </div>
</section>
<!-- section-testimonial-end -->

<!-- section-news -->
<section class="sec-news">
  <div class="container">
    <div class="heading-desc-div" data-aos="fade-up">
      <h2><?php the_field('news_section_title'); ?></h2>
      <hr class="line-white">
    </div>
    <div class="row">
      <?php 
      $news = get_posts( array(
        'post_type'  => 'news',
        'numberposts' => 2,
        'post_status' => 'publish',
        'order'     => 'DSC',
      ));

      foreach ($news as $key => $newsa) {
        ?>
        <div class="col-md-4">
          <?php
          $customLink = get_field('custom_link', $newsa->ID);
                //echo $customLink;
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
                  <?php }
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
                  <?php }
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
	  
	  <div class="col-md-4">
		<iframe src="https://www.linkedin.com/embed/feed/update/urn:li:ugcPost:6709612585261641728" height="100%" width="100%" frameborder="0" allowfullscreen="" title="Embedded post"></iframe>
	  </div>
    </div>
    <div class="view-div">
      <a href="<?php echo get_site_url(); ?>/latest-news">VIEW ALL</a>
    </div>
  </div>
</section>
<!-- section-news-end -->

<!-- section-recognition -->
<section class="sec-recog">
  <div class="container">
    <div class="heading-desc-div" data-aos="fade-up">
      <h2><?php the_field('partners_section_title'); ?></h2>
    </div>
    <?php if( have_rows('static_logos') ): ?>
      <ul>
        <?php while( have_rows('static_logos') ): the_row(); 

            // vars
          $logoimage = get_sub_field('row_1_logos');

          ?>
          <li>
            <img src="<?php echo esc_url($logoimage['url']); ?>" alt="<?php echo esc_attr($logoimage['alt']); ?>">
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>

    <div class="logo-slider">
      <?php 
      $partnerlogos = get_posts( array(
        'post_type'  => 'partner_logo',
        'numberposts' => -1,
        'post_status' => 'publish',
        'order'     => 'DSC',
      ));

      foreach ($partnerlogos as $key => $partnerlogosa) {
        ?>
        <div class="logo-slide"><img src="<?=get_the_post_thumbnail_url($partnerlogosa->ID)?>" alt="<?=$partnerlogosa->post_title?>"></div>
      <?php } ?>
    </div>
  </div>
</section>
<!-- section-recognition-end -->

<?php
get_footer();
?>