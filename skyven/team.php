<?php 
/*Template Name: Team */

get_header(); ?>
<div class="team-banner-image">
    <?php $custom_banner = get_field('banner_image'); ?>
    <img src="<?php echo $custom_banner; ?>" class="img-fluid" alt="Skyven_Team_Banner">
    <div class="banner-text-div">
        <h1><?php echo get_the_title(); ?></h1>
    </div>
</div>

<div class="container"> 
    <!-- Container for Complete Team Page Starts -->
    <div class="ourteam_top_content"> 
        <!-- Code for Team Page Top Content Starts -->  
        <h4 class="team_para" data-aos="fade-up"><?php the_field('mission_title'); ?></h4>
        <h4 class="process_heat" data-aos="fade-up"><?php the_field('mission_main_title'); ?></h4>
        <h4 class="team_para" data-aos="fade-up"><?php the_field('business_title'); ?></h4>
        <p class="team_buisness_para" data-aos="fade-up"><?php the_field('business_info'); ?></p>
        <h4 class="team_para" data-aos="fade-up"><?php the_field('people_title'); ?></h4>
        <p class="team_buisness_para" data-aos="fade-up"><?php the_field('people_info'); ?></p>
    </div>  
    <!-- Code for Team Page Top Content Ends -->

    <div class="ourteampeople"> 
        <!-- Code for Team Page People Content Starts -->
        <h4 class="team_headerimage" data-aos="fade-up">Our Team</h4>
        <div class="ourteam_repeater"> 
            <!-- Code Written to display the People Content in grid manner Starts -->
        <?php 
        ?>
        <div class="row">
        <?php 
            $members = get_posts( array(
              'post_type'  => 'members',
              'numberposts' => -1,
              'post_status' => 'publish',
              'order'     => 'DSC',
              'tax_query' => array(
                    array(
                        'taxonomy' => 'members_category',
                        'field' => 'slug',
                        'terms' => 'team',
                    ) ,
                )
            ));
    
            foreach ($members as $key => $membersa) {
          ?>
            <div class="col-md-6 col-sm-12 col-lg-4" data-aos="fade-up">
                <div class="slide"> <!-- Code Written to display the People Content Starts -->
                    <div class="team_image_wrapper">
                        <img class="img-fluid" src="<?=get_the_post_thumbnail_url($membersa->ID)?>" alt="<?=$membersa->post_title?>">
                        <div class="member_data_wrapper">
                            <div class="member_data">
                                <p class="member_name"><?=$membersa->post_title?></p>
                                <p class="member_designation"><?php the_field('member_designation', $membersa->ID);?></p>
                            </div>
                            <div class="linked_link">
                                <a href="<?php the_field('member_linkedin_url', $membersa->ID);?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a class="info-icon">
                                    <i class='fas fa-info'></i>
                                </a>
                            </div>
                        </div>
                        <div class="overlay">
                            <div class="member_data">
                                <p class="member_name"><?=$membersa->post_title?></p>
                                <p class="member_designation"><?php the_field('member_designation', $membersa->ID);?></p>
                            </div>
                            <div class="linked_link">
                                <a href="<?php the_field('member_linkedin_url', $membersa->ID);?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <p class="info"><?php the_field('member_info', $membersa->ID);?></p>
                        </div>
                    </div>
                    
                </div> <!-- Code Written to display the People Content Ends -->
            </div>
            <?php } ?> 
        </div>

        <!-- Code Written to display the People Content Starts -->
            <!-- <div class="slide"> 
                <div class="team_image_wrapper">
                    <img src="<?=THEME_URL?>/assets/images/arun-gupta.png" class="img-fluid" alt="">
                    <div class="member_data_wrapper">
                        <div class="member_data">
                            <p class="member_name">Arun Gupta</p>
                            <p class="member_designation">Founder, CEO</p>
                        </div>
                        <div class="linked_link">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="overlay">
                        <div class="member_data">
                            <p class="member_name">Arun Gupta</p>
                            <p class="member_designation">Founder, CEO</p>
                        </div>
                        <div class="linked_link">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <p class="info">Muhamed “Boz” Aganlic is a technician wiz with a passion for finding creative solutions for complex challenges. In his free time, Boz loves writing and cooking delicious vegan meals.</p>
                    </div>
                </div>
                
            </div>  -->
            <!-- Code Written to display the People Content Ends -->

            <!-- Code Written to display the People Content Starts -->
            <!-- <div class="slide"> 
                <div class="team_image_wrapper">
                    <img src="<?=THEME_URL?>/assets/images/arun-gupta.png" class="img-fluid" alt="">
                    <div class="member_data_wrapper">
                        <div class="member_data">
                            <p class="member_name">Arun Gupta</p>
                            <p class="member_designation">Founder, CEO</p>
                        </div>
                        <div class="linked_link">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="overlay">
                        <div class="member_data">
                            <p class="member_name">Arun Gupta</p>
                            <p class="member_designation">Founder, CEO</p>
                        </div>
                        <div class="linked_link">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <p class="info">Muhamed “Boz” Aganlic is a technician wiz with a passion for finding creative solutions for complex challenges. In his free time, Boz loves writing and cooking delicious vegan meals.</p>
                    </div>
                </div>
                
            </div>  -->
            <!-- Code Written to display the People Content Ends -->

            <!-- Code Written to display the People Content Starts -->
            <!-- <div class="slide"> 
                <div class="team_image_wrapper">
                    <img src="<?=THEME_URL?>/assets/images/arun-gupta.png" class="img-fluid" alt="">
                    <div class="member_data_wrapper">
                        <div class="member_data">
                            <p class="member_name">Arun Gupta</p>
                            <p class="member_designation">Founder, CEO</p>
                        </div>
                        <div class="linked_link">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="overlay">
                        <div class="member_data">
                            <p class="member_name">Arun Gupta</p>
                            <p class="member_designation">Founder, CEO</p>
                        </div>
                        <div class="linked_link">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        <p class="info">Muhamed “Boz” Aganlic is a technician wiz with a passion for finding creative solutions for complex challenges. In his free time, Boz loves writing and cooking delicious vegan meals.</p>
                    </div>
                </div>
                
            </div>  -->
            <!-- Code Written to display the People Content Ends -->
        <?php  ?> 
        </div> 
        <!-- Code Written to display the People Content in grid manner Ends -->
    </div> 
    <!-- Code for Team Page People Content Ends -->
  
    <div class="advisors"> 
        <!-- Code for Team Page  Advisors Content Starts -->
        <h4 class="team_headerimage" data-aos="fade-up">Our Advisors</h4>
        <div class="ouradvisor_repeater"> 
            <!-- Code Written to display the Advisors Content in grid manner Starts -->
            <div class="row">
                <?php 
                    $advisors = get_posts( array(
                    'post_type'  => 'members',
                    'numberposts' => -1,
                    'post_status' => 'publish',
                    'order'     => 'DSC',
                    'tax_query' => array(
                            array(
                                'taxonomy' => 'members_category',
                                'field' => 'slug',
                                'terms' => 'advisor',
                            ) ,
                        )
                    ));
            
                    foreach ($advisors as $key => $advisorsa) {
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up">
                    <div class="slide">
                        <div class="team_image_wrapper">
                            <img class="img-fluid" src="<?=get_the_post_thumbnail_url($advisorsa->ID)?>" alt="<?=$advisorsa->post_title?>">
                            <div class="member_data_wrapper">
                                <div class="member_data">
                                    <p class="member_name"><?=$advisorsa->post_title?></p>
                                    <p class="member_designation"><?php the_field('member_designation', $advisorsa->ID);?></p>
                                </div>
                                <div class="linked_link">
                                    <a href="<?php the_field('member_linkedin_url', $advisorsa->ID);?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <a class="info-icon">
                                        <i class='fas fa-info'></i>
                                    </a>
                                </div>
                            </div>
                            <div class="overlay">
                                <div class="member_data">
                                    <p class="member_name"><?=$advisorsa->post_title?></p>
                                    <p class="member_designation"><?php the_field('member_designation', $advisorsa->ID);?></p>
                                </div>
                                <div class="linked_link">
                                    <a href="<?php the_field('member_linkedin_url', $advisorsa->ID);?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <p class="info"><?php the_field('member_info', $advisorsa->ID);?></p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php } ?> 
            </div>
        </div> 
        <!-- Code Written to display the Advisors Content in grid manner Ends -->
    </div> 
    <!-- Code for Team Page  Advisors Content Ends -->
</div> 
<!-- Container for Complete Team Page Ends -->

<?php get_footer();?>