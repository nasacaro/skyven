<!-- section-clean -->
<section class="sec-clean">
    <div class="container">
        <div class="heading-desc-div">
            <h2><?php the_field('savings_section_title'); ?></h2>
            <hr class="line-white">
        </div>
        <div class="row">
          <?php 
            $savingposts = get_posts( array(
              'post_type'  => 'saving_post',
              'numberposts' => -1,
              'post_status' => 'publish',
              'order'     => 'DSC',
            ));
    
            foreach ($savingposts as $key => $savingpostsa) {
          ?>
            <div class="col-md-6">
                <div class="clean-process-content">
                    <div class="img-left">
                        <img src="<?=get_the_post_thumbnail_url($savingpostsa->ID)?>" alt="<?=$savingpostsa->post_title?>">
                    </div>
                    <div class="heading-content">
                        <h3><?=$savingpostsa->post_title?></h3>
                        <p><?=$savingpostsa->post_excerpt?></p>
                    </div>
                </div>
            </div>
           <?php } ?> 
        </div>
    </div>
</section>
<!-- section-clean-end -->


<!-- section-benifit -->
<section class="sec-benifit">
    <div class="container">
        <div class="benifit-content-div">
            <div class="heading-desc-div">
                <h2><?php the_field('benefits_sections_title'); ?></h2>
                <p><?php the_field('benefits_sections_description'); ?></p>
            </div>

            
            <div class="row">
              <?php 
                $benefits = get_posts( array(
                  'post_type'  => 'benefit',
                  'numberposts' => -1,
                  'post_status' => 'publish',
                  'order'     => 'DSC',
                ));
        
                foreach ($benefits as $key => $benefitsa) {
              ?>
                <div class="col-md-4 col-sm-6">
                    <div class="benifit-list">
                        <div class="benifit-icon">
                            <img src="<?=get_the_post_thumbnail_url($benefitsa->ID)?>" alt="<?=$benefitsa->post_title?>">
                        </div>
                        <h4><?=$benefitsa->post_title?></h4>
                        <p><?=$benefitsa->post_excerpt?></p>
                    </div>
                </div>
              <?php } ?> 
            </div>
        </div>
    </div>
</section>
<!-- section-benifit-end -->

<section class="sec-process">
  <div class="container">
    <div class="heading-desc-div">
      <h2>Process heat is <span class="span-co2">CO<sub>2</sub></span> and money. Let us help you save both.</h2>
      <hr class="line-dark">
      <p><?php the_field('home_section_1_description'); ?></p>
    </div>
  </div>
</section>